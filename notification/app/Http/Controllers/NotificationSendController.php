<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Repositories\UpdateDeviceToken;
use App\Repositories\SendNotification;
class NotificationSendController extends Controller
{
    protected $updateDeviceToken;
    protected $sendNotification;

    public function __construct(UpdateDeviceToken $updateDeviceToken,SendNotification $sendNotification)
    {
        $this->UpdateDeviceToken =$updateDeviceToken ;
        $this->SendNotification =$sendNotification;
    }


    public function updateDeviceToken(Request $request)
    {
  $this->UpdateDeviceToken->updateDeviceToken($request);
    }

    public function sendNotification(Request $request)
    {
        $result=$this->SendNotification->Notification($request);
        dd($result);
    }
}
