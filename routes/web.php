<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;

Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::view('/dashboard', 'dashboard')->name('dashboard');

// Route::prefix('dashboard')->group(function () {
//     Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard');
// });

Route::resource('products', ProductController::class)->parameters(['products' => 'id']);
Route::resource('orders', OrderController::class)->parameters(['orders' => 'id']);
