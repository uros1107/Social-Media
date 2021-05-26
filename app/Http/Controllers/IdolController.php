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

    public function video_request_detail()
    {
        return view('idol.video-request-detail');
    }
}
