<?php

use App\Http\Controllers\PlanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenantController;
use App\Http\Controllers\WarehouseController;
use App\Models\Warehouse;
use Illuminate\Support\Facades\Route;
use App\Models\Plan;










// routes/web.php, api.php or any other central route files you have

foreach (config('tenancy.central_domains') as $domain) {
    Route::domain($domain)->group(function () {

        Route::get('/', function () {
            return view('admin.welcome');
        })->name('home');
        Route::get('/about', function () {
            return view('about');
        })->name('about');
        Route::get('/plan', function () {
              $plans = Plan::all()->groupBy('plan');
            return view('plan', compact('plans'));
        })->name('plan');

        Route::get('/checkout', function () {
            
            return view('checkout');
        })->name('checkout');

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
                $warehouses = Warehouse::latest()->paginate(1);
            return view('warehouse.index', compact('warehouses'));
        })->name('warehouse.index');
        Route::get('/warehouse/create', [WarehouseController::class, 'create'])->name('warehouse.create');
        Route::post('/warehouse', [WarehouseController::class, 'store'])->name('warehouse.store');
        Route::get('/warehouse/edit/{id}', [WarehouseController::class, 'edit'])->name('warehouse.edit');
        Route::put('/warehouse/update/{id}', [WarehouseController::class, 'update'])->name('warehouse.update');
        Route::delete('/warehouse/{warehouse}', [WarehouseController::class, 'destroy'])->name('warehouse.destroy');

        Route::get('/plans', [PlanController::class, 'index'])->name('plans.index');
        Route::get('/plans/create', [PlanController::class, 'create'])->name('plans.create');
        Route::post('/plans', [PlanController::class, 'store'])->name('plans.store');
        Route::get('/plans/edit/{id}', [PlanController::class, 'edit'])->name('plans.edit');
        Route::put('/plans/{id}', [PlanController::class, 'update'])->name('plans.update');
        Route::delete('/plans/{id}', [PlanController::class, 'destroy'])->name('plans.destroy');




        });

        require __DIR__ . '/auth.php';
    });
}
