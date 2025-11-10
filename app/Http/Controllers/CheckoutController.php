<?php

namespace App\Http\Controllers;

use App\Mail\PlanPurchasedMail;
use App\Models\Checkout;
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
        ]);

        $checkout = Checkout::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'domain' => $validated['domain'],
            'payment_method' => $validated['payment_method'],
            'plan_name' => $validated['plan_name'],
            'plan_type' => $validated['plan_type'],
            'amount' => $validated['amount'],
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

        //    Stripe::setApiKey(config('services.stripe.secret'));
        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));


        $session = \Stripe\Checkout\Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $checkout->domain . ' Plan',
                    ],
                    'unit_amount' => 2900, // $29.00 in cents
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',

            // 👇 checkout_id ko metadata me store kar rahe hain
            'metadata' => [
                'checkout_id' => $checkout->id,
            ],

            // 👇 Stripe yahan {CHECKOUT_SESSION_ID} ko replace karega actual session id se
            'success_url' => url('/success?session_id={CHECKOUT_SESSION_ID}'),
            'cancel_url' => url('/cancel'),
        ]);
        //  Mail::to($checkout->email)->send(new PlanPurchasedMail($checkout));

        return redirect($session->url);
    }


    public function success(Request $request)
    {
        $session_id = $request->query('session_id');

        // ⚠️ Agar session_id missing ho to direct block karo
        if (!$session_id) {
            abort(403, 'Unauthorized access.');
        }

        \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

        try {
            // 🔹 Stripe Session fetch karo
            $session = \Stripe\Checkout\Session::retrieve($session_id);

            // 🔹 PaymentIntent fetch karo
            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);
            $status = $paymentIntent->status; // e.g. "succeeded", "canceled"

            // 🔹 Checkout record find karo
            $checkout = Checkout::find($session->metadata->checkout_id ?? null);

            // ❌ Agar record hi nahi mila
            if (!$checkout) {
                abort(403, 'Invalid checkout session.');
            }

            // 🔹 Database update karo
            $checkout->update(['status' => $status]);

            // ✅ Sirf succeeded payment pe ye sab chale
            if ($status === 'succeeded') {

                // 🕓 Plan dates set karo
                $expiryDate = $checkout->plan_type === 'Monthly'
                    ? now()->addMonth()
                    : now()->addYear();

                $checkout->update([
                    'start_date' => now(),
                    'expiry_date' => $expiryDate,
                ]);

                // 🧱 Tenant create karo
                $this->createTenantForCheckout($checkout);

                // 📧 Confirmation email bhejna
                Mail::to($checkout->email)->send(new PlanPurchasedMail($checkout));

                // 📆 Scheduled reminder emails
                Mail::to($checkout->email)->later(now()->addWeek(), new PlanPurchasedMail($checkout));
                Mail::to($checkout->email)->later($expiryDate->copy()->subDays(3), new PlanPurchasedMail($checkout));

                // ✅ Only now show success page
                return view('success', ['status' => 'succeeded', 'checkout' => $checkout]);
            }

            // ❌ Agar payment cancel / failed ho
            abort(403, 'Payment not verified.');
        } catch (\Exception $e) {
            // ⚠️ Stripe ya API error
            abort(403, 'Invalid or expired payment session.');
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
