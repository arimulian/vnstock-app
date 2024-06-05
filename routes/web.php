<?php

use App\Http\Controllers\LoginController;
use App\Livewire\Dashboard;
use Illuminate\Auth\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', Dashboard::class)->name('dashboard');
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});

