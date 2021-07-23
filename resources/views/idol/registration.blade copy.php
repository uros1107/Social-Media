@extends('layouts.front')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
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
.custom-textarea {
    height:120px!important;
    background: white;
    color:#000;
}
.line {
    width: 30px;
    height: 3px;
    background: #ff335c;
    margin: auto;
}
.deactive {
    background: #171717;
}
.ui.fluid.dropdown {
    padding: 11px;
    border-radius: 10px;
    min-height: 50px;
    background: #fcfcfc;
    border: 1px solid #b7b7b7;
}
.ui.selection.active.dropdown:hover {
    border-color: #b7b7b7;
}
.ui.selection.dropdown>.delete.icon, .ui.selection.dropdown>.dropdown.icon, .ui.selection.dropdown>.search.icon  {
    top: 18px;
}
.input-icon {
    top: 31px;
}
.help-block {
    margin-top: -12px;
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0 idol-registration">
        <div class="row m-0">
            <div class="col-12 col-sm-4 col-md-4 form-block">
                <div class="title-part text-center">
                    <h2 class="text-white title">Idol Registration</h2>
                    <h4 class="text-grey sub-title">Start meeting your fans</h4>
                </div>
                <div class="register-part">
                    <form class="custom-form" action="{{ route('idol-register') }}" method="POST">
                        {{ csrf_field() }}
                        <!-- <div class="stepwizard col-md-offset-3 mb-3">
                            <div class="stepwizard-row setup-panel">
                                <div class="stepwizard-step">
                                    <a href="#step-1" class="btn btn-circle mr-1 step-1-circle">1</a>
                                    <span class="text-white step-1-text">Account Info</span>
                                </div>
                                <div class="stepwizard-step" style="top: -2px">
                                    <div class="line"></div>
                                </div>
                                <div class="stepwizard-step">
                                    <a href="#step-2" class="btn btn-circle mr-1 deactive step-2-circle" disabled="disabled">2</a>
                                    <span class="text-grey step-2-text">Your Identify</span>
                                </div>
                            </div>
                        </div> -->
                        <div class="row m-0 step-1">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your Name</label>
                                    <input type="text" name="name" placeholder="Your name" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                                </div>
                                @if ($errors->has('name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Korean Name(Optional)</label>
                                    <input type="text" name="k_name" placeholder="Korean name" class="custom-input">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                                </div>
                                @if ($errors->has('k_name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('k_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Email</label>
                                    <input type="email" name="email" placeholder="Email" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                </div>
                                @if ($errors->has('email'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Phone Number(Never Shared)</label>
                                    <input type="text" name="phone" placeholder="Phone number" class="custom-input">
                                    <img class="input-icon" src="{{ asset('assets/images/icons/phone.png') }}">
                                </div>
                                @if ($errors->has('phone'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('phone') }}</p>
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
                                @if ($errors->has('password'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0">{{ $errors->first('password') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Confirm Password</label>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/password.png') }}">
                                    <input type="password" name="password_confirmation" placeholder="Password" class="custom-input" required>
                                    <img class="input-icon eye-hide1" src="{{ asset('assets/images/icons/hide.png') }}" style="right: 0;left:unset">
                                    <img class="input-icon eye-show1 d-none" src="{{ asset('assets/images/icons/show.png') }}" style="right: 0;left:unset">
                                </div>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn custom-btn w-100 submit" type="submit">Submit</button>
                            </div>
                            <p class="text-grey mb-0 text-center" style="margin-top: 30px">Note: You are not automatically enrolled on MillionK. If you meet the eligibility requirements, a talent representative will contact you within a few days to finish onboarding.</p>
                            <div class="col-12 text-center signup-part mt-4 mb-3">
                                <a class="text-white">Have an account?</a>
                                <a class="text-main-color" href="{{ route('idol-signin') }}">Log In</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 desktop p-0">
                <div class="image-block w-100">
                    <div class="top">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}"></a>
                    </div>
                    <div class="image-title">
                        <h1 class="text-main-color mb-4 text-uppercase">Let's meet<br>your fans</h1>
                        <h4 class="text-main-color" style="max-width: 450px;">MillionK is the definitive Hallyu platform to start and foster a lasting relationship with your fans. Create personalized videos for your fans worldwide and make their dreams come true.</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>

<script>
    $(document).ready(function() {
        $('.label.ui.dropdown').dropdown();

        $('#next').on('click', function() {
            $('.step-1').addClass('d-none');
            $('.step-2').removeClass('d-none');
            $('.title').addClass('d-none');

            $('.step-1-text').removeClass('text-white');
            $('.step-1-text').addClass('text-grey');
            $('.step-2-circle').removeClass('deactive');
            $('.step-2-text').removeClass('text-grey');
            $('.step-2-text').addClass('text-white');
        })
        $('#back').on('click', function() {
            $('.step-1').removeClass('d-none');
            $('.step-2').addClass('d-none');
            $('.title').removeClass('d-none');

            $('.step-2-circle').addClass('deactive');
            $('.step-2-text').removeClass('text-white');
            $('.step-2-text').addClass('text-grey');
            $('.step-1-text').removeClass('text-grey');
            $('.step-1-text').addClass('text-white');
        })

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

        $('.eye-hide1').on('click', function() {
            $('input[name=password_confirmation]').prop('type','text');
            $(this).addClass('d-none');
            $('.eye-show1').removeClass('d-none');
        });
        $('.eye-show1').on('click', function() {
            $('input[name=password_confirmation]').prop('type','password');
            $(this).addClass('d-none');
            $('.eye-hide1').removeClass('d-none');
        });

        // $('.submit').on('click', function() {
        //     if($('.ui.fluid.dropdown').children('a').length > 5) {
        //         toastr.error('You can select maximum 5 categories!');
        //     } else {
        //         $('.custom-form').submit();
        //     }
        // });
    })
</script>
@endsection
