<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Client\ProductController as ClientProductController;
use App\Http\Controllers\Client\ProductDetailController;
use App\Http\Controllers\Client\SocialController as ClientSocialController;
use App\Http\Controllers\Client\SocialDetailController;


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
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SocialCategoryController;
use App\Http\Controllers\Admin\ProfileController;
use App\Models\Social;

// Client
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/products', [ClientProductController::class, 'index'])->name('products');
Route::get('/product/{id}', [ProductDetailController::class, 'index'])->name('product.detail');
Route::get('/product/technology/{id}', [ClientProductController::class, 'show'])->name('product.search.technology');
Route::get('/socials', [ClientSocialController::class, 'index'])->name('socials');
Route::get('/social/{id}', [SocialDetailController::class, 'index'])->name('social.detail');

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
        Route::post('/product/{id}/image/store', 'storeImage')->name('admin.product.image.store');
        Route::delete('/product/image/delete/{id}', 'destroyImage')->name('admin.product.image.delete');
    });

    Route::controller(TechnologyController::class)->group(function () {
        Route::get('/technologies', 'index')->name('admin.technologies');
        Route::get('/technology/create', 'create')->name('admin.technology.create');
        Route::post('/technology/store', 'store')->name('admin.technology.store');
        Route::get('/technology/edit/{id}', 'edit')->name('admin.technology.edit');
        Route::put('/technology/update/{id}', 'update')->name('admin.technology.update');
        Route::delete('/technology/delete/{id}', 'destroy')->name('admin.technology.delete');
        Route::put('/technology/toggle/{id}', 'toggleTechnologyVisibility')->name('admin.toggleTechnology.update');
    });

    Route::controller(ProductCategoryController::class)->group(function () {
        Route::get('/product-categories', 'index')->name('admin.product-categories');
        Route::get('/product-category/create', 'create')->name('admin.product-category.create');
        Route::post('/product-category/store', 'store')->name('admin.product-category.store');
        Route::get('/product-category/edit/{id}', 'edit')->name('admin.product-category.edit');
        Route::put('/product-category/update/{id}', 'update')->name('admin.product-category.update');
        Route::delete('/product-category/delete/{id}', 'destroy')->name('admin.product-category.delete');
    });

    Route::controller(SocialController::class)->group(function () {
        Route::get('/socials', 'index')->name('admin.socials');
        Route::get('/social/create', 'create')->name('admin.social.create');
        Route::get('/social/edit/{id}', 'edit')->name('admin.social.edit');
        Route::put('/social/update/{id}', 'update')->name('admin.social.update');
        Route::post('/social/store', 'store')->name('admin.social.store');
        Route::delete('/social/delete/{id}', 'destroy')->name('admin.social.delete');
        Route::put('/social/priority/up/{id}', 'upPriority')->name('admin.social.priority.up');
        Route::put('/social/priority/down/{id}', 'downPriority')->name('admin.social.priority.down');
        Route::put('/social/priority/reset/{id}', 'resetPriority')->name('admin.social.priority.reset');
    });

    Route::controller(SocialCategoryController::class)->group(function () {
        Route::get('/social-categories', 'index')->name('admin.social-categories');
        Route::get('/social-category/create', 'create')->name('admin.social-category.create');
        Route::post('/social-category/store', 'store')->name('admin.social-category.store');
        Route::get('/social-category/edit/{id}', 'edit')->name('admin.social-category.edit');
        Route::put('/social-category/update/{id}', 'update')->name('admin.social-category.update');
        Route::delete('/social-category/delete/{id}', 'destroy')->name('admin.social-category.delete');
    });

    Route::controller(ProfileController::class)->group(function () {
        Route::get('/profile/edit', 'edit')->name('admin.profile.edit');
        Route::put('/profile/update', 'update')->name('admin.profile.update');
        Route::post('/profile/file/store', 'storeFile')->name('admin.profile.file.store');
        Route::delete('/profile/file/delete/{id}', 'destroyFile')->name('admin.profile.file.delete');
        Route::put('/profile/file/display/remove', 'disableFileDisplay')->name('admin.profile.file.disable');
        Route::put('/profile/file/display/active/{id}', 'enableFileDisplay')->name('admin.profile.file.active');
        Route::get('/profile/password/edit', 'editPassword')->name('admin.profile.passowrd.edit');
        Route::put('/profile/password/update', 'updatePassword')->name('admin.profile.passowrd.update');
    });
});
