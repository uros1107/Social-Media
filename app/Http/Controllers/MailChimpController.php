<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Newsletter;
use Auth;

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

    public function faq(Request $request)
    {
        return view('faq');
    }

    public function terms(Request $request)
    {
        return view('terms');
    }
    
    public function contest_terms(Request $request)
    {
        return view('contest');
    }

    public function contactus(Request $request)
    {
        return view('contactus');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email',
        ]);

        Mail::send('email.contact', ['question' => $request->question, 'from' => $request->email], function($message) use($request){
            $message->to('hello@millionk.com');
            $message->subject('Contact Us');
        });

        return redirect()->back()->with('success', 'Successfully submit!');
    }

    public function request_idol()
    {
        return view('request-idol');
    }

    public function request_idol_store(Request $request)
    {
        if(!Auth::check()) {
            return redirect()->route('fans-signup');
        }

        return redirect()->back()->with('success', 'Successfully submit!');
    }
}
