<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationSendController;

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
    return view('home');
});

Route::group(['middleware' => 'auth'],function(){
    Route::post('/store-token', [NotificationSendController::class, 'updateDeviceToken'])->name('store.token');
    Route::post('/send-web-notification', [NotificationSendController::class, 'sendNotification'])->name('send.web-notification');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

use App\Mail\SampleEmail;
use App\Mail\WelcomeMail;

Route::get('/send-mail', function () {
    $data = [
        'name' => 'NPC',
        'email' => 'test@dummy.com'
    ];

    \Mail::to('mohamedelmasry2595@gmail.com')->send(new SampleEmail($data));

    return "Mail Sent Successfully!!";
});

Route::get('/send-email', function () {
Mail::to('mohamedelmasry2595@gmail.com')->send(new WelcomeMail([
    'name' => 'Demo',
]));
return "Mail Sent Successfully!!";
});
