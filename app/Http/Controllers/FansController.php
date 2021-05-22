<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FansController extends Controller
{
    public function signin()
    {
        return view('fans.signin');
    }

    public function signup()
    {
        return view('fans.signup');
    }

    public function forgot_password()
    {
        return view('fans.forgot-password');
    }

    public function index()
    {
        return view('fans.home');
    }

    public function profile()
    {
        return view('fans.profile');
    }

    public function activity()
    {
        return view('fans.activity');
    }

    public function follow_idol()
    {
        return view('fans.follow-idol');
    }

    public function new_request()
    {
        return view('fans.new-request');
    }

    public function payment()
    {
        return view('fans.payment');
    }

    public function payment_success()
    {
        return view('fans.payment-success');
    }

    public function payment_cancel()
    {
        return view('fans.payment-cancel');
    }

    public function view_video()
    {
        return view('fans.view-video');
    }

    public function order_list()
    {
        return view('fans.order-list');
    }
}
