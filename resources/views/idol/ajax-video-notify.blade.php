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