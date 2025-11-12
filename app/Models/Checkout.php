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
    ];
    public function tenant()
{
    return $this->hasOne(Tenant::class);
}
}
