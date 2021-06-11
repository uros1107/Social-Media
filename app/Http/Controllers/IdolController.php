<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendConcierge;
use Illuminate\Support\Facades\Mail;
use Auth;
use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;
use App\Review;
use Validator;
use Response;
use Hash;

class IdolController extends Controller
{
    public function registration()
    {
        return view('idol.registration');
    }

    public function idol_signin_show()
    {
        if(!Auth::check()) {
            return view('idol.signin');
        } else {
            return redirect()->back();
        }
        
    }

    public function idol_register_show()
    {
        if(!Auth::check()) {
            return view('idol.register');
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {
        $orders = Order::where('order_idol_id', Auth::user()->id)->where('order_status', 0)->orderBy('created_at', 'desc')->get();
        $ordered_videos = Order::where('order_idol_id', Auth::user()->id)->where('order_status', 1)->orderBy('created_at', 'desc')->take(4)->get();
        $total_request = Order::where('order_idol_id', Auth::user()->id)->get()->count();
        $pending_request = Order::where('order_idol_id', Auth::user()->id)->where('order_status', 0)->get()->count();
        $completed_request = Order::where('order_idol_id', Auth::user()->id)->where('order_status', 1)->get()->count();
        $paidout_request = Order::where('order_idol_id', Auth::user()->id)->where('order_status', 2)->get()->count();

        $total_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->get() as $order) {
            $total_booking += $order->order_price;
        }

        $pending_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->where('order_status', 0)->get() as $order) {
            $pending_booking += $order->order_price;
        }

        return view('idol.index', [
                'orders' => $orders, 
                'ordered_videos' => $ordered_videos, 
                'total_request' => $total_request, 
                'pending_request' => $pending_request, 
                'completed_request' => $completed_request, 
                'paidout_request' => $paidout_request,
                'total_booking' => $total_booking,
                'pending_booking' => $pending_booking,
        ]);
    }

    public function wizard()
    {
        return view('idol.wizard');
    }

    public function setup_submit(Request $request)
    {
        $idol_info = $request->all();
        $video_request = $request->all();
        
        // $request->validate([
            // 'idol_full_name' => 'required|string',
            // 'idol_user_name' => 'required|string',
            // 'idol_bio' => 'required|string',
            // 'idol_email' => 'required|string|email|unique:idol_info',
            // 'idol_phone' => 'required|string|unique:idol_info',
            // 'idol_photo' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=500,min_height=500',
            // 'idol_banner' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=1100,min_height=200',
            // 'idol_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'idol_banner' => 'required|image|mimes:jpeg,png,jpg,gif',
            // 'request_lang' => 'required',
            // 'request_video_price' => 'required',
            // 'request_vocation' => 'required',
            // 'request_video' => 'required|mimes:mp4,mkv',
        // ]);
        
        $photo_img_name = $request->idol_photo->getClientOriginalName();
        $request->idol_photo->move(public_path('assets/images/img'), $photo_img_name);

        $banner_img_name = $request->idol_banner->getClientOriginalName();
        $request->idol_banner->move(public_path('assets/images/img'), $banner_img_name);

        unset(
            $idol_info['request_lang'], 
            $idol_info['request_video_price'], 
            $idol_info['request_vocation'], 
            $idol_info['request_video'], 
            $idol_info['request_payment_method']
        );
        $idol_info['idol_photo'] = $photo_img_name;
        $idol_info['idol_banner'] = $banner_img_name;
        
        $video_name = $request->request_video->getClientOriginalName();
        $request->request_video->move(public_path('assets/videos'), $video_name);
        $idol_info = IdolInfo::create($idol_info);

        unset(
            $video_request['idol_full_name'], 
            $video_request['idol_user_name'], 
            $video_request['idol_email'], 
            $video_request['idol_phone'], 
            $video_request['idol_bio'], 
            $video_request['idol_photo'], 
            $video_request['idol_banner'],
            $video_request['idol_cat_id'],
        );
        $video_request['request_idol_id'] = $idol_info->id;
        $video_request['request_video'] = $video_name;
        
        $video_request = VideoRequest::create($video_request);

        $user = User::where('id', $request->idol_user_id)->first();
        $user->is_setup = 1;

        if($user->save()) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function payment_completed()
    {
        return view('idol.payment-completed');
    }

    public function profile()
    {
        $orders =  Order::where('order_idol_id', Auth::user()->id)->where('order_status', 1)->get();
        $reviews = Review::where('review_idol_id', Auth::user()->id)->get();

        $fans_count = 0;
        foreach (User::all() as $user) {
            $array = json_decode($user->fandom_lists);
            if($array) {
                $has_idol = in_array(Auth::user()->id, $array);
                if($has_idol) {
                    $fans_count++;
                }
            }
        }

        return view('idol.profile', ['orders' => $orders, 'reviews' => $reviews, 'fans_count' => $fans_count]);
    }

    public function profile_update(Request $request)
    {
        $idol_info = $request->all();
        $request_info = $request->all();

        $request->validate([
            'idol_full_name' => 'required|string',
            'idol_user_name' => 'required|string',
            'idol_bio' => 'required|string',
            'idol_email' => 'required|string|email',
            'idol_phone' => 'required|string'
        ]);
        
        $idol = IdolInfo::where('idol_user_id', Auth::user()->id);

        if($request->idol_photo) {
            $photo_img_name = $request->idol_photo->getClientOriginalName();
            $request->idol_photo->move(public_path('assets/images/img'), $photo_img_name);
            $idol_info['idol_photo'] = $photo_img_name;
        } else {
            unset($idol_info['idol_photo']);
        }

        if($request->idol_banner) {
            $banner_img_name = $request->idol_banner->getClientOriginalName();
            $request->idol_banner->move(public_path('assets/images/img'), $banner_img_name);
            $idol_info['idol_banner'] = $banner_img_name;
        } else {
            unset($idol_info['idol_banner']);
        }

        unset(
            $idol_info['_token'], 
            $idol_info['request_lang'], 
            $idol_info['request_video_price'], 
            $idol_info['request_vocation'], 
            $idol_info['request_video'], 
            $idol_info['password'], 
        );
        $idol->update($idol_info);

        $video_request = VideoRequest::where('request_idol_id', $idol->first()->idol_id);
        unset(
            $request_info['_token'], 
            $request_info['idol_full_name'], 
            $request_info['idol_user_name'], 
            $request_info['idol_email'], 
            $request_info['idol_phone'], 
            $request_info['idol_bio'], 
            $request_info['idol_photo'], 
            $request_info['idol_banner'],
            $request_info['idol_cat_id'],
            $request_info['password'],
        );
        if(!isset($request_info['request_vocation'])) {
            $request_info['request_vocation'] = 0;
        } else {
            $request_info['request_vocation'] = 1;
        }
        $video_request->update($request_info);

        if($request->password) {
            $user = User::where('id', Auth::user()->id);
            $password = ['password' => Hash::make($request->password)];
            $user->update($password);
        }

        return redirect()->back()->with('success', 'Successfully updated!');
    }

    public function edit_profile()
    {
        $idol_info = IdolInfo::where('idol_user_id', Auth::user()->id)->first();
        $video_request = VideoRequest::where('request_idol_id', $idol_info->idol_id)->first();
        $orders = Order::where('order_idol_id', $idol_info->idol_user_id)->where('order_status', 1)->get();
        $reviews = Review::where('review_idol_id', $idol_info->idol_user_id)->get();

        $fans_count = 0;
        foreach (User::all() as $user) {
            $array = json_decode($user->fandom_lists);
            if($array) {
                $has_idol = in_array(Auth::user()->id, $array);
                if($has_idol) {
                    $fans_count++;
                }
            }
        }

        return view('idol.edit-profile', [
            'idol_info' => $idol_info, 
            'video_request' => $video_request, 
            'orders' => $orders, 
            'reviews' => $reviews, 
            'fans_count' => $fans_count
        ]);
    }

    public function video_request()
    {
        $orders = Order::where('order_idol_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        return view('idol.video-request', compact('orders'));
    }

    public function earning_per(Request $request)
    {
        $order_id = $request->order_id;
        $order = Order::where('order_id', $order_id)->first();

        return view('idol.earning-per', compact('order'));
    }

    public function earning()
    {
        $orders = Order::where('order_idol_id', Auth::user()->id)->orderBy('created_at', 'desc')->get();

        $total_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->get() as $order) {
            $total_booking += $order->order_price;
        }

        $pending_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->where('order_status', 0)->get() as $order) {
            $pending_booking += $order->order_price;
        }

        $completed_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->where('order_status', 1)->get() as $order) {
            $completed_booking += $order->order_price;
        }

