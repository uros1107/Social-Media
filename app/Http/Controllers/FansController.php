<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Auth;
use Hash;
use Session;
use Validator;
use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;
use App\Review;

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

    public function profile_update(Request $request)
    {
        $info = $request->all();

        $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'phone' => 'required|string',
            'info' => 'required|string'
        ]);

        if(!isset($request->password)) {
            unset($info['password']);
        } else {
            $info['password'] = Hash::make($request->password);
        }

        if($request->photo) {
            $photo_img_name = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('assets/images/img'), $photo_img_name);
            $info['photo'] = $photo_img_name;
        }

        $fans = User::where('id', Auth::user()->id);
        unset($info['_token']);

        if($fans->update($info)) {
            return redirect()->back()->with('success', 'Successfully updated!');
        } else {
            return redirect()->back()->with('unsuccess', 'Server has any problem. Please try again later!');
        }
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
        $reviews = Review::where('review_idol_id', $idol->id)->get();
        
        $fans_count = 0;
        foreach (User::all() as $user) {
            $array = json_decode($user->fandom_lists);
            if($array) {
                $has_idol = in_array($idol->id, $array);
                if($has_idol) {
                    $fans_count++;
                }
            }
        }

        return view('fans.follow-idol', ['idol' => $idol, 'orders' => $orders, 'reviews' => $reviews, 'fans_count' => $fans_count]);
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

    public function card_save(Request $request)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $customer = \Stripe\Customer::create([
            'source' => $request->stripe_token,
            'email' => Auth::user()->email,
        ]);

        $user = User::where('id', Auth::user()->id)->first();
        if($request->card_type == 1) {                  // visa
            $user->visa_card_token = $customer->id;
        } else {
            $user->master_card_token = $customer->id;
        }
        
        if($user->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
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
            if($request->order_payment_method == 1) {
                $card_token = Auth::user()->visa_card_token;
            } else {
                $card_token = Auth::user()->master_card_token;
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $status = Stripe\Charge::create ([
                    "amount" => $request->order_total_price * 100,
                    "currency" => "usd",
                    "customer" => $card_token,
                    "description" => "Fans paid from Millionk.com" 
            ]);

            if ($status[ 'status' ] == "succeeded") { 
                return view('fans.payment-success', ['order' => $order]);
            } else {
                return view('fans.payment-cancel', ['order' => $order]);
            }

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

    public function send_review(Request $request)
    {
        $info = $request->all();

        if(Review::create($info)) {
            return redirect()->back()->with('success', 'Successfully submitted!');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed your operation!');
        }
    }

    public function join_fandom(Request $request)
    {
        $idol_user_id = $request->idol_user_id;

        $user = User::where('id', Auth::user()->id)->first();
        if(!$user->fandom_lists) {
            $user->fandom_lists = '['.$idol_user_id.']';
            $user->save();

            return response()->json(['success' => true]);
        } else {
            $idol = User::where('id', Auth::user()->id)->whereRaw("JSON_CONTAINS(fandom_lists,'".$idol_user_id."','$')=1")->first();
            if(!$idol) {
                $user_numbers = substr($user->fandom_lists, 0, -1);
                $user_numbers .= ",".$idol_user_id;
                $user_numbers .= "]";
                $user->fandom_lists = $user_numbers;
                $user->save();

                return response()->json(['success' => true]);
            } else {
                return response()->json(['success' => false]);
            }
        }
    }
}
