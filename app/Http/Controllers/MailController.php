<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SimpleMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendSampleMail(Request $request)
    {
        $emailTo = $request->emailTo;
        $subject = $request->subject;
        $content = $request->content;
        
        Mail::to($emailTo)->send(new SimpleMail($subject, $content));
        return response()->json(['message' => 'success']);
    }
}
