<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerifyPaymentSuccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
          // ✅ Check if user came after successful payment
        if (!session('payment_verified')) {
            // agar session set nahi hai, to unauthorized access
            abort(403, 'Unauthorized access to success page.');
        }

        // ✅ Ek dafa dikhane ke baad flag remove kar do
        session()->forget('payment_verified');
        return $next($request);
    }
}
