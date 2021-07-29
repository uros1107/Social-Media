@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.view-video .lang-preference {
    background: #2b2b2b!important;
}
.lang-preference .title h4 {
    font-size: 24px!important;
}
.lang-preference .price {
    font-size: 36px;
    margin: 50px 0px;
}
.lang-preference .deactive {
    background: #2b2b2b;
    border: 1px solid #ff335c;
}
@media (max-width: 574px) {
    .payment-success .col-12 {
        padding: 0px 10px;
    }
    .container-fluid {
        padding: 10px!important;
    }
}
</style>
@endsection

@section('content')
<div class="row featured view-video payment-success mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Personalized video request detail</h2>
                <p class="text-grey">Let see what your fans wanted.</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">{{  Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="w-100">
            <h5 class="text-white">Instructions</h5>
            <div class="instruction">
                <!-- <p class="mb-0" style="font-size: 16px;color:#898989">Here is the instruction from you for your idols</p><br> -->
                <p class="text-white mb-0" style="font-size: 16px">{{ $order->order_introduction }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-3 text-center pt-4">
                    @if($order->order_status != 1)
                    <h4 class="text-white mb-3">Accept this offers?</h4>
                    @else
                    <h4 class="text-white mb-3">This order was fulfilled!</h4>
                    @endif
                    <p style="color:#898989">Your fans want to hear your replies.</p>
                    <h3 class="text-main-color price">${{ $order->order_price }}</h3>
                    @if($order->order_status != 0)
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn mb-3 accept-btn" disabled style="cursor: not-allowed">Accept</button>
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn deactive decline-btn" disabled style="cursor: not-allowed">Decline</button>
                    @else
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn mb-3 accept-btn">Accept</button>
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn deactive decline-btn">Decline</button>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 video-detail mt-3">
        <div class="row">
            @php
                $fans =  DB::table('users')->where('id', $order->order_fans_id)->first();
            @endphp
            <div class="col-12 col-md-3 col-sm-3">
                <div class="request">
                    <h4 class="text-white mb-3">Requested from</h4>
                    <div class="d-flex">
                        @if($fans->photo)
                        <img class="img-circle mr-2" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                        @else
                        <img class="img-circle mr-2" src="{{ asset('assets/images/no-image.jpg') }}">
                        @endif
                        <div class="user">
                            <p class="mb-0">{{ '@'.$fans->user_name }}</p>
                            <h4 class="text-main-color">{{ $fans->name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-sm-3">
                <div class="request">
                    <h4 class="text-white mb-3">Occasion</h4>
                    <div class="d-flex">
                        <div class="user">
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                            @endphp
                            <p class="mb-0">Occasion Type</p>
                            <h4 class="text-main-color">{{ $occasion->occasion_name }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-sm-3">
                <div class="request">
                    <h4 class="text-white mb-3">For who?</h4>
                    <div class="d-flex">
                        <div class="user">
                            <p class="mb-0">{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
                            <h4 class="text-main-color">{{ $order->order_to }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-sm-3">
                <div class="request">
                    <h4 class="text-white mb-3">Language</h4>
                    <div class="d-flex">
                        <div class="user">
                            <p class="mb-0">Language request for this personalized video</p>
                            @if($order->order_lang == 1)
                            <h4 class="text-main-color">English</h4>
                            @elseif($order->order_lang == 2)
                            <h4 class="text-main-color">Korean</h4>
                            @else
                            <h4 class="text-main-color">Both(English and Korean)</h4>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
    $(document).on('click', '.first-block', function() {
        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.first-block').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
    });
    $(document).on('click', '.accept-btn', function() {
        location.href = "{{ route('idol-video-record').'?order_id='.$order->order_id }}";
    })
    $(document).on('click', '.decline-btn', function() {
        location.href = "{{ route('idol-video-decline').'?order_id='.$order->order_id }}";
    })
});
</script>
@endsection