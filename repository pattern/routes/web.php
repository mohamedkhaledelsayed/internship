<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Category\CategoryController;

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath','auth','hasRole' ]
    ], function(){

        Route::get('/', function () {
            return view('dashboard');
        });

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

     Route::resource('permission', PermissionController::class);
     Route::resource('role', RoleController::class);
     Route::get('role/{roleID}/give-permissions', [RoleController::class, 'addPermissionToRole']);
     Route::put('role/{roleID}/give-permissions', [RoleController::class, 'givePermissionToRole']);
     Route::resource('product',ProductController::class);
     Route::resource('category',CategoryController::class);
     Route::resource('users', UserController::class);
     Route::get('/fetch-product', [ProductController::class, 'fetch_json']);
});

require __DIR__.'/auth.php';