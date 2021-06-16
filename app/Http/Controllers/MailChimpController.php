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
            // return redirect('/')->with('success', 'Thanks For Subscribe');
            return response()->json(['success' => true]);
        }
        // return redirect('/')->with('failure', 'Sorry! You have already subscribed ');
        return response()->json(['success' => false]);
    }

    public function privacy(Request $request)
    {
        return view('privacy');
    }

    public function terms(Request $request)
    {
        return view('terms');
    }
    
    public function contest_terms(Request $request)
    {
        return view('contest');
    }
}
