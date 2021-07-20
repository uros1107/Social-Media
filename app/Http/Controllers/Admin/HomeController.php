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
        $idol_count = IdolInfo::where('idol_del_flag', 0)->get()->count();
        $fans_count = User::where('role', 2)->where('del_flag', 0)->get()->count();
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
        $orders = Order::orderBy('created_at', 'desc')->get(); 

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
            foreach (User::where('del_flag', 0)->get() as $user) {
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
                    $occasion = 'Congratulations';
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
            $color = $this->order_color($order->order_status);
            $order_status = '<div class="color-status '.$color.'"></div>'.'<select class="custom-select1">
                <option value="5"'.$status['recent'].'>
                    <div class="d-flex">
                        <div class="recent-rectangle my-auto mr-2"></div>
                        <span>Recent</span>
                    </div>
                </option>
                <option value="0"'.$status['pending'].'>
                    <div class="d-flex">
                        <div class="pending-rectangle my-auto mr-2"></div>
                        <span>Pending</span>
                    </div>
                </option>
                <option value="1"'.$status['completed'].'>
                    <div class="d-flex">
                        <div class="completed-rectangle my-auto mr-2"></div>
                        <span>Completed</span>
                    </div>
                </option>
                <option value="4"'.$status['expired'].'>
                    <div class="d-flex">
                        <div class="expired-rectangle my-auto mr-2"></div>
                        <span>Refuned (Expired)</span>
                    </div>
                </option>
                <option value="3"'.$status['declined'].'>
                    <div class="d-flex">
                        <div class="declined-rectangle my-auto mr-2"></div>
                        <span>Refunded (Declined)</span>
                    </div>
                </option>
                <option value="2"'.$status['paidout'].'>
                    <div class="d-flex">
                        <div class="paidout-rectangle my-auto mr-2"></div>
                        <span>Paid Out</span>
                    </div>
                </option>
            </select>';

            $data[] = [
                'order_date' => Carbon\Carbon::parse($order->created_at)->format('d F Y'),
                'due_date' => $days == 0 ? 'Today' : $days.' Days Left',
                'order_id' => '<a href="#" class="order-id" data-id="' .$order->order_id. '">#'.$order->order_id.'</a>',
                'fans_name' => '<a style="color:#2178F9" href="'.url('/admin/fans-edit/'.$fans->user_name).'">'.$fans->user_name.'</a>',
                'idols_name' => '<a style="color:#2178F9" href="'.url('/admin/idol-edit/'.$idol->idol_user_name).'">'.$idol->idol_user_name.'</a>',
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
        if($request->order_status == 5) {
            $orders = Order::orderBy('created_at', 'desc')->get(); 
        }

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
            foreach (User::where('del_flag', 0)->get() as $user) {
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
                    $occasion = 'Congratulations';
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
            $color = $this->order_color($order->order_status);
            $order_status = '<div class="color-status '.$color.'"></div>'.'<select class="custom-select1">
                <option value="5"'.$status['recent'].'>
                    <div class="d-flex">
                        <div class="recent-rectangle my-auto mr-2"></div>
                        <span>Recent</span>
                    </div>
                </option>
                <option value="0"'.$status['pending'].'>
                    <div class="d-flex">
                        <div class="pending-rectangle my-auto mr-2"></div>
                        <span>Pending</span>
                    </div>
                </option>
                <option value="1"'.$status['completed'].'>
                    <div class="d-flex">
                        <div class="completed-rectangle my-auto mr-2"></div>
                        <span>Completed</span>
                    </div>
                </option>
                <option value="4"'.$status['expired'].'>
                    <div class="d-flex">
                        <div class="expired-rectangle my-auto mr-2"></div>
                        <span>Refuned (Expired)</span>
                    </div>
                </option>
                <option value="3"'.$status['declined'].'>
                    <div class="d-flex">
                        <div class="declined-rectangle my-auto mr-2"></div>
                        <span>Refunded (Declined)</span>
                    </div>
                </option>
                <option value="2"'.$status['paidout'].'>
                    <div class="d-flex">
                        <div class="paidout-rectangle my-auto mr-2"></div>
                        <span>Paid Out</span>
                    </div>
                </option>
            </select>';

            $data[] = [
                'order_date' => Carbon\Carbon::parse($order->created_at)->format('d F Y'),
                'due_date' => $days == 0 ? 'Today' : $days.' Days Left',
                'order_id' => '<a href="#" class="order-id" data-id="' .$order->order_id. '">#'.$order->order_id.'</a>',
                'fans_name' => '<a style="color:#2178F9" href="'.url('/admin/fans-edit/'.$fans->user_name).'">'.$fans->user_name.'</a>',
                'idols_name' => '<a style="color:#2178F9" href="'.url('/admin/idol-edit/'.$idol->idol_user_name).'">'.$idol->idol_user_name.'</a>',
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

    public function order_color($order_status)
    {
        switch ($order_status) {
            case 0:
                $color = 'recent-rectangle';
                break;
            case 1:
                $color = 'completed-rectangle';
                break;
            case 2:
                $color = 'paidout-rectangle';
                break;
            case 3:
                $color = 'declined-rectangle';
                break;
            case 4:
                $color = 'expired-rectangle';
                break;
            case 5:
                $color = 'recent-rectangle';
                break;
            default:
                break;
        }

        return $color;
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
            $orders = Order::orderBy('created_at', 'desc')->get(); 
        } else {
            $orders = Order::where('order_status', $order_status)->orderBy('created_at', 'desc')->get();
        }

        return view('admin.ajax-order-status', compact('orders'));
    }

    public function order_status_update(Request $request)
    {
        $order = Order::where('order_id', $request->order_id)->first();
        $order->order_status = $request->order_status;
        $order->save();

        return response()->json(['success' => true]);
    }

    public function idol()
    {
        return view('admin.idol');
    }

    public function store_idol(Request $request)
    {
        $idol_info = $request->all();
        $video_request = $request->all();
        
        $request->validate([
            'idol_full_name' => 'required|string',
            'idol_k_name' => 'required|string',
            'idol_user_name' => 'required|string|unique:idol_info',
            'idol_bio' => 'required|string',
            'idol_head_bio' => 'required|string',
            'idol_email' => 'required|string|email|unique:idol_info',
            // 'idol_phone' => 'string|unique:idol_info',
            'request_video_price' => 'required',
        ]);

        $idol_cat_ids = $request->idol_cat_id;
        for ($i=0; $i < count($idol_cat_ids); $i++) { 
            $idol_cat_ids[$i] = intval($idol_cat_ids[$i]);
        }
        $idol_cat_ids = json_encode($idol_cat_ids);

        $user_info = [
            'name' => $request->idol_full_name,
            'k_name' => $request->idol_k_name,
            'email' => $request->idol_email,
            'password' => Hash::make($request->password),
            'phone' => $request->idol_phone,
            'info' => $request->idol_bio,
            'cat_id' => $idol_cat_ids,
            'role' => 1,
            'is_setup' => 1
        ];
        
        $user = User::create($user_info);
        
        $photo_img_name = $request->idol_photo->getClientOriginalName();
        $request->idol_photo->move(public_path('assets/images/img'), $photo_img_name);

        unset(
            $idol_info['request_lang'], 
            $idol_info['request_video_price'], 
            $idol_info['request_vocation'], 
            $idol_info['request_video'], 
            $idol_info['request_payment_method']
        );
        $idol_info['idol_photo'] = $photo_img_name;
        $idol_info['idol_cat_id'] = $idol_cat_ids;
        $idol_info['idol_user_id'] = $user->id;
        
        $video_name = $request->request_video->getClientOriginalName();
        $request->request_video->move(public_path('assets/videos'), $video_name);
        $idol_info = IdolInfo::create($idol_info);

        unset(
            $video_request['idol_full_name'], 
            $video_request['idol_k_name'], 
            $video_request['idol_user_name'], 
            $video_request['idol_email'], 
            $video_request['idol_phone'], 
            $video_request['idol_bio'], 
            $video_request['idol_head_bio'], 
            $video_request['idol_photo'], 
            $video_request['idol_cat_id'],
        );
        $video_request['request_idol_id'] = $idol_info->idol_id;
        $video_request['request_video'] = $video_name;

        if(!isset($request_info['request_vocation'])) {
            $request_info['request_vocation'] = 0;
        } else {
            $request_info['request_vocation'] = 1;
        }

        // $user->cat_id = $request->idol_cat_id;
        // $user->is_setup = 1;
        // $user->save();
        
        $video_request = VideoRequest::create($video_request);

        return redirect()->route('admin-idol');
    }

    public function update_idol(Request $request)
    {
        $idol_info = $request->all();
        $video_request = $request->all();
        
        $request->validate([
            'idol_full_name' => 'required|string',
            'idol_k_name' => 'required|string',
            'idol_user_name' => 'required|string',
            'idol_bio' => 'required|string',
            'idol_head_bio' => 'required|string',
            'idol_email' => 'required|string|email',
            // 'idol_phone' => 'required|string',
            'request_video_price' => 'required',
        ]);

        $idol_cat_ids = $request->idol_cat_id;
        for ($i=0; $i < count($idol_cat_ids); $i++) { 
            $idol_cat_ids[$i] = intval($idol_cat_ids[$i]);
        }
        $idol_cat_ids = json_encode($idol_cat_ids);

        $idol = IdolInfo::where('idol_id', $request->idol_info_id);
        if($request->password) {
            $user_info = [
                'name' => $request->idol_full_name,
                'k_name' => $request->idol_k_name,
                'email' => $request->idol_email,
                'password' => Hash::make($request->password),
                'phone' => $request->idol_phone,
                'info' => $request->idol_bio,
                'cat_id' => $idol_cat_ids,
                'role' => 1,
                'is_setup' => 1
            ];
        } else {
            $user_info = [
                'name' => $request->idol_full_name,
                'k_name' => $request->idol_k_name,
                'email' => $request->idol_email,
                'phone' => $request->idol_phone,
                'info' => $request->idol_bio,
                'cat_id' => $idol_cat_ids,
                'role' => 1,
                'is_setup' => 1
            ];
        }
        
        User::where('id', $idol->first()->idol_user_id)->update($user_info);
        
        if($request->idol_photo) {
            $photo_img_name = $request->idol_photo->getClientOriginalName();
            $request->idol_photo->move(public_path('assets/images/img'), $photo_img_name);
            $idol_info['idol_photo'] = $photo_img_name;
        } else {
            unset($idol_info['idol_photo']);
        }

        $idol_info['idol_cat_id'] = $idol_cat_ids;

        unset(
            $idol_info['request_lang'], 
            $idol_info['request_video_price'], 
            $idol_info['request_vocation'], 
            $idol_info['request_video'], 
            $idol_info['request_payment_method'],
            $idol_info['idol_info_id'],
            $idol_info['_token'],
            $idol_info['password'],
        );

        IdolInfo::where('idol_id', $request->idol_info_id)->update($idol_info);
        
        if($request->request_video) {
            $video_name = $request->request_video->getClientOriginalName();
            $request->request_video->move(public_path('assets/videos'), $video_name);
            $video_request['request_video'] = $video_name;
        } else {
            unset($idol_info['request_video']);
        }

        unset(
            $video_request['idol_full_name'], 
            $video_request['idol_k_name'], 
            $video_request['idol_user_name'], 
            $video_request['idol_email'], 
            $video_request['idol_phone'], 
            $video_request['idol_bio'], 
            $video_request['idol_head_bio'], 
            $video_request['idol_photo'], 
            $video_request['idol_cat_id'],
            $video_request['idol_info_id'],
            $video_request['password'],
            $video_request['_token'],
        );

        if(!isset($video_request['request_vocation'])) {
            $video_request['request_vocation'] = 0;
        } else {
            $video_request['request_vocation'] = 1;
        }

        // $user = User::where('id', $idol->first()->idol_user_id)->first();
        // $user->cat_id = $request->idol_cat_id;
        // $user->is_setup = 1;
        // $user->save();
        
        $video_request = VideoRequest::where('request_idol_id', $request->idol_info_id)->update($video_request);

        return redirect()->route('admin-idol-edit', $request->idol_user_name)->with('success', 'Successfully updated!');
    }

    public function idol_list()
    {
        $idols = IdolInfo::where('idol_del_flag', 0)->orderBy('created_at', 'desc')->get();

        $data = array();
        foreach ($idols as $key => $idol) {
            $fans_count = 0;
            foreach (User::where('del_flag', 0)->get() as $user) {
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
                'checkbox' => '<input type="checkbox" class="idol-list" name="checkbox" value="'.$idol->idol_id.'">',
                'idol_user_name' => '<a style="color:#2178F9" href="'.url('/admin/idol-edit/'.$idol->idol_user_name).'">'.$idol->idol_user_name.'</a>',
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

    public function idol_edit($idol_name)
    {
        $idol_info = IdolInfo::where('idol_user_name', $idol_name)->first();
        $video_request = VideoRequest::where('request_idol_id', $idol_info->idol_id)->first();

        return view('admin.edit-idol', compact('idol_info', 'video_request'));
    }

    public function delete_idol(Request $request)
    {
        $idol_lists = $request->idol_list;
        $idol_lists = explode(',', $idol_lists);
        
        foreach($idol_lists as $idol) {
            $idol = IdolInfo::where('idol_id', $idol)->first();
            $idol->idol_del_flag = 1;
            $idol->save();

            $user = User::where('id', $idol->idol_user_id)->first();
            $user->del_flag = 1;
            $user->save();
        }

        return redirect()->back()->with('success', 'Successfully removed!');
    }

    public function idol_filter(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $status = $request->status;

        $query = IdolInfo::orderBy('created_at', 'desc');
        if($status != '') {
            $query->where('idol_status', $status);
        }
        if($from != '') {
            $query->where('created_at', '>=', $from.'%');
        }
        if($to != '') {
            $query->where('created_at', '<=', $to.'%');
        }
        $idols = $query->get();

        $data = array();
        foreach ($idols as $key => $idol) {
            $fans_count = 0;
            foreach (User::where('del_flag', 0)->get() as $user) {
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
                'checkbox' => '<input type="checkbox" class="idol-list" name="checkbox" value="'.$idol->idol_id.'">',
                'idol_user_name' => '<a style="color:#2178F9" href="'.url('/admin/idol-edit/'.$idol->idol_user_name).'">'.$idol->idol_user_name.'</a>',
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
        $fans = User::where('role', 2)->orderBy('created_at', 'desc')->where('del_flag', 0)->get();

        $data = array();
        foreach ($fans as $key => $fan) {
            $order_count = Order::where('order_fans_id', $fan->id)->get()->count();
            $completed_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 1)->get();
            $refuned_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 3)->orWhere('order_status', 4)->get();
            $pending_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 0)->get();

            $data[] = [
                'checkbox' => '<input type="checkbox" class="fan-list" name="checkbox" value="'.$fan->id.'">',
                'fans_user_name' => '<a style="color:#2178F9" href="'.url('/admin/fans-edit/'.$fan->user_name).'">'.$fan->user_name.'</a>',
                'fans_full_name' => $fan->name,
                'email' => $fan->email,
                'credits' => '<div class="credits" data-id="'.$fan->id.'">$  <span class="text-main-color">'.$fan->credits.'</span></div>',
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

    public function delete_fans(Request $request)
    {
        $fan_lists = $request->fans_list;
        $fan_lists = explode(',', $fan_lists);
        
        foreach($fan_lists as $fan) {
            $user = User::where('id', $fan)->first();
            $user->del_flag = 1;
            $user->save();
        }

        return redirect()->back()->with('success', 'Successfully removed!');
    }

    public function update_fans(Request $request)
    {
        // $request->validate([
        //     'idol_full_name' => 'required|string',
        //     'idol_user_name' => 'required|string',
        //     'idol_bio' => 'required|string',
        //     'idol_email' => 'required|string|email|unique:idol_info',
        //     'idol_phone' => 'required|string|unique:idol_info',
        // ]);

        if($request->photo) {
            $photo_img_name = $request->photo->getClientOriginalName();
            $request->photo->move(public_path('assets/images/img'), $photo_img_name);
            $user_info = [
                'photo' => $photo_img_name
            ];
            User::where('id', $request->fans_id)->update($user_info);
        }

        if($request->password) {
            $user_info = [
                'name' => $request->_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'phone' => $request->phone,
                'info' => $request->info,
                'role' => 2
            ];
        } else {
            $user_info = [
                'name' => $request->_name,
                'user_name' => $request->user_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'info' => $request->info,
                'role' => 2
            ];
        }
        
        User::where('id', $request->fans_id)->update($user_info);

        return response()->json(['success' => true, 'redirect_url' => url('/admin/fans-edit/'.$request->user_name)]);
    }

    public function fans_edit($fans_name)
    {
        $fans = User::where('user_name', $fans_name)->first();

        return view('admin.edit-fans', compact('fans'));
    }

    public function fans_filter(Request $request)
    {
        $from = $request->from;
        $to = $request->to;
        $status = $request->status;

        $query = User::where('role', 2);
        if($status != '') {
            $query->where('status', $status);
        }
        if($from != '') {
            $query->where('created_at', '>=', $from.'%');
        }
        if($to != '') {
            $query->where('del_flag', 0)->where('created_at', '<=', $to.'%');
        }
        $fans = $query->orderBy('created_at', 'desc')->get();

        $data = array();
        foreach ($fans as $key => $fan) {
            $order_count = Order::where('order_fans_id', $fan->id)->get()->count();
            $completed_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 1)->get();
            $refuned_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 3)->orWhere('order_status', 4)->get();
            $pending_orders = Order::where('order_fans_id', $fan->id)->where('order_status', 0)->get();

            $data[] = [
                'checkbox' => '<input type="checkbox" class="fan-list" name="checkbox" value="'.$fan->id.'">',
                'fans_user_name' => '<a style="color:#2178F9" href="'.url('/admin/fans-edit/'.$fan->user_name).'">'.$fan->user_name.'</a>',
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
