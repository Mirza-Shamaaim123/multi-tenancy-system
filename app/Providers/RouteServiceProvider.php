<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;

class RouteServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->routes(function () {

            // 🌐 Central app (main)
            Route::middleware('web')
                ->group(base_path('routes/web.php'));

            // 🏢 Tenant routes (multi-tenant)
            Route::middleware([
                'web',
                InitializeTenancyByDomain::class,
                PreventAccessFromCentralDomains::class,
            ])->group(base_path('routes/tenant.php'));
        });
    }
}
