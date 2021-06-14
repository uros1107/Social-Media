<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Hash;
use Auth;
use Carbon;
use DateTime;
use App\User;
use App\IdolInfo;
use App\VideoRequest;
use App\Order;

class HomeController
{
    public function index()
    {
        $idol_count = User::where('role', 1)->get()->count();
        $fans_count = User::where('role', 2)->get()->count();
        $total_orders_count = Order::get()->count();
        $completed_orders_count = Order::where('order_status', 1)->get()->count();
        $orders = Order::orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', [
            'idol_count' => $idol_count,
            'fans_count' => $fans_count,
            'total_orders_count' => $total_orders_count,
            'completed_orders_count' => $completed_orders_count,
            'orders' => $orders,
        ]);
    }

    public function show_login() 
    {
        if(Auth::check()) {
            return redirect()->route('admin-dashboard');
        }
        return view('admin.login');
    }

    public function order()
    {
        // return view('admin.order-list');
        return view('admin.order-datatable');
    }

    public function order_detail(Request $request)
    {
        $order_id = $request->order_id;
        $order = Order::where('order_id', $order_id)->first();

        return view('admin.ajax-order-detail', compact('order'));
    }

    public function order_list()
    {
        $orders = Order::get(); 

        $data = array();
        foreach ($orders as $key => $order) {
            $fdate = date('Y-m-d h:m:s');
            $tdate = $order->created_at;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            
            $fans = User::where('id', $order->order_fans_id)->first();
            $idol = IdolInfo::where('idol_user_id', $order->order_idol_id)->first();

            $fans_count = 0;
            foreach (User::all() as $user) {
                $array = json_decode($user->fandom_lists);
                if($array) {
                    $has_idol = in_array($order->order_idol_id, $array);
                    if($has_idol) {
                        $fans_count++;
                    }
                }
            }

            $occasion = '';
            switch ($order->order_occasion) {
                case 1:
                    $occasion = 'Encouragement';
                    break;
                case 2:
                    $occasion = 'Birthday';
                    break;
                case 3:
                    $occasion = 'Gift';
                    break;
                case 4:
                    $occasion = 'Advice';
                    break;
                case 5:
                    $occasion = 'Congrats';
                    break;
                case 6:
                    $occasion = 'Valentine’s';
                    break;
                case 7:
                    $occasion = 'Other';
                    break;
                case 8:
                    $occasion = 'None';
                    break;
                default:
                    break;
            }

            $status = $this->order_status($order->order_status);
            $order_status = '<select class="custom-select1">
                <option '.$status['recent'].'>
                    <div class="d-flex">
                        <div class="recent-rectangle my-auto mr-2"></div>
                        <span>Recent</span>
                    </div>
                </option>
                <option '.$status['pending'].'>
                    <div class="d-flex">
                        <div class="pending-rectangle my-auto mr-2"></div>
                        <span>Pending</span>
                    </div>
                </option>
                <option '.$status['completed'].'>
                    <div class="d-flex">
                        <div class="completed-rectangle my-auto mr-2"></div>
                        <span>Completed</span>
                    </div>
                </option>
                <option '.$status['expired'].'>
                    <div class="d-flex">
                        <div class="expired-rectangle my-auto mr-2"></div>
                        <span>Refuned (Expired)</span>
                    </div>
                </option>
                <option '.$status['declined'].'>
                    <div class="d-flex">
                        <div class="declined-rectangle my-auto mr-2"></div>
                        <span>Refunded (Declined)</span>
                    </div>
                </option>
                <option '.$status['paidout'].'>
                    <div class="d-flex">
                        <div class="paidout-rectangle my-auto mr-2"></div>
                        <span>Paid Out</span>
                    </div>
                </option>
            </select>';

            $data[] = [
                'order_date' => Carbon\Carbon::parse($order->created_at)->format('d F Y'),
                'due_date' => $days == 0 ? 'Today' : $days.' Days Left',
                'order_id' => '<a class="order-id" data-id="' .$order->order_id. '">#'.$order->order_id.'</a>',
                'fans_name' => $fans->name,
                'idols_name' => $idol->idol_full_name,
                'status' => $order_status,
                'total' => '$ '.$order->order_price,
                'occasion' => $occasion,
                'fans_count' => $fans_count,
                'fans' => $fans,
                'idol' => $idol,
                'order' => $order
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function order_status_list(Request $request)
    {
        $orders = Order::where('order_status', $request->order_status)->get(); 

        $data = array();
        foreach ($orders as $key => $order) {
            $fdate = date('Y-m-d h:m:s');
            $tdate = $order->created_at;
            $datetime1 = new DateTime($fdate);
            $datetime2 = new DateTime($tdate);
            $interval = $datetime1->diff($datetime2);
            $days = $interval->format('%a');
            
            $fans = User::where('id', $order->order_fans_id)->first();
            $idol = IdolInfo::where('idol_user_id', $order->order_idol_id)->first();

            $fans_count = 0;
            foreach (User::all() as $user) {
                $array = json_decode($user->fandom_lists);
                if($array) {
                    $has_idol = in_array($order->order_idol_id, $array);
                    if($has_idol) {
                        $fans_count++;
                    }
                }
            }

            $occasion = '';
            switch ($order->order_occasion) {
                case 1:
                    $occasion = 'Encouragement';
                    break;
                case 2:
                    $occasion = 'Birthday';
                    break;
                case 3:
                    $occasion = 'Gift';
                    break;
                case 4:
                    $occasion = 'Advice';
                    break;
                case 5:
                    $occasion = 'Congrats';
                    break;
                case 6:
                    $occasion = 'Valentine’s';
                    break;
                case 7:
                    $occasion = 'Other';
                    break;
                case 8:
                    $occasion = 'None';
                    break;
                default:
                    break;
            }

            $status = $this->order_status($order->order_status);
            $order_status = '<select class="custom-select1">
                <option '.$status['recent'].'>
                    <div class="d-flex">
                        <div class="recent-rectangle my-auto mr-2"></div>
                        <span>Recent</span>
                    </div>
                </option>
                <option '.$status['pending'].'>
                    <div class="d-flex">
                        <div class="pending-rectangle my-auto mr-2"></div>
                        <span>Pending</span>
                    </div>
                </option>
                <option '.$status['completed'].'>
                    <div class="d-flex">
                        <div class="completed-rectangle my-auto mr-2"></div>
                        <span>Completed</span>
                    </div>
                </option>
                <option '.$status['expired'].'>
                    <div class="d-flex">
                        <div class="expired-rectangle my-auto mr-2"></div>
                        <span>Refuned (Expired)</span>
                    </div>
                </option>
                <option '.$status['declined'].'>
                    <div class="d-flex">
                        <div class="declined-rectangle my-auto mr-2"></div>
                        <span>Refunded (Declined)</span>
                    </div>
                </option>
                <option '.$status['paidout'].'>
                    <div class="d-flex">
                        <div class="paidout-rectangle my-auto mr-2"></div>
                        <span>Paid Out</span>
                    </div>
                </option>
            </select>';

            $data[] = [
                'order_date' => Carbon\Carbon::parse($order->created_at)->format('d F Y'),
                'due_date' => $days == 0 ? 'Today' : $days.' Days Left',
                'order_id' => '<a class="order-id" data-id="' .$order->order_id. '">#'.$order->order_id.'</a>',
                'fans_name' => $fans->name,
                'idols_name' => $idol->idol_full_name,
                'status' => $order_status,
                'total' => '$ '.$order->order_price,
                'occasion' => $occasion,
                'fans_count' => $fans_count,
                'fans' => $fans,
                'idol' => $idol,
                'order' => $order
            ];
        }

        return response()->json(['data' => $data]);
    }

    public function order_status($order_status)
    {
        $status = [
            'pending' => '',
            'completed' => '',
            'paidout' => '',
            'declined' => '',
            'expired' => '',
            'recent' => '',
        ];
        switch ($order_status) {
            case 0:
                $status['pending'] = 'selected';
                break;
            case 1:
                $status['completed'] = 'selected';
                break;
            case 2:
                $status['paidout'] = 'selected';
                break;
            case 3:
                $status['declined'] = 'selected';
                break;
            case 4:
                $status['expired'] = 'selected';
                break;
            case 5:
                $status['recent'] = 'selected';
                break;
            default:
                break;
        }

        return $status;
    }

    public function status_orders(Request $request)
    {
        $order_status = $request->order_status;
        if($order_status == 5) {
            $orders = Order::get(); 
        } else {
            $orders = Order::where('order_status', $order_status)->get();
        }

        return view('admin.ajax-order-status', compact('orders'));
    }

    public function idol()
    {
        return view('admin.idol');
    }

    public function store_idol(Request $request)
    {
        $idol_info = $request->all();
        $video_request = $request->all();
        
        // $request->validate([
        //     'idol_full_name' => 'required|string',
        //     'idol_user_name' => 'required|string',
        //     'idol_bio' => 'required|string',
        //     'idol_email' => 'required|string|email|unique:idol_info',
        //     'idol_phone' => 'required|string|unique:idol_info',
        //     'request_video_price' => 'required',
            // 'request_vocation' => 'required',
        // ]);

        $user_info = [
            'name' => $request->idol_full_name,
            'email' => $request->idol_email,
            'password' => Hash::make($request->password),
            'phone' => $request->idol_phone,
            'info' => $request->idol_bio,
            'cat_id' => $request->idol_cat_id,
            'role' => 1,
            'is_setup' => 1
        ];
        $user = User::create($user_info);
        
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
        $idol_info['idol_user_id'] = $user->id;
        
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

        return response()->json(['success' => true]);
    }

    public function idol_list()
    {
        $idols = IdolInfo::get();

        $data = array();
        foreach ($idols as $key => $idol) {
            $fans_count = 0;
            foreach (User::all() as $user) {
                $array = json_decode($user->fandom_lists);
                if($array) {
                    $has_idol = in_array($idol->idol_user_id, $array);
                    if($has_idol) {
                        $fans_count++;
                    }
                }
            }

            $completed_orders = Order::where('order_idol_id', $idol->idol_user_id)->where('order_status', 1)->get();
            $refuned_orders = Order::where('order_idol_id', $idol->idol_user_id)->where('order_status', 3)->orWhere('order_status', 4)->get();
            $total_order_count = Order::where('order_idol_id', $idol->idol_user_id)->get()->count();
            $pending_orders = Order::where('order_idol_id', $idol->idol_user_id)->where('order_status', 0)->get();
            $pending_order_count = Order::where('order_idol_id', $idol->idol_user_id)->where('order_status', 0)->get()->count();

            $data[] = [
                'idol_user_name' => $idol->idol_user_name,
                'idol_full_name' => $idol->idol_full_name,
                'email' => $idol->idol_email,
                'join_date' => Carbon\Carbon::parse($idol->created_at)->format('d F Y'),
                'fans_count' => $fans_count,
                'completed_orders' => $completed_orders,
                'refuned_orders' => $refuned_orders,
                'total_order_count' => $total_order_count,
                'pending_orders' => $pending_orders,
                'pending_order_count' => $pending_order_count,
                'perc' => round($total_order_count != 0 ? $pending_order_count/$total_order_count * 100 : 0, 1).'%',
                'status' => 'Active',
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function add_idol()
    {
        return view('admin.add-idol');
    }

    public function fans()
    {
        return view('admin.fans');
    }

    public function add_fan()
    {
        return view('admin.add-fan');
    }

    public function fans_list()
    {
        $fans = User::where('role', 2)->get();

        $data = array();
        foreach ($fans as $key => $fan) {
            $order_count = Order::where('order_fans_id', $fan->id)->get()->count();
            $completed_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 1)->get();
            $refuned_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 3)->orWhere('order_status', 4)->get();
            $pending_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 0)->get();

            $data[] = [
                'fans_user_name' => $fan->name,
                'fans_full_name' => $fan->name,
                'email' => $fan->email,
                'credits' => '<div class="credits">$  <span class="text-main-color">'.$fan->credits.'</span></div>',
                'join_date' => Carbon\Carbon::parse($fan->created_at)->format('d F Y'),
                'order_count' => $order_count,
                'save' => '<button class="btn custom-btn">Save</button>',
                'completed_orders' => $completed_orders,
                'refuned_orders' => $refuned_orders,
                'pending_orders' => $pending_orders,
            ];
        }
        return response()->json(['data' => $data]);
    }

    public function store_fan(Request $request)
    {
        $idol_info = $request->all();
        $video_request = $request->all();
        
        // $request->validate([
        //     'name' => 'required|string',
        //     'info' => 'required|string',
        //     'email' => 'required|string|email|unique:users',
        //     'phone' => 'required|string|unique:users',
        // ]);

        $photo_img_name = $request->photo->getClientOriginalName();
        $request->photo->move(public_path('assets/images/img'), $photo_img_name);

        $user_info = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'photo' => $photo_img_name,
            'info' => $request->info,
            'role' => 2
        ];
        
        if(User::create($user_info)) {
            return response()->json(['success' => true]);
        } else {
            return response()->json(['success' => false]);
        }
    }
}
