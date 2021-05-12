<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Newsletter;

class MailChimpController extends Controller
{
    public function send_mail(Request $request)
    {
        if ( !Newsletter::isSubscribed($request->email) ) 
        {
            Newsletter::subscribePending($request->email);
            return redirect('/')->with('success', 'Thanks For Subscribe');
        }
        return redirect('/')->with('failure', 'Sorry! You have already subscribed ');
    }
}
