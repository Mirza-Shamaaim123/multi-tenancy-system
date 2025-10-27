<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminOnly
{
    public function handle(Request $request, Closure $next): Response
    {
        // ✅ Tenant access deny
        if (tenant()) {
            abort(403, 'Access denied — Tenants cannot access admin area.');
        }

        // ✅ Agar user logged in nahi hai
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // ✅ Agar user ka role 'admin' nahi hai
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Unauthorized access.');
        }

        return $next($request);
    }
}
