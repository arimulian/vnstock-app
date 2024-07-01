<?php

use App\Http\Controllers\LoginController;
use App\Livewire\Categories\CreateCategory;
use App\Livewire\Categories\ListCategory;
use App\Livewire\Categories\UpdateCategory;
use App\Livewire\Dashboard;
use App\Livewire\Products\CreateProduct;
use App\Livewire\Products\ListProduct;
use App\Livewire\Products\UpdateProduct;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
});

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

//    ROUTE_PRODUCTS
    Route::get('/products', ListProduct::class)->name('product.list');
    Route::get('/products/create', CreateProduct::class)->name('product.create');
    Route::get('/products/update/{product:slug}', UpdateProduct::class)->name('product.update');
//    ROUTE_CATEGORIES
    Route::get('/categories', ListCategory::class)->name('category.list');
    Route::get('/categories/create', CreateCategory::class)->name('category.create');
    Route::get('/categories/update/{category:name}', UpdateCategory::class)->name('category.update');
});

