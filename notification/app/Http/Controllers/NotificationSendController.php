<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;




class NotificationSendController extends Controller
{

public function updateDeviceToken(Request $request)
    {
          updateDeviceToken($request);
    

    }

    public function sendNotification(Request $request)
    {

        $response = sendNotification($request);
            dd ($response);
    }
}
