<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdolController extends Controller
{
    public function registration()
    {
        return view('idol.registration');
    }

    public function idol_register()
    {
        return view('idol.register');
    }

    public function index()
    {
        return view('idol.index');
    }

    public function wizard()
    {
        return view('idol.wizard');
    }

    public function setup_submit()
    {
        return view('idol.payment-completed');
    }

    public function profile()
    {
        return view('idol.profile');
    }

    public function video_request()
    {
        return view('idol.video-request');
    }

    public function earning_per()
    {
        return view('idol.earning-per');
    }

    public function earning()
    {
        return view('idol.earning');
    }

    public function video_record()
    {
        return view('idol.video-record');
    }

    public function video_request_detail()
    {
        return view('idol.video-request-detail');
    }

    public function payment_method()
    {
        return view('idol.payment-method');
    }

    public function concierge()
    {
        return view('idol.concierge');
    }
}
