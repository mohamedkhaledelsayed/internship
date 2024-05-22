<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationSendController extends Controller
{
    public function updateDeviceToken(Request $request)
    {
        try {
            updateDeviceToken($request->token);
            return response()->json(['message' => 'Token successfully stored.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function sendNotification(Request $request)
    {
        try {
            sendNotification($request->title, $request->body);
            return response()->json(['message' => 'Notification sent successfully.']);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }
}