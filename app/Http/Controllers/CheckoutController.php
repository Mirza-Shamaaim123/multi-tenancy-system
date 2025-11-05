<?php

namespace App\Http\Controllers;

use App\Mail\PlanPurchasedMail;
use App\Models\Checkout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

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

        if ($session_id) {
            \Stripe\Stripe::setApiKey(config('services.stripe.secret'));

            // Stripe Session fetch karo
            $session = \Stripe\Checkout\Session::retrieve($session_id);

            // PaymentIntent fetch karo
            $paymentIntent = \Stripe\PaymentIntent::retrieve($session->payment_intent);

            // PaymentIntent ka status lo (e.g. "succeeded", "canceled", etc.)
            $status = $paymentIntent->status;

            // Checkout record find karo
            $checkout = Checkout::find($session->metadata->checkout_id ?? null);

            if ($checkout) {
                // Database me status update karo
                $checkout->update(['status' => $status]);

                // ✅ Payment success hone par email bhejna
                if ($status === 'succeeded') {
                    Mail::to($checkout->email)->send(new PlanPurchasedMail($checkout));
                }
            }
        }

        return view('success', ['status' => $status ?? 'unknown']);
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
}
