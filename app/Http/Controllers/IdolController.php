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
}
