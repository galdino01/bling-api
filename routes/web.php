<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::view('/dashboard', 'dashboard')->name('dashboard');

// Route::prefix('dashboard')->group(function () {
//     Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// });

Route::prefix('categories')->group(function () {
    Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
    Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
    Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
    Route::get('{id}/show', [CategoryController::class, 'show'])->name('categories.show');
    Route::get('{id}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
    Route::patch('{id}', [CategoryController::class, 'update'])->name('categories.update');
    Route::patch('{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
});

Route::prefix('products')->group(function () {
    Route::get('/', [ProductController::class, 'index'])->name('products.index');
    Route::get('create', [ProductController::class, 'create'])->name('products.create');
    Route::post('store', [ProductController::class, 'store'])->name('products.store');
    Route::get('{id}/show', [ProductController::class, 'show'])->name('products.show');
    Route::get('{id}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::patch('{id}', [ProductController::class, 'update'])->name('products.update');
    Route::patch('{id}', [ProductController::class, 'destroy'])->name('products.destroy');
});

Route::prefix('orders')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->name('orders.index');
    Route::get('create', [OrderController::class, 'create'])->name('orders.create');
    Route::post('store', [OrderController::class, 'store'])->name('orders.store');
    Route::get('{id}/show', [OrderController::class, 'show'])->name('orders.show');
    Route::get('{id}/edit', [OrderController::class, 'edit'])->name('orders.edit');
    Route::patch('{id}', [OrderController::class, 'update'])->name('orders.update');
    Route::patch('{id}', [OrderController::class, 'destroy'])->name('orders.destroy');
});
