<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

// Grouped routes for categories

Route::group(['prefix' => 'products'], function () {
    Route::get('/create', [ProductController::class, 'create'])->name('products.create');
    Route::get('/{category}', [ProductController::class, 'index'])->name('products.index');
    Route::post('/store', [ProductController::class, 'store'])->name('products.store');
    Route::get('/{category}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/{category}/update', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/{category}/destroy', [ProductController::class, 'destroy'])->name('products.destroy');
});




// Route::post('change-language/{locale}', function ($locale) {
//     \Session::put('locale', $locale);
//     echo''. $locale .'';
//     return redirect()->back();
// })->name('change.language');

Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
	/** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
	Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('/store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('/{category}', [CategoryController::class, 'show'])->name('categories.show');
        Route::get('/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::put('/{category}/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::delete('/{category}/destroy', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    Route::post('change-language/{locale}', function ($locale) {
        \Session::put('locale', $locale);
        return redirect()->back();
    })->name('change.language');
});
// Route::get('current-locale', function () {
//     // Get the current session locale
//     $locale = Session::get('locale');

//     // Return the current locale
//     return $locale;
// });
