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
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
Route::group(['prefix' => 'products'], function () {
    Route::get('/{category}', [ProductController::class, 'index'])->name('products.index');
    Route::get('/fetch-products', [ProductController::class, 'fetchProducts']);
    Route::post('/products', [ProductController::class, 'store']);
    Route::get('/edit-product/{id}', [ProductController::class, 'edit']);
    Route::put('/update-product/{id}', [ProductController::class, 'update']);
    Route::delete('/delete-product/{id}', [ProductController::class, 'destroy']);
});
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
