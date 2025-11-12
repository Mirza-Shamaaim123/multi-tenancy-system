<?php

namespace App\Http\Controllers;

use App\Mail\PlanPurchasedMail;
use App\Models\Checkout;
use App\Models\Plan;
use App\Models\Tenant as ModelsTenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use App\Models\Tenant;

// use Stancl\Tenancy\Database\Models\Tenant;


class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,)
    {

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'domain' => 'required|string|max:255',
            'payment_method' => 'required|string',
            'plan_name' => 'required|string',
            'plan_type' => 'required|string',
            'amount' => 'required|numeric',
            'store_name' => 'required|string',
        ]);

        $checkout = Checkout::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'domain' => $validated['domain'],
            'payment_method' => $validated['payment_method'],
            'plan_name' => $validated['plan_name'],
            'plan_type' => $validated['plan_type'],
            'amount' => $validated['amount'],
            'store_name' => $validated['store_name'],
            'status' => 'pending',
        ]);
        if ($validated['payment_method'] === 'stripe') {
            // Stripe flow me jab payment success ho, tab mail bhejna better hai
            return redirect()->route('checkout.stripe', $checkout->id);
        }

        // Non-stripe payment par yahan mail bhejo


        // dd($validated);

        return redirect()->back()->with('success', 'Checkout information saved successfully!');
    }



    public function stripeCheckout($id)
    {
        $checkout = Checkout::findOrFail($id);

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        // 🔹 Determine billing interval (month/year)
        $interval = match (strtolower($checkout->plan_type)) {
            'monthly' => 'month',
            'yearly' => 'year',
            default => 'month',
        };

        // 🔹 Step 1: Try to find existing product by name
        $productName = $checkout->name . ' Plan';

        $existingProducts = \Stripe\Product::search([
            'query' => 'name:"' . $productName . '"',
        ]);

        if (count($existingProducts->data) > 0) {
            $product = $existingProducts->data[0]; // Use existing product
        } else {
            // 🔹 Step 2: Create a new product if not found
            $product = \Stripe\Product::create([
                'name' => $productName,
                'description' => ucfirst($checkout->plan_type) . ' subscription for ' . $checkout->domain,
            ]);
        }

        // 🔹 Step 3: Create a recurring price for this product
        $price = \Stripe\Price::create([
            'unit_amount' => $checkout->amount * 100, // amount in cents
            'currency' => $checkout->currency ?? 'usd',
            'recurring' => ['interval' => $interval],
            'product' => $product->id,
        ]);

        // 🔹 Step 4: Create a checkout session for subscription
        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price' => $price->id,
                'quantity' => 1,
            ]],
            'mode' => 'subscription',
            'metadata' => [
                'checkout_id' => $checkout->id,
                'product_id' => $product->id,
                'price_id' => $price->id,
            ],
            'success_url' => url('/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/cancel'),
        ]);

        return redirect($session->url);
    }

    public function success(Request $request)
    {
        $session_id = $request->query('session_id');

        if (!$session_id) {
            abort(403, 'Invalid payment session (missing ID).');
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // 🔹 Stripe session fetch
            $session = \Stripe\Checkout\Session::retrieve($session_id);

            // 🔹 Determine if subscription or one-time
            if ($session->mode === 'subscription') {
                // Subscription mode
                $subscriptionId = $session->subscription;
                if (!$subscriptionId) {
                    abort(403, 'Invalid subscription session (no subscription found).');
                }

                $subscription = \Stripe\Subscription::retrieve($subscriptionId);
                $status = $subscription->status; // 'active', 'incomplete', etc.

                $customerId = $subscription->customer;
            } else {
                // One-time payment
                $paymentIntentId = $session->payment_intent ?? null;
                if (!$paymentIntentId) {
                    abort(403, 'Invalid payment session (no payment intent found).');
                }

                $paymentIntent = \Stripe\PaymentIntent::retrieve($paymentIntentId);
                $status = $paymentIntent->status;
                $customerId = $paymentIntent->customer;
            }

            // 🔹 Checkout record from metadata
            $checkoutId = $session->metadata->checkout_id ?? null;
            if (!$checkoutId) {
                abort(403, 'Invalid checkout metadata.');
            }

            $checkout = Checkout::find($checkoutId);
            if (!$checkout) {
                abort(403, 'Checkout record not found.');
            }

            // 🔹 Update checkout status
            $checkout->update(['status' => $status]);

            if (in_array($status, ['succeeded', 'active'])) {
                // 🕓 Set plan expiry based on plan type
                $expiryDate = $checkout->plan_type === 'Monthly'
                    ? now()->addMonth()
                    : now()->addYear();

                $checkout->update([
                    'start_date' => now(),
                    'expiry_date' => $expiryDate,
                    'stripe_customer_id' => $customerId,
                    'stripe_subscription_id' => $subscriptionId,
                    'stripe_price_id' => $checkout->stripe_price_id,

                ]);

                // 🧱 Tenant create or update
                $tenant = $this->createTenantForCheckout($checkout);

                if ($tenant) {
                    $tenant->update([
                        'status' => 'active',
                        'plan_start_date' => now(),
                        'plan_end_date' => $expiryDate,
                    ]);
                }

                return view('success', ['status' => 'succeeded', 'checkout' => $checkout]);
            }

            abort(403, 'Payment not verified or canceled.');
        } catch (\Stripe\Exception\InvalidRequestException $e) {
            abort(403, 'Invalid or expired Stripe session: ' . $e->getMessage());
        } catch (\Exception $e) {
            abort(403, 'Error validating payment: ' . $e->getMessage());
        }
    }


    public function cancel(Request $request)
    {
        $sessionId = $request->query('session_id');

        if ($sessionId) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            $checkout = Checkout::where('email', $session->customer_details->email)->latest()->first();
            if ($checkout) {
                $checkout->update(['status' => $session->payment_status]); // ye 'canceled' hoga
            }
        }

        return view('cancel');
    }





    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    private function createTenantForCheckout($checkout)
    {
        // Agar tenant already exist na ho
        if (Tenant::where('id', $checkout->domain)->exists()) {
            return;
        }

        // ✅ Tenant create karo
        $tenant = Tenant::create([
            'id'              => $checkout->domain, // e.g. mystore
            'plan_type'       => $checkout->plan_type,
            'plan_start_date' => $checkout->start_date,
            'plan_end_date'   => $checkout->expiry_date,
            'email'           => $checkout->email,
            'name'            => $checkout->name,

            // 👇 custom data (ye "data" JSON column me save hota hai)
            'data' => [
                'password'      => bcrypt('12345678'), // hardcoded default password
                'warehouse_id'  => 1, // hardcoded ID (for example)
            ],
        ]);


        // ✅ Domain assign karo tenant ko
        $tenant->domains()->create([
            'domain' => "{$checkout->domain}.localhost", // e.g. mystore.localhost
        ]);
        $tenant->run(function () use ($checkout) {
            \App\Models\User::create([
                'name'     => $checkout->name,
                'email'    => $checkout->email,
                'password' => bcrypt('12345678'),
                'role'     => 'admin', // agar role column hai to
            ]);
        });

        // Optional redirect agar zarurat ho:
        // return redirect("http://{$checkout->domain}.localhost:8000")->with('success', 'Your store has been created!');
    }
}
