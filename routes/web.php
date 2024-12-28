<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController;
use App\Http\Controllers\Client\ProductDetailController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;

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
Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    Route::get('/', [DashboardController::class, 'index'])
        ->name('admin.dashboard');

    Route::controller(LanguageController::class)->group(function () {
        Route::get('/languages', 'index')->name('admin.languages');
        Route::get('/language/create', 'create')->name('admin.language.create');
        Route::post('/language/store', 'store')->name('admin.language.store');
        Route::get('/language/edit/{id}', 'edit')->name('admin.language.edit');
        Route::put('/language/update/{id}', 'update')->name('admin.language.update');
        Route::delete('/language/delete/{id}', 'destroy')->name('admin.language.delete');
        Route::put('/language/priority/up/{id}', 'upPriority')->name('admin.language.priority.up');
        Route::put('/language/priority/down/{id}', 'downPriority')->name('admin.language.priority.down');
        Route::put('/language/priority/reset/{id}', 'resetPriority')->name('admin.language.priority.reset');
    });
});
