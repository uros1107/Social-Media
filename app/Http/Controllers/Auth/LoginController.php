<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function signin(Request $request) 
    {
        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
            'remember_me' => 'boolean'
        ]);
        $credentials = request(['email', 'password']);
        if(!Auth::attempt($credentials))
            return redirect()->back()->with('unsuccess', 'Login credential is incorrect!');
        $user = $request->user();
        
        if($user->role == 2) 
        {
            return redirect()->route('fans-index');
        } else if($user->role == 1) {
            return redirect()->route('idol-index');
        } else if($user->role == 3) {
            return redirect()->route('admin-dashboard');
        }
    }

    public function logout(Request $request) 
    {
        $this->guard()->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect('/');
    }
}
