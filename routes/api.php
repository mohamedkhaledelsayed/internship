<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// category route group
Route::group(['prefix' => 'categories'], function () {
    Route::get('/', [CategoryController::class,"allCategories"]);
    Route::get('/{id}', [CategoryController::class,"getCategory"]);
    Route::post('/', [CategoryController::class,"storeCategory"]);
    Route::put('/{id}', [CategoryController::class,"updateCategory"]);
    Route::delete('/{id}', [CategoryController::class,"deleteCategory"]);
});

// product route group
Route::group(['prefix' => 'products'], function () {
    Route::get('/', [ProductController::class,"allProducts"]);
    Route::get('/{id}', [ProductController::class,"getProduct"]);
    Route::post('/', [ProductController::class,"storeProduct"]);
    Route::put('/{id}', [ProductController::class,"updateProduct"]);
    Route::delete('/{id}', [ProductController::class,"deleteProduct"]);
});