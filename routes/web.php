<?php

use Illuminate\Support\Facades\Route;

Route::get('/', \App\Http\Controllers\LoginController::class);
Route::get('/dashboard', \App\Livewire\Dashboard::class);

