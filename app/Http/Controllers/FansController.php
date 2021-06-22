<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe;
use Auth;
use Hash;
use Session;
use Validator;
use Socialite;
use Exception;
use DB; 
use Carbon\Carbon; 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;
use App\Review;
use App\Category;

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

    public function confirm_email(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|unique:users',
        ]);

        $user_info = $request->all();
        $user_info['password'] = Hash::make($request->password);
        unset($user_info['_token']);
        Session::put('user_info', $user_info);

        $token = Str::random(5);

        Mail::send('email.verify', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Verify Email');
        });

        return view('fans.confirm-email', ['code' => $token]);
    }

    public function forgot_password()
    {
        return view('fans.forgot-password');
    }

    public function submitForgetPasswordForm(Request $request)
    {  
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        Session::put('who', $request->role);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        Mail::send('email.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('Reset Password');
        });

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function showResetPasswordForm($token) { 
        return view('fans.forgetPasswordLink', ['token' => $token]);
    }
 
     /**
      * Write code on Method
      *
      * @return response()
      */
     public function submitResetPasswordForm(Request $request)
     {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                            ])
                            ->first();

        if(!$updatePassword){
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => Hash::make($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();
 
        if(Session::get('who') == 1) {
            return redirect()->route('idol-signin')->with('message', 'Your password has been changed!');
        } else {
            return redirect()->route('fans-signin')->with('message', 'Your password has been changed!');
        }
     }

    public function redirect_google(Request $request)
    {
        Session::put('role', $request->role);
        return Socialite::driver('google')->redirect();
    }

    public function google_callback()
    {
        try {
    
            $user = Socialite::driver('google')->user();
     
            $finduser = User::where('google_id', $user->id)->first();
     
            if($finduser){
     
                Auth::login($finduser);
    
                if(Session::get('role') == 1) {
                    return redirect()->route('idol-index');
                } else if(Session::get('role') == 2) {
                    return redirect()->route('fans-index');
                }
     
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id'=> $user->id,
                    'role' => Session::get('role'),
                    'password' => Hash::make($user->email)
                ]);
    
                Auth::login($newUser);
     
                if(Session::get('role') == 1) {
                    return redirect()->route('idol-index');
                } else if(Session::get('role') == 2) {
                    return redirect()->route('fans-index');
                }
            }
    
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function redirect_facebook(Request $request)
    {
        Session::put('role', $request->role);
        try {
            return Socialite::driver('facebook')->redirect();
        } 
        catch (Exception $e) {
            if($request->role == 1) {
                return redirect()->route('idol-signin');
            } else {
                return redirect()->route('fans-signin');
            }
        }
    }

    public function facebook_callback()
    {
        try {
     
            $user = Socialite::driver('facebook')->user();
      
            $finduser = User::where('facebook_id', $user->id)->first();
      
            if($finduser){
      
                Auth::login($finduser);
     
                if(Session::get('role') == 1) {
                    return redirect()->route('idol-index');
                } else if(Session::get('role') == 2) {
                    return redirect()->route('fans-index');
                }
      
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'facebook_id'=> $user->id,
                    'role' => Session::get('role'),
                    'password' => Hash::make($user->email)
                ]);
     
                Auth::login($newUser);
      
                if(Session::get('role') == 1) {
                    return redirect()->route('idol-index');
                } else if(Session::get('role') == 2) {
                    return redirect()->route('fans-index');
                }
            }
     
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }

    public function index()
    {
        $idols = User::where('role', 1)->where('is_setup', 1)->take(5)->get();
        return view('fans.home', compact('idols'));
    }

    public function idol_category_get(Request $request)
    {
        $cat_id = $request->cat_id;
        $cat = Category::where('cat_id', $cat_id)->first();
        $idols = User::where('cat_id', $cat_id)->where('role', 1)->where('is_setup', 1)->get();

        return view('fans.idol-category-get', ['idols' => $idols, 'cat' => $cat]);
    }

    public function myfandoms()
    {
        $fans = User::where('id', Auth::user()->id)->first();
        return view('fans.myfandoms', compact('fans'));
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
            // 'email' => 'required|string|email',
            // 'phone' => 'string',
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

    public function change_password(Request $request)
    {
        $info = $request->all();
        $info['password'] = Hash::make($request->password);

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
        $orders =  Order::where('order_fans_id', Auth::user()->id)->where('order_status', 1)->get();
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
        
        if(Order::create($order)) {
            if($order['order_payment_method'] == 1) {
                $card_token = Auth::user()->visa_card_token;
            } else {
                $card_token = Auth::user()->master_card_token;
            }

            Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $status = Stripe\Charge::create ([
                    "amount" => $order['order_total_price'] * 100,
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

    public function order_summary(Request $request)
    {
        $order = Session::get('info');
        $order['order_payment_method'] = $request->order_payment_method;
        $order['order_price'] = $request->order_price;
        $order['order_fee'] = $request->order_fee;
        $order['order_total_price'] = $request->order_total_price;
        $order['order_fans_id'] = Auth::user()->id;
        Session::put('info', $order);
        
        return view('fans.order-summary', ['order' => $order]);
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

    public function fans_search(Request $request)
    {
        $search = $request->search;

        $idol_infos = IdolInfo::where('idol_user_name', 'like', '%'.$search.'%')->get();

        return view('fans.search', ['idol_infos' => $idol_infos, 'search' => $search]);
    }
}
