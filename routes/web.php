<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Optional: Redirect to a default page like products index
    return redirect()->route('products.index');
    // return view('welcome');
});

// Product Routes
Route::resource('products', ProductController::class)->only(['index', 'show']);

// Customer Routes
Route::resource('customers', CustomerController::class)->only(['index', 'show']);

// Order Routes
Route::resource('orders', OrderController::class)->only(['index', 'show']);
