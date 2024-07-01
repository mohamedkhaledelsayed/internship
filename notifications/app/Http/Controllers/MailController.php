<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SampleEmail;

class MailController extends Controller
{
    public function sendEmail(Request $request){
        Mail::to('mohamedelmasry2595@gmail.com')->send(new SampleEmail());
    }
}
