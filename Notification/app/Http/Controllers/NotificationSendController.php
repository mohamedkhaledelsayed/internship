<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use function App\Helpers\Notificationsss;
use function App\Helpers\SendNotification;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        Auth::user()->device_token =  $request->token;

        Auth::user()->save();

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();
        $serverKey = 'AAAAqwiVsSc:APA91bFeInU9nhI8iljkWrM9dyMLypv7MXwwrZMg7UTNNgOYsRqwxsQxxf_nm3I_GaquGkwG60aYGxg_HsZdFl9L7IXxYxpNfaNFAWHrOAp1Jp_OgWSI4lSum3JiJ8-olo48jA_caHqJ';

        SendNotification ($request,$url,$FcmToken,$serverKey);

    }
}
