<?php

use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('product_types', ProductTypeController::class);
Route::resource('products', ProductController::class);
Route::post('product-update/{id}', [ProductController::class, 'update']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
