@extends('layouts.front')

@section('title', 'Welcome to MILLIONK')

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
.form-block {
    padding: 40px 25px!important;
}
.idol-registration .title-part {
    margin: 40px 0px 30px;
}
.google-btn a {
    color: #000000;
}

@media screen and (max-width: 1024px) {
    .form-block {
        border-radius: 15px;
    }
}

@media (min-width: 768px) and (max-width: 1024px) {
    .image-block {
        padding: 80px;
    }
    .idol-registration .form-block {
        height: 100%;
    }
}

@media (min-width: 575px) and (max-width: 768px) {
    .image-block {
        padding: 50px;
    }
    .idol-registration .form-block {
        height: 100%;
    }
}

@media (min-width: 320px) and (max-width: 575px) {
    .image-block {
        padding: 20px;
        vertical-align: middle;
        display: table-cell!important;
    }
    .idol-registration .form-block {
        height: initial;
        padding: 25px;
    }
    .idol-registration .title-part {
        margin: 50px 0px 30px;
    }
    .idol-registration .title-part {
        margin: 18px 0px 0px;
    }
    .idol-registration .title {
        font-size: 18px;
    }
    .idol-registration .sub-title {
        font-size: 12px;
    }
    .input-label {
        font-size: 12px;
        margin-left: 10px;
    }
    .inputWithIcon {
        margin: 0px;
    }
    .inputWithIcon .custom-input {
        padding-right: 40px;
        height: 34px!important;
        font-size: 12px;
    }
    .input-icon {
        top: 31px;
        width: 40px;
    }
    .fill-control-description {
        font-size: 12px;
    }
    .fill-control-indicator {
        top: 6px;
    }
    .forgot {
        font-size: 12px;
    }
    .custom-btn {
        height: 34px!important;
        font-size: 16px;
        padding: 0px;
    }
    .login-part {
        margin: 15px 0px 20px!important;
    }
    .divider {
        margin-bottom: 20px!important;
    }
    .google {
        /* padding-right: 10px!important; */
    }
    .facebook {
        /* padding-left: 10px!important; */
    }
    .signup-part {
        margin-top: 20px;
    }
    .signup-part a {
        font-size: 12px;
    }
}

@media (min-width: 1024px) and (max-width: 1250px) {
    .idol-registration .form-block {
        padding: 40px 10px!important;
    }
    .idol-registration .title-part {
        margin: 30px 0px 30px;
    }
    .google-btn, .facebook-btn {
        font-size: 18px;
    }
    .idol-registration .title {
        font-size: 36px;
    }
    .idol-registration .sub-title {
        font-size: 20px;
    }
}
@media (min-width: 1250px) and (max-width: 1500px) {
    .google-btn, .facebook-btn {
        font-size: 18px;
        padding-left: 2px;
        padding-right: 2px;
    }
}

