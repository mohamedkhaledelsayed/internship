<?php

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Route;


Route::get('/users', function (){
    $expired_users = User::where('start_date', '<=', Carbon::now())->get();
    return response()->json(
        [
            "users"=> $expired_users
        ]
    );
});
