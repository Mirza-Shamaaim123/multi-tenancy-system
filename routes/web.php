<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;




// routes/web.php, api.php or any other central route files you have

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            return view('welcome');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->middleware(['auth', 'verified'])->name('dashboard');

        Route::middleware('auth')->group(function () {
            Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
            Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
            Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
            // Route::resource('tenants', TenantController::class);
            Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');
            Route::get('/tenants/create', [TenantController::class, 'create'])->name('tenants.create');
            Route::post('/tenants', [TenantController::class, 'store'])->name('tenants.store');
            Route::get('/tenants/edit/{id}', [TenantController::class, 'edit'])->name('tenants.edit');
            Route::put('/tenants/update/{id}', [TenantController::class, 'update'])->name('tenants.update');
            Route::delete('/tenants/{tenant}', [TenantController::class, 'destroy'])->name('tenants.destroy');
            //          WAREHOUSE ROUTES
             Route::get('/warehouse', function () {
            return view('warehouse.index');
        })->name('warehouse.index');


        });

        require __DIR__ . '/auth.php';
    });
}
