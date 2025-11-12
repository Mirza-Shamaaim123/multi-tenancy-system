<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Checkout extends Model
{
    //
     protected $table = 'checkout';
    protected $fillable = [
         'name',
        'email',
        'domain',
        'store_name',
        'payment_method',
        'status',
        'plan_name',
        'plan_type',
        'expiry_date',
        'start_date',
        'amount',
        'stripe_customer_id',
        'stripe_subscription_id',
        'stripe_price_id',
    ];
    public function tenant()
{
    return $this->hasOne(Tenant::class);
}
}