        $paidout_booking = 0;
        foreach (Order::where('order_idol_id', Auth::user()->id)->where('order_status', 2)->get() as $order) {
            $paidout_booking += $order->order_price;
        }

        return view('idol.earning',[
            'orders' => $orders,
            'total_booking' => $total_booking,
            'pending_booking' => $pending_booking,
            'completed_booking' => $completed_booking,
            'paidout_booking' => $paidout_booking,
        ]);
    }

    public function submit_video(Request $request)
    {
        $rules =[
            'video' => 'required|mimes:mp4,mkv',
        ];
        $validator = Validator::make($request->all(), $rules);

        // Validate the input and return correct response
        if ($validator->fails())
        {
            return Response::json([
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ]); 
        }
        
        $extension = $request->video->getClientOriginalExtension();
        $video_name = $request->video->getClientOriginalName();

        if(!$extension) {
            $video_name .= '-'.time().'.mp4';
        }
        $request->video->move(public_path('assets/videos'), $video_name);

        $order = Order::where('order_id', $request->order_id);
        $info = ['order_video' => $video_name, 'order_status' => 1];
        if($order->update($info)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }

    public function update_video(Request $request)
    {
        $video_name = $request->video->getClientOriginalName();
        $request->video->move(public_path('assets/videos'), $video_name);

        $info = ['request_video' => $video_name];
        $idol_info = IdolInfo::where('idol_user_id', Auth::user()->id)->first();
        $video_request = VideoRequest::where('request_idol_id', $idol_info->idol_id);

        if($video_request->update($info)) {
            return redirect()->back()->with('success', 'Successfully uploaded!');
        } else {
            return redirect()->back()->with('unsuccess', 'Failed video upload. Please try again later!');
        }
    }

    public function video_record(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();

        return view('idol.video-record', compact('order'));
    }

    public function video_decline(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();
        $order->order_status = 3;
        $order->save();

        return view('idol.video-record', compact('order'));
    }

    public function video_request_detail(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();
        
        return view('idol.video-request-detail', compact('order'));
    }

    public function payment_method()
    {
        return view('idol.payment-method');
    }

    public function concierge()
    {
        return view('idol.concierge');
    }

    public function send_concierge(Request $request)
    {
        $info = $request->all();

        Mail::to('amar.chan9655@gmail.com')->send(new SendConcierge($info));
        return redirect()->back()->with('success', 'Thanks for contacting us!');
    }
}
