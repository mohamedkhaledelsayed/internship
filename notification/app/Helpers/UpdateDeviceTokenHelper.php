<?php

namespace App\Helpers;
use Illuminate\Http\Request;
use Auth ;



if (!function_exists('updateDeviceToken')) {
function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;
        Auth::user()->save();

        return response()->json(['Token successfully stored.']);
    }
}



