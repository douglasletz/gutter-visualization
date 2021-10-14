<?php


namespace App\Services;


use App\Mail\WelcomeMail;
use Illuminate\Support\Facades\Mail;

class MailService
{
    public static function send($details){

        Mail::to($details['to'])->send(new WelcomeMail($details));

        if (Mail::failures()) {
            return response()->json([
                'status'  => false,
                'data'    => $details,
                'message' => 'Not sending mail.. retry again...'
            ]);
        }
        return response()->json([
            'status'  => true,
            'data'    => $details,
            'message' => 'Your details mailed successfully'
        ]);
    }
}
