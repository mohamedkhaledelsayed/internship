<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NotificationSendController;
use App\Http\Controllers\ProductAjaxController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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
// Route::get('categories/{id}/edit', 'CategoryController@edit')->name('categories.edit');






Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ],
    function () {
        Route::resource('categories', CategoryController::class);
        Route::resource('products', ProductController::class);
        Route::resource('product', ProductAjaxController::class);

        Auth::routes();

        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::group(['middleware' => 'auth'], function () {
            Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
            Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
        });
    }
);

