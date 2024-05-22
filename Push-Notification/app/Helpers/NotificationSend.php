<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


function sendNotification($title, $body, $tokens = null)
{
    $url = 'https://fcm.googleapis.com/fcm/send';
    $serverKey = 'AAAATv33oKk:APA91bFljOVLw3dZudQtY3O5f1HE_5kgeMxFEjHv-kQArRfyWTTIJv1_SMHL2bi15Lxxk5SB-Ow8I9iNPnJ8JvN6KH5aDHIfTFavXE2Ge7fTms-OGe4J4XTGSeJpS5ZLJQoNin527_aa';

    if (is_null($tokens)) {
        $tokens = User::whereNotNull('device_token')->pluck('device_token')->all();
    }

    $data = [
        "registration_ids" => $tokens,
        "notification" => [
            "title" => $title,
            "body" => $body,
        ]
    ];

    $headers = [
        'Authorization' => 'key=' . $serverKey,
        'Content-Type' => 'application/json',
    ];

    $response = Http::withHeaders($headers)->post($url, $data);

    if ($response->failed()) {
        throw new \Exception('FCM Notification failed: ' . $response->body());
    }
}

function updateDeviceToken($token)
{
    $user = Auth::user();
    $user->device_token = $token;
    $user->save();
}