@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

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
                <p class="mb-0" style="font-size: 16px;color:#898989">27 May 2021</p>
            </div>
        </div>
        <div class="w-100">
            <div class="instruction">
                <h5 class="text-white">Instruction</h5>
                <br>
                <p class="text-white mb-0" style="font-size: 16px">Here is the instruction from you for your idols</p><br>
                <p class="text-white mb-0" style="font-size: 16px">Hi, John</p><br>
                <p class="text-white mb-0" style="font-size: 16px">Please make video for Melissa, Encourage her for her exam next month.</p>
                <p class="text-white mb-0" style="font-size: 16px">Thank you so much.</p><br>
                <p class="text-white mb-0" style="font-size: 16px">Regards</p>
                <p class="text-white mb-0" style="font-size: 16px">John Doe</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-3 text-center pt-4">
                    <h4 class="text-white mb-3">Accept this offers?</h4>
                    <p style="color:#898989">Your fans want to hear your replies.</p>
                    <h3 class="text-main-color price">$200</h3>
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn mb-3">Accept</button>
                    <button type="button" class="btn custom-btn w-100 send-feedback-btn deactive">Decline</button>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 video-detail">
        <div class="row">
            <div class="col-12 col-md-3 col-sm-3">
                <div class="request">
                    <h4 class="text-white mb-3">Requested from</h4>
                    <div class="d-flex">
                        <img class="img-circle mr-2" src="{{ asset('assets/images/profile.png') }}">
                        <div class="user">
                            <p class="mb-0">@johndoe</p>
                            <h4 class="text-main-color">John Doe</h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-3 col-sm-3">

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