</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0 idol-registration">
        <div class="row m-0 fans desktop">
            <div class="col-12 col-sm-8 col-md-8 image-block">
                <div class="top">
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}"></a>
                </div>
                <div class="image-title">
                    <h1 class="text-main-color mb-4">Reach<br>your idols</h1>
                    <h4 class="text-main-color">Get personalized fan service videos & interactions <br>with your favourite Korean Wave influencers & idols. <br>Spice up any occasion with you or your friends!</h4>
                </div>
            </div>
            <div class="col-12 col-sm-4 col-md-4 form-block">
                <div class="title-part text-center">
                    <h2 class="text-white title">Sign Up!</h2>
                    <h4 class="text-grey sub-title">Create special memories & experiences with your idol now</h4>
                </div>
                <div class="register-part">
                    <form class="custom-form" action="{{ route('fans-confirm-email') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="row m-0">
                            <div class="col-12 col-sm-12 col-md-7">
                                <div class="inputWithIcon">
                                    <label class="input-label">Full Name</label>
                                    <input type="text" name="name" placeholder="Full name" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-5">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your Date Birth</label>
                                    <input type="text" name="birth" placeholder="24 March 2021" class="custom-input" id="datepicker" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/calendar.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Username</label>
                                    <input type="text" name="user_name" placeholder="username" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block pl-3 mb-4 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Password</label>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/password.png') }}">
                                    <input type="password" name="password" placeholder="Password" class="custom-input" required>
                                    <img class="input-icon eye-hide" src="{{ asset('assets/images/icons/hide.png') }}" style="right: 0;left:unset">
                                    <img class="input-icon eye-show d-none" src="{{ asset('assets/images/icons/show.png') }}" style="right: 0;left:unset">
                                </div>
                            </div>
                            <div class="col-12">
                                <label class="custom-control black-checkbox">
                                    <input type="checkbox" name="remember_token" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Remember me</span>
                                </label>
                            </div>
                            <input type="hidden" name="role" value="2">
                            <div class="col-12 mt-4 mb-5">
                                <button class="btn custom-btn w-100">Register</button>
                            </div>
                            <div class="divider mb-5" style="width:100%;height:1px;background:#898989;">
                                <!-- <div class="divider-text">OR</div> -->
                            </div>
                            <div class="col-12 mb-3">
                                <button class="btn custom-btn w-100 google-btn d-flex" type="button">
                                    <div class="ml-5 my-auto">
                                        <!-- <img src="{{ asset('assets/images/icons/google.png') }}"> -->
                                        <i class="fa fa-google fa-fw text-white"></i>
                                    </div>
                                    <div class="m-auto">
                                        <a class="text-white" href="{{ route('redirect-google').'?role=2' }}">Sign up with Google</a>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12">
                                <button class="btn custom-btn w-100 facebook-btn d-flex" type="button">
                                    <div class="ml-5 my-auto">
                                        <!-- <img src="{{ asset('assets/images/icons/face.png') }}" style="margin-top: -5px;"> -->
                                        <i class="fa fa-facebook fa-fw" style="color:#20335f;background: white;padding-top: 3px;margin-top: 4px;"></i>
                                    </div>
                                    <div class="m-auto">
                                        <a class="text-white" href="{{ route('redirect-facebook').'?role=2' }}">Sign up with Facebook</a>
                                    </div>
                                </button>
                            </div>
                            <div class="col-12 text-center" style="margin-top: 50px">
                                <a class="text-white">Have an account?</a>
                                <a class="text-main-color" href="{{ route('fans-signin') }}">Login</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="mobile">
            <div class="row m-0 fans image-block w-100">
                <div class="form-block">
                    <div class="title-part">
                        <h2 class="text-white title">Sign Up!</h2>
                        <h4 class="text-grey sub-title">Create special memories & experiences with your idol now</h4>
                    </div>
                    <div class="register-part">
                        <form class="custom-form" action="{{ route('fans-confirm-email') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="row m-0">
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="inputWithIcon">
                                        <label class="input-label">Full Name</label>
                                        <input type="text" name="name" placeholder="Full Name" class="custom-input" required>
                                        <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="inputWithIcon">
                                        <label class="input-label">Your Date Birth</label>
                                        <input type="text" name="birth" placeholder="24 March 2021" class="custom-input" id="datepicker1" required>
                                        <img class="input-icon" src="{{ asset('assets/images/icons/calendar.png') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="inputWithIcon">
                                        <label class="input-label">User Name</label>
                                        <input type="text" name="user_name" placeholder="username" class="custom-input" required>
                                        <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="inputWithIcon">
                                        <label class="input-label">Email</label>
                                        <input type="email" name="email" placeholder="Email" class="custom-input" required>
                                        <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                    </div>
                                    @if ($errors->has('email'))
                                        <span class="help-block pl-3 mb-4 d-block" style="color:#d61919">
                                            <p class="mb-0">{{ $errors->first('email') }}</p>
                                        </span>
                                    @endif
                                </div>
                                <div class="col-12 col-sm-12 col-md-12 p-0">
                                    <div class="inputWithIcon">
                                        <label class="input-label">Password</label>
                                        <img class="input-icon" src="{{ asset('assets/images/icons/password.png') }}">
                                        <input type="password" name="password" placeholder="Password" class="custom-input" required>
                                        <img class="input-icon eye-hide" src="{{ asset('assets/images/icons/hide.png') }}" style="right: 0;left:unset">
                                        <img class="input-icon eye-show d-none" src="{{ asset('assets/images/icons/show.png') }}" style="right: 0;left:unset">
                                    </div>
                                </div>
                                <div class="col-6 p-0">
                                    <label class="custom-control black-checkbox">
                                        <input type="checkbox" name="remember_token" class="fill-control-input d-none">
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">Remember me</span>
                                    </label>
                                </div>
                                <div class="col-6 text-right p-0">
                                    <a href="{{ route('fans-forgot-password') }}" class="text-white forgot">Forgot password?</a>
                                </div>
                                <input type="hidden" name="role" value="2">
                                <div class="col-12 mt-4 mb-5 p-0 login-part">
                                    <button class="btn custom-btn w-100">Register</button>
                                </div>
                                <div class="divider mb-5" style="width:100%;height:1px;background:#898989;">
                                    <!-- <div class="divider-text">OR</div> -->
                                </div>
                                <div class="col-12 p-0 google mb-3">
                                    <button class="btn custom-btn w-100 google-btn d-flex" type="button">
                                        <div class="m-auto" style="margin-right: 0px!important">
                                            <!-- <img src="{{ asset('assets/images/icons/google.png') }}"> -->
                                            <i class="fa fa-google fa-fw text-white"></i>
                                        </div>
                                        <div class="m-auto">
                                            <a class="text-white" href="{{ route('redirect-google').'?role=2' }}">Sign in with Google</a>
                                        </div>
                                    </button>
                                </div> 
                                <div class="col-12 p-0 facebook">
                                    <button class="btn custom-btn w-100 facebook-btn d-flex" type="button">
                                        <div class="m-auto" style="margin-right: 0px!important">
                                            <!-- <img src="{{ asset('assets/images/icons/face.png') }}" style="margin-top: -5px;"> -->
                                            <i class="fa fa-facebook fa-fw" style="color:#20335f;background: white;padding-top: 3px;margin-top: 4px;"></i>
                                        </div>
                                        <div class="m-auto">
                                            <a class="text-white" href="{{ route('redirect-facebook').'?role=2' }}">Sign in with Facebook</a>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-12 text-center signup-part">
                                    <a class="text-white">Have an account?</a>
                                    <a class="text-main-color" href="{{ route('fans-signin') }}">Login</a>
                                </div>
                            </div>
                        </form>
                    </div>
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
        $('#datepicker, #datepicker1').datepicker({
            format: 'dd/mm/yyyy'
        });
        $('.eye-hide').on('click', function() {
            $('input[name=password]').prop('type','text');
            $(this).addClass('d-none');
            $('.eye-show').removeClass('d-none');
        });
        $('.eye-show').on('click', function() {
            $('input[name=password]').prop('type','password');
            $(this).addClass('d-none');
            $('.eye-hide').removeClass('d-none');
        });
    })
</script>
@endsection
