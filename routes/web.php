<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProductDetailController;

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\SkillCategoryController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\ProductCategoryController;
use App\Http\Controllers\Admin\ProductTechnologyController;
use App\Http\Controllers\Admin\TechnologyController;

// Client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product', [ClientProductController::class, 'index'])->name('product');
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

    Route::controller(SkillController::class)->group(function () {
        Route::post('/skill/store', 'store')->name('admin.skill.store');
        Route::put('/skill/update/{id}', 'update')->name('admin.skill.update');
        Route::delete('/skill/delete/{id}', 'destroy')->name('admin.skill.delete');
        Route::put('/skill/priority/up/{id}', 'upPriority')->name('admin.skill.priority.up');
        Route::put('/skill/priority/down/{id}', 'downPriority')->name('admin.skill.priority.down');
        Route::put('/skill/priority/reset/{id}', 'resetPriority')->name('admin.skill.priority.reset');
    });

    Route::controller(SkillCategoryController::class)->group(function () {
        Route::get('/skill-categories', 'index')->name('admin.skill-categories');
        Route::get('/skill-category/create', 'create')->name('admin.skill-category.create');
        Route::post('/skill-category/store', 'store')->name('admin.skill-category.store');
        Route::get('/skill-category/edit/{id}', 'edit')->name('admin.skill-category.edit');
        Route::put('/skill-category/update/{id}', 'update')->name('admin.skill-category.update');
        Route::delete('/skill-category/delete/{id}', 'destroy')->name('admin.skill-category.delete');
        Route::put('/skill-category/priority/up/{id}', 'upPriority')->name('admin.skill-category.priority.up');
        Route::put('/skill-category/priority/down/{id}', 'downPriority')->name('admin.skill-category.priority.down');
        Route::put('/skill-category/priority/reset/{id}', 'resetPriority')->name('admin.skill-category.priority.reset');
    });

    Route::controller(AdminProductController::class)->group(function () {
        Route::get('/products', 'index')->name('admin.products');
        Route::get('/product/create', 'create')->name('admin.product.create');
        Route::post('/product/store', 'store')->name('admin.product.store');
        Route::get('/product/edit/{id}', 'edit')->name('admin.product.edit');
        Route::put('/product/update/{id}', 'update')->name('admin.product.update');
        Route::delete('/product/delete/{id}', 'destroy')->name('admin.product.delete');
        Route::put('/product/priority/up/{id}', 'upPriority')->name('admin.product.priority.up');
        Route::put('/product/priority/down/{id}', 'downPriority')->name('admin.product.priority.down');
        Route::put('/product/priority/reset/{id}', 'resetPriority')->name('admin.product.priority.reset');
    });

    Route::controller(TechnologyController::class)->group(function () {
        Route::get('/technologies', 'index')->name('admin.technologies');
        Route::get('/technology/create', 'create')->name('admin.technology.create');
        Route::post('/technology/store', 'store')->name('admin.technology.store');
        Route::get('/technology/edit/{id}', 'edit')->name('admin.technology.edit');
        Route::put('/technology/update/{id}', 'update')->name('admin.technology.update');
        Route::delete('/technology/delete/{id}', 'destroy')->name('admin.technology.delete');
    });

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/product-categories', 'index')->name('admin.product-categories');
        Route::get('/product-category/create', 'create')->name('admin.product-category.create');
        Route::post('/product-category/store', 'store')->name('admin.product-category.store');
        Route::get('/product-category/edit/{id}', 'edit')->name('admin.product-category.edit');
        Route::put('/product-category/update/{id}', 'update')->name('admin.product-category.update');
        Route::delete('/product-category/delete/{id}', 'destroy')->name('admin.product-category.delete');
    });
});
