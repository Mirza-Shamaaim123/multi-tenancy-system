<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPlanExpiry
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
         // 🧠 tenant() function use karo agar Stancl Tenancy use kar rahe ho
        $tenant = tenant(); 
       

        if ($tenant && $tenant->plan_end_date) {
            // Agar current date expiry_date se aage nikal gayi
            if (now()->greaterThan($tenant->plan_end_date)) {
                // User ka plan expire ho gaya
                return response('subscription_expired');
                // OR redirect karna chaho to:
                // return redirect()->route('subscription.expired');
            }
        }


        return $next($request);
    }
}
