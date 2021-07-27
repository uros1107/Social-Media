@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.calculate {
    position: absolute;
    right: 0px;
    top: 10px;
}
.total-item {
    margin-left: 30px;
}
.total-item h4 {
    font-size: 14px;
}
.total-item p {
    font-size: 20px;
    margin-bottom: 0px!important;
}
.top-title {
    display: flex;
}
.top-divider {
    width: 100%;
    height: 1px;
    background:#2b2b2b
    ;margin-bottom: 15px;
}
.mid-divider {
    width: 100%;
    height: 1px;
    background:#2b2b2b;
    margin-top: 15px;
    margin-bottom: 15px;
}
.bot-divider {
    width: 100%;
    height: 1px;
    background:#2b2b2b;
    margin-top: 15px;
}
.v-divider {
    width: 1px;
    height: 54px;
    background: #2b2b2b;
}
.create-btn,
.create-btn:hover,
.create-btn:focus {
    height: 40px;
    border-radius: 8px!important;
    font-size: 14px;
}
@media (max-width: 574px) {
    .top-title {
        display: initial;
    }
    .video-part,
    .share {
        display: none!important;
    }
    .record-video {
        width: 50%;
        height: 123px;
        background: #2B2B2B;
        border-radius: 15px;
        margin: 0px 10px;
        text-align: center;
    }
    .record-video h4 {
        font-size: 16px;
        text-align: center;
        color: #898989
    }
    .record-video p {
        font-size: 14px;
        text-align: center;
        color: #898989;
    }
    .total-item {
        margin-left: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol view-video payment-success m-0 mb-0">
    @php
        $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
    @endphp
    <div class="col-12 col-sm-12 col-md-12 top-title">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Encourage her</h2>
                <p class="text-grey">{{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="calculate desktop">
            <div class="d-flex">
                <div class="total-item text-center">
                    <h4 class="text-white">Total Price</h4>
                    <p class="text-main-color">$0</p>
                </div>
                <div class="total-item text-center">
                    <h4 class="text-white">Net Earnings</h4>
                    <p class="text-main-color">$0</p>
                </div>
                <div class="total-item text-center">
                    <h4 class="text-white">Paid Out</h4>
                    <p class="text-main-color">$0</p>
                </div>
            </div>
        </div>
        <div class="mobile">
            <div class="top-divider"></div>
            <div class="d-flex mb-3">
                <div class="total-item text-center w-100">
                    <h4 class="text-white">Total Price</h4>
                    <p class="text-main-color">$0</p>
                </div>
            </div>
            <div class="mid-divider"></div>
            <div class="d-flex">
                <div class="total-item text-center w-50">
                    <h4 class="text-white">Net Earnings</h4>
                    <p class="text-main-color">$0</p>
                </div>
                <div class="v-divider"></div>
                <div class="total-item text-center w-50">
                    <h4 class="text-white">Paid Out</h4>
                    <p class="text-main-color">$0</p>
                </div>
            </div>
            <div class="bot-divider"></div>
            <div class="w-100 mt-3">
                <button type="button" class="btn custom-btn w-100 create-btn" data-id="{{ $order->order_id }}">Create Video</button>
            </div>
        </div>
    </div>
    <div class="top-divider mt-0"></div>
    <div class="col-12 col-sm-12 col-md-12 desktop">
        <div class="d-flex">
            <div class="text-white text-center my-auto mr-3" style="border-radius: 20px;width: 70px;border: 1px solid #FF335C;height:24px">
                Active
            </div>
            <div class="title-part d-flex">
                <div>
                    <h2 class="text-white" style="font-size:16px">Encourage her</h2>
                    <p class="text-grey" style="font-size:13px">from <span class="text-main-color">{{ $fans->name }}<span></p>
                </div>
            </div>
            <div class="calculate">
                <div class="d-flex">
                    <div class="total-item text-center">
                        <h4 class="text-white" style="font-size:12px">Create video before</h4>
                        <p class="text-main-color" style="font-size:14px">{{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
                    </div>
                    <div class="total-item text-center">
                        @if($order->order_status == 1)
                        <button class="btn custom-btn create-btn" data-id="{{ $order->order_id }}" disabled>Create Video</button>
                        @else
                        <button class="btn custom-btn create-btn" data-id="{{ $order->order_id }}">Create Video</button>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="top-divider mt-0"></div>
</div>
<div class="row featured view-video payment-success mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Personalized video request detail</h2>
                <p class="text-grey">Let see what do you want</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">{{ Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="w-100">
            <h5 class="text-white">Instructions</h5>
            <div class="instruction">
                <!-- <p style="font-size: 16px;color: #898989">Here is the instruction from you for your idols</p><br> -->
                <p class="text-white" style="font-size: 16px">{{ $order->order_introduction }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">Request from</h4>
                    </div>
                </div>
                <div class="col-12 how-content">
                    <div class="content-item mb-4">
                        <div class="user-img">
                            @if($fans->photo)
                            <img class="img-circle" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                            @else
                            <img class="img-circle" src="{{ asset('assets/images/no-image.jpg') }}">
                            @endif
                        </div>
                        <div class="ml-3 my-auto user-name">
                            <p class="mb-0">{{ '@'.$fans->name }}</p>
                            <p class="text-main-color mb-0">{{ $fans->name }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white mb-3">Occasion</h4>
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                            @endphp
                            <p class="mb-0">Occasion Type</p>
                            <p class="text-main-color mb-0">{{ $occasion->occasion_name }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">For who?</h4>
                            <p class="mb-0">{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
                            <p class="text-main-color mb-0">{{ $order->order_to }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">Language</h4>
                            <p class="mb-0">Language request for this personalized video</p>
                            @if($order->order_lang == 1)
                            <p class="text-main-color mb-0">English</p>
                            @elseif($order->order_lang == 2)
                            <p class="text-main-color mb-0">Korean</p>
                            @else
                            <p class="text-main-color mb-0">Both(English and Korean)</p>
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
    $(document).on('click', '.create-btn', function() {
        location.href = "{{ route('idol-video-record') }}" + '?order_id=' + $(this).data('id');
    })
});
</script>
@endsection