<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Hash;
use Session;
use Validator;
use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;

class FansController extends Controller
{
    public function signin()
    {
        if(!Auth::check()) {
            return view('fans.signin');
        } else {
            return redirect()->back();
        }
    }

    public function show_signup()
    {
        if(!Auth::check()) {
            return view('fans.signup');
        } else {
            return redirect()->back();
        }
    }

    public function signup(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users',
        ]);

        User::create([
            'name' => $request->name,
            'birth' => $request->birth,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user = User::where('email', $request->email)->first();
        Auth::login($user);

        return redirect()->route('fans-index');
    }

    public function forgot_password()
    {
        return view('fans.forgot-password');
    }

    public function index()
    {
        $idols = User::where('role', 1)->where('is_setup', 1)->take(5)->get();
        return view('fans.home', compact('idols'));
    }

    public function profile()
    {
        $fans = User::where('id', Auth::user()->id)->first();

        return view('fans.profile', compact('fans'));
    }

    public function activity(Request $request)
    {
        $orders =  Order::where('order_status', 1)->get();
        return view('fans.activity', compact('orders'));
    }

    public function follow_idol(Request $request)
    {
        $id = $request->id;
        $idol = User::where('id', $id)->first();
        $orders = Order::where('order_idol_id', $idol->id)->where('order_status', 1)->take(4)->get();

        return view('fans.follow-idol', compact('idol', 'orders'));
    }

    public function new_request(Request $request)
    {
        $id = $request->id;
        $idol = User::where('id', $id)->first();

        return view('fans.new-request', compact('idol'));
    }

    public function payment(Request $request)
    {
        $info = $request->all();
        Session::put('info', $info);

        return view('fans.payment', ['idol_id' => $request->order_idol_id]);
    }

    public function payment_success(Request $request)
    {
        $order = Session::get('info');
        $order['order_payment_method'] = $request->order_payment_method;
        $order['order_price'] = $request->order_price;
        $order['order_fee'] = $request->order_fee;
        $order['order_total_price'] = $request->order_total_price;
        $order['order_fans_id'] = Auth::user()->id;
        
        if(Order::create($order)) {
            return view('fans.payment-success', ['order' => $order]);
        } else {
            return view('fans.payment-cancel', ['order' => $order]);
        }
    }

    public function payment_cancel()
    {
        return view('fans.payment-cancel');
    }

    public function view_video(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();

        return view('fans.view-video', compact('order'));
    }

    public function order_list()
    {
        $orders = Order::where('order_fans_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('fans.order-list', compact('orders'));
    }
}
