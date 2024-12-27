<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProductDetailController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Admin\DashboardController;

// Client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductDetailController::class, 'index'])->name('product.detail');

// Auth
Route::group(['prefix' => 'auth'], function () {
    Route::middleware('guest')->group(function () {
        Route::get('/login', [LoginController::class, 'index'])->name('login');
        Route::post('/login', [LoginController::class, 'login'])->name('login.post');
    });
    Route::get('/logout', [LogoutController::class, 'logout'])->name('logout');
});

// Admin
Route::group(['prefix' => 'admin'], function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard')
        ->middleware('auth');
});
