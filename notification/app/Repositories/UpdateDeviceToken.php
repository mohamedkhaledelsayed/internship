<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UpdateDeviceToken
{
    public function updateDeviceToken($request)
    {
        Auth::user()->device_token =  $request->token;
        Auth::user()->save();

        return response()->json(['Token successfully stored.']);
    }
}





