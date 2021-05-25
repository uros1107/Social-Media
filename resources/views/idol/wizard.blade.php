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
                        <p class="text-white mb-0"><span class="font-weight-bold">1</span>/4</p>
                    </div>
                </div>
                <div class="step mt-5">
                    <div class="step-item">
                        <div class="step-circle active"></div>
                        <span class="text-white">Profile Information</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle"></div>
                        <span class="text-white">Video Request</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle"></div>
                        <span class="text-white">Video Introduction</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle"></div>
                        <span class="text-white">Payment method</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 right-part">
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
                            <div class="upload-btn">
                                <img src="{{ asset('assets/images/icons/upload.png') }}">
                                <span class="text-white ml-3">Upload or Drag & Drop your image here</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6 img-upload">
                            <label class="ml-2">Upload Banner (1100px x 200px)</label>
                        </div>
                    </div>
                </div>
                <div class="sub-title d-none" id="request_video">
                    <h4 class="text-white">Profile <span class="text-main-color">Information</span></h4>
                </div>
                <div class="sub-title d-none" id="video_introduction">
                    <h4 class="text-white">Profile <span class="text-main-color">Information</span></h4>
                </div>
                <div class="sub-title d-none" id="payment_method">
                    <h4 class="text-white">Profile <span class="text-main-color">Information</span></h4>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection