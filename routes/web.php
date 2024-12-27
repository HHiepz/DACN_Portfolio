<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProductDetailController;

use App\Http\Controllers\Admin\DashboardController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/product', [ProductController::class, 'index'])->name('product');
Route::get('/product/{id}', [ProductDetailController::class, 'index'])->name('product.detail');

Route::group(['prefix' => 'admin'], function () {
    Route::controller(DashboardController::class)->group(function () {
        Route::get('/', 'index')->name('admin.dashboard');
    });
});
