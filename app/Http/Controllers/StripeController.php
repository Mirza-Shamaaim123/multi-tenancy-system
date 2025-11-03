<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Charge;

class StripeController extends Controller
{
    public function index()
    {
        return view('stripe');
    }

    public function store(Request $request)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        $charge = Charge::create([
            "amount" => 2900 * 1, // in cents (e.g. $29.00)
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Payment for Starter Plan"
        ]);

        return back()->with('success', 'Payment successful!');
    }
}

