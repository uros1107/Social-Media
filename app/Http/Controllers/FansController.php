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
}
