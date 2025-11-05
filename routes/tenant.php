<?php

declare(strict_types=1);

use App\Http\Controllers\TenantController;
use Illuminate\Support\Facades\Route;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Stancl\Tenancy\Middleware\PreventAccessFromCentralDomains;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\SubCategoryController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\FrontendController;





























/*
|--------------------------------------------------------------------------
| Tenant Routes
|--------------------------------------------------------------------------
|
| Here you can register the tenant routes for your application.
| These routes are loaded by the TenantRouteServiceProvider.
|
| Feel free to customize them however you want. Good luck!
|
*/








Route::middleware([
    'web',
    InitializeTenancyByDomain::class,
    PreventAccessFromCentralDomains::class,
])->group(function () {
    // Route::get('/', function () {
    //     return 'Welcome' . tenant('id');
    // });
    Route::get('/test', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    Route::get('/tenants', function () {
        return 'This is your multi-tenant application. The id of the current tenant is ' . tenant('id');
    });
    //  Route::get('/tenants', [TenantController::class, 'index'])->name('tenants.index');

 Route::get('/', [AccountController::class, 'login'])->name('tenant.login');
Route::post('/logout', [AccountController::class, 'logout'])->name('logout');
Route::post('/authenticate', [AccountController::class, 'authenticate'])->name('login.authenticate');
Route::get('/register', [AccountController::class, 'register'])->name('tenant.register');
Route::get('/profile', [AccountController::class, 'profile'])->name('account.profile');
Route::put('/profile/update', [AccountController::class, 'update'])->name('profile.update');
Route::post('/registration', [AccountController::class, 'registration'])->name('tenant.registration');
Route::get('/dashboard', [FrontendController::class, 'index'])->name('tenant.dashboard');
Route::get('/product', [FrontendController::class, 'product'])->name('home.product');
Route::get('/add-product', [FrontendController::class, 'addproduct'])->name('add.product');
Route::get('/expired-product', [FrontendController::class, 'expiredproduct'])->name('expired.product');
Route::get('/stock', [FrontendController::class, 'stock'])->name('stock.page');
Route::get('/manger', [FrontendController::class, 'manager'])->name('manger.dashboard');
Route::get('/saleman', [FrontendController::class, 'saleman'])->name('saleman.dashboard');
Route::get('/category', [FrontendController::class, 'category'])->name('home.category');
Route::get('/brand', [FrontendController::class, 'brand'])->name('home.brand');
Route::post('/brand/update', [BrandController::class, 'update'])->name('brand.update');
Route::delete('/brand/delete/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
Route::post('/brand/store', [BrandController::class, 'store'])->name('brand.store');

Route::post('/category/store', [CategoryController::class, 'store'])->name('category.store');
Route::put('/category/update', [CategoryController::class, 'update'])->name('category.update');
Route::delete('/category/destroy', [CategoryController::class, 'destroy'])->name('category.destroy');

Route::get('/unit', [FrontendController::class, 'unit'])->name('home.unit');
Route::post('/unit/store', [UnitController::class, 'store'])->name('unit.store');
Route::put('/unit/update/{id}', [UnitController::class, 'update'])->name('unit.update');
Route::delete('/unit/delete/{id}', [UnitController::class, 'destroy'])->name('unit.destroy');

Route::get('/subcategory', [FrontendController::class, 'subcategory'])->name('home.subcategory');
Route::post('/subcategory/store', [SubCategoryController::class, 'store'])->name('subcategory.store');
Route::put('/subcategory/update/{id}', [SubcategoryController::class, 'update'])->name('subcategory.update');
Route::delete('/subcategory/delete/{id}', [SubcategoryController::class, 'destroy'])->name('subcategory.delete');






});
