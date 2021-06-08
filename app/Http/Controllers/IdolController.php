<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;
use Validator;
use Response;

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
        
        $request->validate([
            'idol_full_name' => 'required|string',
            'idol_user_name' => 'required|string',
            'idol_bio' => 'required|string',
            'idol_email' => 'required|string|email|unique:idol_info',
            'idol_phone' => 'required|string|unique:idol_info',
            // 'idol_photo' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=500,min_height=500',
            // 'idol_banner' => 'required|image|mimes:jpeg,png,jpg,gif|dimensions:min_width=1100,min_height=200',
            'idol_photo' => 'required|image|mimes:jpeg,png,jpg,gif',
            'idol_banner' => 'required|image|mimes:jpeg,png,jpg,gif',
            'request_lang' => 'required',
            'request_video_price' => 'required',
            // 'request_vocation' => 'required',
            'request_video' => 'required|mimes:mp4,mkv',
        ]);
        
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
            $video_request['idol_banner']
        );
        $video_request['request_idol_id'] = $idol_info->id;
        $video_request['request_video'] = $video_name;
        
        $video_request = VideoRequest::create($video_request);

        $user = User::where('id', $request->idol_user_id)->first();
        $user->is_setup = 1;
        $user->save();

        return view('idol.payment-completed');
    }

    public function profile()
    {
        $orders =  Order::where('order_idol_id', Auth::user()->id)->where('order_status', 1)->get();

        return view('idol.profile', compact('orders'));
    }

    public function edit_profile()
    {
        $idol_info = IdolInfo::where('idol_user_id', Auth::user()->id)->first();
        $video_request = VideoRequest::where('request_idol_id', $idol_info->idol_id)->first();
        $orders = Order::where('order_idol_id', $idol_info->idol_user_id)->where('order_status', 1)->get();

        return view('idol.edit-profile', compact('idol_info', 'video_request', 'orders'));
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

    public function video_record(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();

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

    public function store(Request $request)
    {
        if ($request->hasFile('video')) {

            $file = $request->file('video');
            $path = 'videos/';
            $filenameWithExt = $file->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = 'mp4';
            $fileNameToStore = preg_replace('/\s+/', '_', $filename . '_' . time() . '.' . $extension);

            \Storage::disk('public')->putFileAs($path, $file, $fileNameToStore);

            $media = Media::create(['file_name' => $fileNameToStore]);

            return  response()->json(['success' => ($media) ? 1 : 0, 'message' => ($media) ? 'Video uploaded successfully.' : "Some thing went wrong. Try again !."]);
        }
    }
}
