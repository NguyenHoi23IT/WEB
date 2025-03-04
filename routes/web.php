<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashBoardController;
use App\Http\Controllers\DestinationsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\AuthAdmin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

Auth::routes();

Route::middleware(['auth', AuthAdmin::class])->prefix('admin')->group(function () {

    Route::get('/', [DashBoardController::class, 'index'])->name('admin.dashboard.index');
    
    Route::get('/category', [CategoryController::class, 'index'])->name('admin.category.index');
    Route::get('/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/category/{id}/edit', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::put('/category/{id}/update', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::delete('/category/{id}/destroy', [CategoryController::class, 'destroy'])->name('admin.category.destroy');

    Route::get('/destinations', [DestinationsController::class, 'index'])->name('admin.destinations.index');
    Route::get('/destinations/create', [DestinationsController::class, 'create'])->name('admin.destinations.create');
    Route::post('/desitinations/store', [DestinationsController::class, 'store'])->name('admin.destinations.store');
    Route::get('/destinations/{id}/edit', [DestinationsController::class, 'edit'])->name('admin.destinations.edit');
    Route::put('/destinations/{id}/update', [DestinationsController::class, 'update'])->name('admin.destinations.update');
    Route::delete('/destinations/{id}/destroy', [DestinationsController::class, 'destroy'])->name('admin.destinations.destroy');

    Route::get('/tag', [TagController::class, 'index'])->name('admin.tag.index');
    Route::get('/tag/create', [TagController::class, 'create'])->name('admin.tag.create');
    Route::post('/tag/store', [TagController::class, 'store'])->name('admin.tag.store');
    Route::get('/tag/{id}/edit', [TagController::class, 'edit'])->name('admin.tag.edit');
    Route::put('/tag/{id}/update', [TagController::class, 'update'])->name('admin.tag.update');
    Route::delete('/tag/{id}/destroy', [TagController::class, 'destroy'])->name('admin.tag.destroy');
    
    Route::get('/blog', [BlogController::class, 'index'])->name('admin.blog.index');
    Route::get('/blog/create', [BlogController::class, 'create'])->name('admin.blog.create');
    Route::post('blog/store', [BlogController::class, 'store'])->name('admin.blog.store');
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit'])->name('admin.blog.edit');
    Route::put('/blog/{id}/update', [BlogController::class, 'update'])->name('admin.blog.update');
    Route::delete('/blog/{id}/destroy', [BlogController::class, 'destroy'])->name('admin.blog.destroy');

    Route::get('/user', action: [UserController::class, 'index'])->name('admin.user.index');
    Route::put('/user/{id}/updateRole', [UserController::class, 'updateRole'])->name('admin.user.updateRole');
    Route::delete('/user/{id}/destroy', [UserController::class, 'destroy'])->name('admin.user.destroy');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('admin.checkout.index');
    Route::put('/checkout/{id}/updateStatus', [CheckoutController::class, 'updateStatus'])->name('admin.checkout.updateStatus');
});

Route::get('/', [PageController::class, 'index'])->name('pages.welcome');

Route::get('/about', [PageController::class, 'about'])->name('pages.about');

Route::get('/packages', [PageController::class, 'packages'])->name('pages.packages');

Route::get('/blog', [PageController::class, 'blog'])->name('pages.blog');

Route::get('/blog/detail/{slug}', [BlogController::class, 'blogDetail'])->name('pages.blog.detail');

Route::get('/contact', [PageController::class, 'contact'])->name('pages.contact');

Route::get('destination/detail/{slug}', [PageController::class, 'detail'])->name('pages.detail');

Route::get('/cart', [PageController::class, 'cart'])->name('pages.cart');

Route::get('/checkout/{id}', [PageController::class, 'checkout'])->name('pages.checkout');

Route::get('/stripe', [PageController::class, 'stripe'])->name('pages.stripe');

Route::post('/checkout/store', [CheckoutController::class, 'store'])->name('checkout.store');