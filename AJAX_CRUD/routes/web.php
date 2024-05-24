<?php

use App\Http\Controllers\ClientController;
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

Route::get('/',[ClientController::class,'index']);
Route::post('/store',[ClientController::class,'store']);
Route::get('edit-client/{id}',[ClientController::class,'edit']);
Route::post('update',[ClientController::class,'update']);
Route::get('delete-client/{id}',[ClientController::class,'delete']);
