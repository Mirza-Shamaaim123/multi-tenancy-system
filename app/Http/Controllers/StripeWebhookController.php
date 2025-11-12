<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Webhook;
use App\Models\Tenant;

class StripeWebhookController extends Controller
{
    public function handleWebhook(Request $request)
    {
        $payload = $request->getContent();
        $sigHeader = $request->header('Stripe-Signature');
        $endpointSecret = env('STRIPE_WEBHOOK_SECRET');

        try {
            $event = Webhook::constructEvent($payload, $sigHeader, $endpointSecret);
        } catch (\Exception $e) {
            return response('Webhook signature verification failed.', 400);
        }

        switch ($event->type) {

            // ✅ Checkout payment completed
            case 'checkout.session.completed':
                $session = $event->data->object;

                $tenant = Tenant::where('email', $session->customer_email)->first();
                if ($tenant) {
                    $tenant->status = 'active';
                    $tenant->plan_start_date = now();
                    if ($tenant->plan_type === 'Monthly') {
                        $tenant->plan_end_date = now()->addMonth();
                    } elseif ($tenant->plan_type === 'Yearly') {
                        $tenant->plan_end_date = now()->addYear();
                    }
                    $tenant->save();
                }
                break;

            // ✅ Subscription payment success (renewal)
            case 'invoice.payment_succeeded':
                $customerId = $event->data->object->customer;
                $tenant = Tenant::where('stripe_customer_id', $customerId)->first();
                if ($tenant) {
                    $tenant->status = 'active';
                    $tenant->plan_start_date = now();
                      if ($tenant->plan_type === 'Monthly') {
                        $tenant->plan_end_date = now()->addMonth();
                    } elseif ($tenant->plan_type === 'Yearly') {
                        $tenant->plan_end_date = now()->addYear();
                    }
                    $tenant->save();
                }
                break;

            // ✅ Subscription cancelled or deleted
            case 'customer.subscription.deleted':
                $customerId = $event->data->object->customer;
                $tenant = Tenant::where('stripe_customer_id', $customerId)->first();
                if ($tenant) {
                    $tenant->status = 'inactive';
                    $tenant->plan_end_date = now();
                      if ($tenant->plan_type === 'Monthly') {
                        $tenant->plan_end_date = now()->addMonth();
                    } elseif ($tenant->plan_type === 'Yearly') {
                        $tenant->plan_end_date = now()->addYear();
                    }
                    $tenant->save();
                }
                break;
        }

        return response('Webhook handled', 200);
    }
}
