<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IdolController extends Controller
{
    public function idol_register()
    {
        return view('idol.register');
    }
}
