@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.custom-col {
    padding-left: 10px;
    padding-right: 10px;
}
.video-item:hover {
    cursor: pointer;
}
.request-badge {
    color: white;
    background: #ff335c;
    border-radius: 7px;
    padding: 2px 4px;
    /* margin-left: 8px; */
    font-size: 12px;
    text-align: center;
    justify-content: center;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
}
</style>
@endsection

@section('content')
@if(!Auth::user()->is_setup)
<div class="row idol discover-favourite mb-4">
    <div class="col-12 col-sm-12 col-md-12 d-flex user-profile">
        <div class="profile-info">
            <h4 class="text-white">You are not set up yet</h4>
            <h5 class="text-white" style="font-weight: unset">Complete your profile first so you can go<br>LIVE and start reaching out to your fans.</h5>
            <button class="btn custom-btn get-started">Get Started</button>
        </div>
        <div class="profile-action">
            <div class="grey-btn">
                <p class="text-white">Status: <span class="font-weight-bold">Pending</span></p>
            </div>
            <div class="circle-percent">
                <p class="mb-0 text-white">0%</p>
                <p class="mb-0 text-white">Done</p>
            </div>
        </div>
    </div>
</div>
@endif
<div class="row idol">
    <div class="col-12 col-sm-12 col-md-12 p-0">
        <div class="row m-0">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="grey-part w-100 mb-3">
                    <p class="mb-0 text-white">Hi, {{ Auth::user()->name }},</p>
                    <h4 class="mb-0 text-white">What's new on your dashboard?</h4>
                </div>
                <div class="total-card">
                    <div class="w-40">
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">{{ $total_request }}</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Total</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">{{ $pending_request }}</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Pending</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">{{ $completed_request }}</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Completed</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                        <div class="total-item d-flex mb-3">
                            <div class="my-auto">
                                <h3 class="text-main-color mb-0">{{ $paidout_request }}</h3>
                            </div>
                            <div class="my-auto">
                                <p class="text-main-color mb-0 font-weight-bold">Paid Out</p>
                                <p class="text-main-color mb-0">Request</p>
                            </div>
                        </div>
                    </div>
                    <div class="w-60">
                        <div class="col-12 col-sm-12 col-md-12 featured-video pr-0">
                            <div class="my-booking pb-0">
                                <div class="row m-0 mb-3">
                                    <div class="col-12 title">
                                        <div class="d-flex">
                                            <h4 class="text-white">My Bookings</h4>
                                        </div>
                                        <p class="mb-2">Net Earnings and Potential Earnings</p>
                                    </div>
                                    <div class="col-12 how-content">
                                        <div class="divider mb-3"></div>
                                        <div class="d-flex mb-2">
                                            <div class="col-sm-6 text-center m-auto p-0" style="border-right: 1px solid #2b2b2b;">
                                                <h5 class="text-white">Total Booking</h5>
                                                <h5 class="text-main-color">${{ number_format($total_booking) }}</h5>
                                            </div>
                                            <div class="col-sm-6 text-center m-auto p-0">
                                                <h5 class="text-white">Pending Booking</h5>
                                                <h5 class="text-main-color">${{ number_format($pending_booking) }}</h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12 how-content">
                                        <div class="divider mb-3"></div>
                                        <div class="d-flex mb-2">
                                            <div class="col-sm-6 text-center m-auto p-0" style="border-right: 1px solid #2b2b2b;">
                                                <h5 class="text-white">Net Earnings</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                            <div class="col-sm-6 text-center m-auto p-0">
                                                <h5 class="text-white">Paid Out</h5>
                                                <h5 class="text-main-color">$0</h5>
                                            </div>
                                        </div>
                                        <div class="divider mb-3"></div>
                                    </div>
                                    <div class="col-12">
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">500</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">400</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">300</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">200</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-2 text-white">100</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart d-flex">
                                            <span class="mr-4 text-white">0</span>
                                            <div class="my-auto" style="height: 1px;background: #898989;width: 100%"></div>
                                        </div>
                                        <div class="chart-x d-flex" style="margin-left: 30px">
                                            <span class="text-white m-auto">Jan</span>
                                            <span class="text-white m-auto">Feb</span>
                                            <span class="text-white m-auto">Mar</span>
                                            <span class="text-white m-auto">Apr</span>
                                            <span class="text-white m-auto">Mei</span>
                                            <span class="text-white m-auto">Jun</span>
                                            <span class="text-white m-auto">Jul</span>
                                            <span class="text-white m-auto">Ags</span>
                                            <span class="text-white m-auto">Sep</span>
                                            <span class="text-white m-auto">Okt</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="standard-delivery">
                                    <a href="{{ route('idol-earning') }}"><span class="text-white">Go To Eearnings</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6 featured-video pr-0">
                <div class="my-booking pb-0">
                    <div class="row m-0 mb-3">
                        <div class="col-12 title">
                            <div class="d-flex">
                                <h4 class="text-white">Request Video Notification</h4>
                            </div>
                            <p class="mb-2">Quick action notification</p>
                        </div>
                        <div class="col-12">
                            <div class="divider mb-3"></div>
                            <div class="d-flex mb-2">
                                <a href="#" class="text-main-color mr-3 v-notify" data-value="0">
                                    New Request
                                    @if($pending_request)
                                    <span class="request-badge">{{ $pending_request }}</span>
                                    @endif
                                </a>
                                <a href="#" class="mr-3 text-grey v-notify" data-value="0">
                                    Pending
                                    @if($pending_request)
                                    <span class="request-badge">{{ $pending_request }}</span>
                                    @endif
                                </a>
                                <a href="#" class="mr-3 text-grey v-notify" data-value="3">
                                    Refunded
                                    @if($refund_request)
                                    <span class="request-badge">{{ $refund_request }}</span>
                                    @endif
                                </a>
                                <a href="#" class="mr-3 text-grey v-notify" data-value="1">
                                    Fulfilled
                                    @if($total_request)
                                    <span class="request-badge">{{ $total_request }}</span>
                                    @endif
                                </a>
                            </div>
                            <div class="w-100 v-notify-list" style="height: 390px;overflow:auto">
                                @if(count($orders))
                                @foreach($orders as $order)
                                @php
                                    $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
                                @endphp
                                <div class="video-notification-item">
                                    <div class="row">
                                        <div class="col-5 col-md-5 d-flex my-auto">
                                            @if($fans->photo)
                                            <img class="img-circle mr-2 my-auto profile-img" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                                            @else
                                            <img class="img-circle mr-2 my-auto profile-img" src="{{ asset('assets/images/no-image.jpg') }}">
                                            @endif
                                            <div class="new-msg my-auto">
                                                <h4 class="text-white">New Request</h4>
                                                <p class="text-white">from <span class="text-main-color">{{ $fans->name }}</span></p>
                                            </div>
                                        </div>
                                        <div class="col-5 col-md-5 m-auto">
                                            <div class="d-flex">
                                                <div class="my-auto" style="width:20px;height:20px">
                                                    <img class="mb-1" src="{{ asset('assets/images/icons/chat.png') }}">
                                                </div>
                                                @if($order->order_lang == 1)
                                                <span class="mb-0" style="font-size: 13px;color:#898989">English</span>
                                                @elseif($order->order_lang == 2)
                                                <span class="mb-0" style="font-size: 13px;color:#898989">Korean</span>
                                                @else
                                                <span class="mb-0" style="font-size: 13px;color:#898989">Mix(English and Korean)</span>
                                                @endif
                                            </div>
                                            <div class="d-flex">
                                                <div class="my-auto" style="width:20px;height:20px">
                                                    <img class="mb-1" src="{{ asset('assets/images/icons/fire.png') }}">
                                                </div>
                                                @php
                                                    $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                                                @endphp
                                                <span class="mb-0" style="font-size: 13px;color:#898989">{{ $occasion->occasion_name }}</span>
                                            </div>
                                        </div>
                                        <div class="col-2 col-md-2 pl-0 m-auto">
                                            <button type="button" class="btn custom-btn w-100 view-btn" data-id="{{ $order->order_id }}">View</button>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                @else
                                <div class="row m-0">
                                    <div class="col-12 text-center">
                                        <p class="text-white mt-5">No request video yet.</p>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="standard-delivery">
                        <a href="{{ route('idol-video-request') }}"><span class="text-white">See all request</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Featured Videos</h2>
            <p class="text-grey">All fulfilled videos request submitted</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0 mb-4">
                <div class="col-12 col-sm-12 text-center p-0 featured-video">
                    <div class="row m-0 video-list">
                        @if(count($ordered_videos))
                        @foreach($ordered_videos as $order)
                        @php
                            $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
                        @endphp
                        <div class="col-6 col-sm-3 col-md-3 mb-3">
                            <div class="video-item" data-id="{{ $order->order_id }}">
                                <video id="video_{{ $order->order_id }}" controls>
                                    <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mp4">
                                    <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mkv">
                                    Your browser does not support the video tag.
                                </video>
                                <div class="video-title d-flex mt-1">
                                    <h5 class="mb-0">Congratulation Melissa</h5>
                                    <h5 class="mb-0" id="duration_{{ $order->order_id }}">00:00</h5>
                                </div>
                                <p class="mb-0 text-left">From <span class="text-main-color">{{ $fans->name }}</span></p>
                            </div>
                        </div>
                        @endforeach
                        @else
                        <div class="col-12 col-sm-12 col-md-12 d-flex" style="height:100px">
                            <p class="text-white m-auto" style="font-size: 16px">No video yet.</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
function format(s) {
    var m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}
$(document).ready(function() {
    $(".video-item").each(function() {
        var id = $(this).data('id');
        var myVideo = document.getElementById("video_" + id);
        myVideo.onloadedmetadata = function() {
            $('#duration_' + id).html(format(this.duration));
        };
    });
    $('.custom-col').on('click', function() {
        location.href = "{{ route('follow-idol') }}";
    });
    $(document).on('click', '.get-started', function() {
        location.href = "{{ route('idol-wizard') }}";
    });
    $(document).on('click', '.view-btn', function() {
        location.href = "{{ route('idol-v-request-detail') }}" + '?order_id=' + $(this).data('id');
    });
    $(document).on('click', '.v-notify', function() {
        var status = $(this).data('value');
        
        $.ajax({
            url: "{{ route('idol-video-notify') }}",
            method: 'get',
            data: { status: status },
            success: function (res) {
                $('.v-notify-list').html(res);
            }
        });
    });
})
</script>
@endsection