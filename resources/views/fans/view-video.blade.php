@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.modal-dialog {
    max-width: 800px;
    margin: 30px auto;
}
.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
#myModal {
    top: 25%;
}
.modal-backdrop {
    background-color: #FF335C;
}
.video-part video {
    border-radius: 15px;
}
</style>
@endsection

@section('content')
<div class="row follow-idol view-video payment-success m-0 mb-4">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', $order->order_idol_id)->first();
        $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
    @endphp
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Congratulation Melissa</h2>
                <p class="text-grey">From <span class="text-main-color">{{ $idol_info->idol_full_name }}</span></p>
            </div>
            <div class="m-auto d-flex share" style="margin-right: 0px!important">
                <p class="mb-0 text-white mr-4 desktop">Share to:</p>
                <img src="{{ asset('assets/images/icons/facebook.png') }}">
                <img src="{{ asset('assets/images/icons/instagram.png') }}">
                <img src="{{ asset('assets/images/icons/gmail.png') }}" style="height: 20px!important">
                <img src="{{ asset('assets/images/icons/cloud.png') }}" style="height: 24px!important">
            </div>
        </div>
        <div class="divider"></div>
    </div>
</div>
<div class="row featured view-video payment-success mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="video-part w-100 mb-3">
            <video width="100%" height="290" controls>
                <!-- <source src="{{ asset('assets/videos/').$order->order_video }}" type="video/mp4"> -->
                <source src="{{ asset('assets/videos/'.$order->order_video) }}">
                Your browser does not support the video tag.
            </video>
        </div>
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
            <div class="instruction">
                <h5 class="text-white">Instruction</h5>
                <br>
                <p style="font-size: 16px;color:#898989">Here is the instruction from you for your idols</p><br>
                <p class="text-white" style="font-size: 16px">{{ $order->order_introduction }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-3 text-center">
                    <h4 class="text-white">Your Review</h4>
                    <div class="stars">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                </div>
                <div class="col-12 title mb-3 text-center">
                    <h4 class="text-white mb-3">Leave Feedback</h4>
                    <textarea style="background:#2b2b2b!important" class="form-control introduction mb-3" rows="5" id="comment" placeholder="Tell your idol what they want to say on the video"></textarea>
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn">Send Feedback</button>
                </div>
            </div>
        </div>
        <div class="lang-preference mb-3 desktop">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">Requested from</h4>
                    </div>
                </div>
                <div class="col-12 how-content">
                    <div class="content-item mb-4">
                        <div class="user-img">
                            <img src="{{ asset('assets/images/profile.png') }}" class="img-circle">
                        </div>
                        <div class="ml-3 my-auto user-name">
                            <p class="mb-0 text-lowercase">{{ '@'.$fans->name }}</p>
                            <p class="text-main-color mb-0">{{ $fans->name }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                            @endphp
                            <h4 class="text-white mb-3">Occasion</h4>
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
                            <p class="text-main-color mb-0">Mix(English and Korean)</p>
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
});
</script>
@endsection