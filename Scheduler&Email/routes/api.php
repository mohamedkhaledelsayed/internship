<?php

use Carbon\Carbon;
use App\Models\User;
use App\Mail\DeactivateMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


Route::get('/users', function (){
    $expired_users = User::where('start_date', '<=', Carbon::now())->get();
    Mail::to('ahmedfathiaboelanin@gmail.com')->send(new DeactivateMail());
    return response()->json(
        [
            "users"=> $expired_users,
            "message" => "Deactivation process completed."
        ]
    );
});
