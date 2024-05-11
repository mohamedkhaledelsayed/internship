<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        $user = Auth::user();
        $user->device_token = $request->token;
        $user->save();

        return response()->json(['Token successfully stored.']);
    }

    public function sendNotification(Request $request)
    {
        $FcmToken = User::whereNotNull('device_token')->pluck('device_token')->all();

        $data = [
            "registration_ids" => $FcmToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,
            ]
        ];

        $result = $this->sendCurlRequest($data);

        if ($result === false) {
            return response()->json(['error' => 'Curl request failed.'], 500);
        }

        return response()->json(['result' => $result]);
    }

    private function sendCurlRequest($data)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = 'AAAATv33oKk:APA91bFljOVLw3dZudQtY3O5f1HE_5kgeMxFEjHv-kQArRfyWTTIJv1_SMHL2bi15Lxxk5SB-Ow8I9iNPnJ8JvN6KH5aDHIfTFavXE2Ge7fTms-OGe4J4XTGSeJpS5ZLJQoNin527_aa';
        $headers = [
            'Authorization:key=' . $serverKey,
            'Content-Type: application/json',
        ];
        $encodedData = json_encode($data);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

        $result = curl_exec($ch);

        curl_close($ch);

        return $result;
    }
}