<?php

namespace App\Http\Controllers;

use App\Models\Checkout;
use Illuminate\Http\Request;
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
        ]);

        $checkout = Checkout::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'domain' => $validated['domain'],
            'payment_method' => $validated['payment_method'],
            'status' => 'pending', // default status
        ]);
        if ($validated['payment_method'] === 'stripe') {
            return redirect()->route('checkout.stripe', $checkout->id);
        }
        // dd($validated);

        return redirect()->back()->with('success', 'Checkout information saved successfully!');
    }


    public function stripeCheckout($id)
    {
        $checkout = Checkout::findOrFail($id);

        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

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

        return redirect($session->url);
    }


    public function success(Request $request)
    {
        $sessionId = $request->query('session_id'); // Stripe se mila hua session_id

        if ($sessionId) {
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $session = \Stripe\Checkout\Session::retrieve($sessionId);

            // 👇 metadata se checkout_id nikal lo
            if (isset($session->metadata->checkout_id)) {
                $checkout = Checkout::find($session->metadata->checkout_id);
                if ($checkout) {
                    $checkout->update(['status' => 'success']);
                }
            }
        }

        return view('success');
    }


    public function cancel()
    {
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
