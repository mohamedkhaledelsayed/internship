<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/categories', [CategoryController::class, 'allCategories'])->name('allCategories');
Route::get('/dashboard', function(){
    return view('Dashboard.index');
})->name('allCategories');