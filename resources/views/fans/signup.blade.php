@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')

<style>
.image-block {
    background: url("{{ asset('assets/images/girl.png') }}") no-repeat center center;
    background-size: cover;
    height: 100vh;
    /* filter: opacity(66%);
    -webkit-filter: opacity(66%); */
}
.custom-input {
    background: #fff!important;
    color: #000;
}
.inputWithIcon .custom-input {
    padding-right: 40px;
}

</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0 idol-registration">
        <div class="row m-0 fans">
            <div class="col-12 col-sm-8 col-md-8 image-block">
                <div class="top">
                    <img src="{{ asset('assets/images/top-left-img.png') }}">
                </div>
                <div class="image-title">
                    <h1 class="text-main-color mb-4">Reach<br>your idols</h1>
                    <h4 class="text-main-color">Lorem Ipsum is simply dummy text of the printing and<br> typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s, when an<br> unknown printer took a galley of type and scrambled it to<br> make a type specimen book.</h4>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 form-block">
                <div class="title-part text-center">
                    <h2 class="text-white title">Sign Up!</h2>
                    <h4 class="text-grey sub-title">Start meet your favourite Korean idol.</h4>
                </div>
                <div class="register-part">
                    <form class="custom-form">
                        <div class="row m-0">
                            <div class="col-7 col-sm-7 col-md-7">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your name</label>
                                    <input type="text" placeholder="Your name" class="custom-input">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                                </div>
                            </div>
                            <div class="col-5 col-sm-5 col-md-5">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your Date Birth</label>
                                    <input type="text" placeholder="24 March 2021" class="custom-input" id="datepicker">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/calendar.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Email</label>
                                    <input type="text" placeholder="Email" class="custom-input">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Password</label>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/password.png') }}">
                                    <input type="password" placeholder="Password" class="custom-input">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/hide.png') }}" style="right: 0;left:unset">
                                </div>
                            </div>
                            <div class="col-12">
                                <!-- <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="customCheck1" checked>
                                    <label class="custom-control-label text-white" for="customCheck1">Remember me</label>
                                </div> -->
                                <label class="custom-control black-checkbox">
                                    <input type="checkbox" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Remember me</span>
                                </label>
                            </div>
                            <div class="col-12 mt-4 mb-5">
                                <button class="btn custom-btn w-100" type="button" id="next">Register</button>
                            </div>
                            <div class="divider mb-5" style="width:100%;height:1px;background:#898989;">
                                <!-- <div class="divider-text">OR</div> -->
                            </div>
                            <div class="col-6">
                                <button class="btn custom-btn w-100 google-btn d-flex" type="button" id="next">
                                    <div class="m-auto">
                                        <img src="{{ asset('assets/images/icons/google.png') }}">
                                    </div>
                                    <div class="m-auto">
                                        Sign up with Google
                                    </div>
                                </button>
                            </div>
                            <div class="col-6">
                                <button class="btn custom-btn w-100 facebook-btn d-flex" type="button" id="next">
                                    <div class="m-auto">
                                        <img src="{{ asset('assets/images/icons/face.png') }}">
                                    </div>
                                    <div class="m-auto">
                                        Sign up with Facebook
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 text-center" style="margin-top: 100px">
                                <a class="text-white">Have account?</a>
                                <a class="text-main-color" href="{{ route('fans-signin') }}">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
<script>
    $(document).ready(function() {
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    })
</script>
@endsection
