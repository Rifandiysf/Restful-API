<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\ProductTypeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::resource('banners', BannerController::class);
Route::resource('product_types', ProductTypeController::class);
Route::resource('products', ProductController::class);
Route::post('product-update/{id}', [ProductController::class, 'update']);
Route::post('banner-update/{id}', [BannerController::class, 'update']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
