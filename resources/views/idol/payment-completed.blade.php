@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
</style>
@endsection

@section('content')
<div class="row wizard m-0 mb-3">
    <div class="col-12 col-sm-12 col-md-12 d-flex title">
       <h3 class="text-white">Complete your information to start</h3>
       <p class="text-white mb-0">Status:<span class="font-weight-bold">Active</span></p>
    </div>
</div>
<div class="row wizard payment-completed m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12 wizard-block">
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 success text-center">
                <img class="mb-3" src="{{ asset('assets/images/tick.png') }}">
                <h4 class="text-white">Your Setup is Completed</h4>
                <p class="text-white">Your fans can now request personalized videos from you</p>
                <button class="btn custom-btn" style="width: 300px">Back to Dashboard</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $(document).on('click', '#photo_btn', function() {
        $('#photo_img').click();
    });

    $(document).on('click', '#banner_btn', function() {
        $('#banner_img').click();
    })

    $(document).on('click', '.upload-video', function() {
        $('#upload-video').click();
    })

    $(document).on('click', '#profile_btn', function() {
        $('#profile_information').addClass('d-none');
        $('#request_video').removeClass('d-none');
        $('#profile_step').removeClass('active');
        $('#request_step').addClass('active');
        $('#step_number').html('2');
    })

    $(document).on('click', '#to_profile', function() {
        $('#profile_information').removeClass('d-none');
        $('#request_video').addClass('d-none');
        $('#profile_step').addClass('active');
        $('#request_step').removeClass('active');
        $('#step_number').html('1');
    })

    $(document).on('click', '#request_btn', function() {
        $('#request_video').addClass('d-none');
        $('#video_introduction').removeClass('d-none');
        $('#request_step').removeClass('active');
        $('#introduction_step').addClass('active');
        $('#step_number').html('3');
    })

    $(document).on('click', '#to_request', function() {
        $('#request_video').removeClass('d-none');
        $('#video_introduction').addClass('d-none');
        $('#request_step').addClass('active');
        $('#introduction_step').removeClass('active');
        $('#step_number').html('2');
    })

    $(document).on('click', '#introduction_btn', function() {
        $('#video_introduction').addClass('d-none');
        $('#payment_method').removeClass('d-none');
        $('#introduction_step').removeClass('active');
        $('#payment_step').addClass('active');
        $('#step_number').html('4');
    })

    $(document).on('click', '#to_introduction', function() {
        $('#video_introduction').removeClass('d-none');
        $('#payment_method').addClass('d-none');
        $('#introduction_step').addClass('active');
        $('#payment_step').removeClass('active');
        $('#step_number').html('3');
    })
})
</script>
@endsection