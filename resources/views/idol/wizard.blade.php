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
       <p class="text-white mb-0">Status:<span class="font-weight-bold">Pending</span></p>
    </div>
</div>
<div class="row wizard m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12 wizard-block">
        <div class="row m-0">
            <div class="col-12 col-sm-4 col-md-4 left-part">
                <div class="d-flex step-title">
                    <div class="my-auto">
                        <h4 class="text-white">Step</h4>
                    </div>
                    <div>
                        <p class="text-white mb-0"><span class="font-weight-bold" id="step_number">1</span>/4</p>
                    </div>
                </div>
                <div class="step mt-5">
                    <div class="step-item">
                        <div class="step-circle active" id="profile_step"></div>
                        <span class="text-white">Profile Information</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="request_step"></div>
                        <span class="text-white">Video Request</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="introduction_step"></div>
                        <span class="text-white">Video Introduction</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="payment_step"></div>
                        <span class="text-white">Payment method</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 right-part">
                <form action="{{ route('setup-submit') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="sub-title" id="profile_information">
                        <h4 class="text-white mb-4">Profile <span class="text-main-color">Information</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input placeholder="">
                                    <span>Full Name</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input placeholder="">
                                    <span>Username</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input placeholder="" style="padding-right: 90px;">
                                    <span>Email</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}">
                                    <span class="text-white mb-0 verified">Verified!</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input placeholder="" style="padding-right: 90px;">
                                    <span>Phone Number</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}">
                                    <span class="text-white mb-0 verified">Verified!</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <label class="pure-material-textfield-outlined w-100 mb-0">
                                    <textarea placeholder="" rows="5" style="height:100px"></textarea>
                                    <span>Bio</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 img-upload">
                                <label class="ml-2">Upload Photo Profile (500px x 500px)</label>
                                <div class="upload-btn text-center" id="photo_btn">
                                    <img src="{{ asset('assets/images/icons/upload.png') }}">
                                    <span class="text-white ml-1">Upload or Drag & Drop your image here</span>
                                </div>
                                <input type="file" id="photo_img" class="d-none">
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 img-upload">
                                <label class="ml-2">Upload Banner (1100px x 200px)</label>
                                <div class="upload-btn text-center" id="banner_btn">
                                    <img src="{{ asset('assets/images/icons/upload.png') }}">
                                    <span class="text-white ml-1">Upload or Drag & Drop your image here</span>
                                </div>
                                <input type="file" id="banner_img" class="d-none">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="profile_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="request_video">
                        <h4 class="text-white mb-4">Request <span class="text-main-color">Video</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">Language Preference</h4>
                                <p class="sub-description-1">Your fans will choose this language for your request video</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex lang">
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="checkbox" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Engilsh</span>
                                </label>
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="checkbox" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Korean</span>
                                </label>
                                <label class="custom-control black-checkbox m-auto">
                                    <input type="checkbox" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Mix (English + Korean)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">Request Price</h4>
                                <p class="sub-description-1">Set your request price for your request videos fee</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                <label class="pure-material-textfield-outlined w-100  m-auto">
                                    <input placeholder="" class="text-main-color" value="$190">
                                    <span>My Request Price</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">On Vacation?</h4>
                                <p class="sub-description-1">Set your visibility, Let your fans know that you "On Vacation"</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                <div class="m-auto">
                                    <label class="switch">
                                        <input type="checkbox">
                                        <span class="slider"></span>
                                    </label>
                                    <span class="switch-label">Allow fans to request videos</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_profile">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="request_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="video_introduction">
                        <h4 class="text-white mb-4">Video <span class="text-main-color">Introduction</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 mb-3">
                                <div class="upload-video w-100 text-center">
                                    <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                                    <h5>Upload Video</h5>
                                    <p class="mb-0">Format ( .mp4 , .mkv )</p>
                                </div>
                                <input type="file" id="upload-video" class="d-none">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <button type="button" class="btn custom-btn w-100">Upload</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_request">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="introduction_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="payment_method">
                        <h4 class="text-white mb-5">Payment <span class="text-main-color">Method</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 stripe">
                                <div class="mobile-view">
                                    <img class="mb-3" src="{{ asset('assets/images/stripe.png') }}">
                                    <h4 class="text-white">Stripe<span>(Direct to Local Bank)</span></h4>
                                </div>
                                <ul class="text-white">
                                    <li>
                                        <p class="mb-0 text-white">US$3 Per Withdrawal</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 text-white">Stripe may charge additional fees for you to withdraw additional funds. Funds withdrawn will be in your local currency.</p>
                                    </li>
                                </ul>
                                <button type="button" class="btn custom-btn">Set Up Payment</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_introduction">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="submit" class="btn custom-btn" style="font-size: 14px">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
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