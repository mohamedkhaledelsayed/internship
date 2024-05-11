<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Product\ProductController;

Route::get('/', function () {
    return view('index');
});

Route::resource('product',ProductController::class);
Route::resource('category',CategoryController::class);