<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET'); // ye secret Stripe dashboard se milega

        try {
            $event = Webhook::constructEvent(
                $payload, $sigHeader, $endpointSecret
            );
        } catch(\Exception $e) {
            return response('Webhook signature verification failed.', 400);
        }

        // Event handling
        switch ($event->type) {
            case 'checkout.session.completed':
                $session = $event->data->object;
                // Payment success logic yahan likhe
                break;
            case 'invoice.payment_succeeded':
                // Subscription payment success logic
                break;
            case 'customer.subscription.updated':
                // Subscription updated logic
                break;
        }

        return response('Webhook handled', 200);
    }
}
