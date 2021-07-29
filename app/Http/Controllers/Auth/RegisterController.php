<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Auth;
use Session;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function idol_register(Request $request)
    {
        if($request->no_password) {
            $request->validate([
                'email' => 'required|string|email|unique:users',
                'phone' => 'required|string|numeric|unique:users',
                'followers' => 'required|numeric',
                'info' => 'required|string',
            ]);
    
            User::create([
                'name' => $request->name,
                'k_name' => $request->k_name,
                'user_name' => $request->social_name,
                'phone' => $request->phone,
                'email' => $request->email,
                'password' => Hash::make($request->email),
                'where_find' => $request->where_find,
                'social_name' => $request->social_name,
                'followers' => $request->followers,
                'info' => $request->info,
                'role' => 1
            ]);

            Mail::send('email.new-idol', ['idol_information' => $request->all()], function($message) use($request){
                $message->to('VIP@MILLIONK.COM');
                $message->subject('New Idol Registration is Required!');
            });
    
            return redirect()->back()->with('success', 'Successfully submited');
        } else {
            $request->validate([
                'name' => 'required|string',
                // 'k_name' => 'required|string',
                'password' => 'required|confirmed',
                'email' => 'required|string|email',
                'phone' => 'required|string|numeric|unique:users',
            ]);
    
            $user = User::where('email', $request->email)->first();
            if($user) {
                $user_info = $request->all();
                unset($user_info['_token'], $user_info['password_confirmation']);

                $user_update = User::where('email', $request->email);
                $user_info['password'] = Hash::make($request->password);
                $user_update->update($user_info);

                $user = User::where('email', $request->email)->first();
                Auth::login($user);

                Mail::send('email.idol-signup', ['user' => $user], function($message) use($request){
                    $message->to('hello@millionk.com');
                    $message->subject('New Idol has been registered!');
                });
        
                return redirect()->route('idol-index');
            } else {
                return redirect()->route('idol-registration');
            }
        }
    }

    protected function fans_signup(Request $request)
    {
        User::create(Session::get('user_info'));

        $user = User::where('email', Session::get('user_info')['email'])->first();
        Auth::login($user);

        Mail::send('email.fans-signup', ['user' => $user], function($message) use($request){
            $message->to('hello@millionk.com');
            $message->subject('New Fan has been registered!');
        });

        return redirect()->route('fans-index');
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
