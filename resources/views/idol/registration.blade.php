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
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0 idol-registration">
        <div class="row m-0">
            <div class="col-12 col-sm-4 col-md-4 form-block">
                <div class="title-part text-center">
                    <h2 class="text-white title">Idols Registration</h2>
                    <h4 class="text-grey sub-title">Start to meet your fans</h4>
                </div>
                <div class="register-part">
                    <form class="custom-form" action="{{ route('idol-register') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="stepwizard col-md-offset-3 mb-3">
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
                        </div>
                        <div class="row m-0 step-1">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your Name</label>
                                    <input type="text" name="name" placeholder="Your name" class="custom-input" required>
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
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
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
                            <div class="col-12 mt-4 mb-4">
                                <button class="btn custom-btn w-100" type="button" id="next">Next</button>
                            </div>
                            <p class="text-grey mb-0 text-center" style="margin-top: 30px">Note: you are not automatically enrolled on MillionK. If you meet the eligibility requirements, a talent representative will contact you within a few days to finish onboarding.</p>
                            <div class="col-12 text-center signup-part mt-4 mb-3">
                                <a class="text-white">Have an account?</a>
                                <a class="text-main-color" href="{{ route('idol-signin') }}">Log In</a>
                            </div>
                        </div>

                        <div class="row m-0 step-2 d-none">
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Where can we find you?</label>
                                    <input type="text" name="where_find" placeholder="Twitter" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/twitter.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Social Media handle/Username</label>
                                    <input type="text" placeholder="User name" class="custom-input" required>
                                    <img style="top:39px" class="input-icon" src="{{ asset('assets/images/icons/a.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Your handle/Username</label>
                                    <input type="text" name="handle_name" placeholder="User name" class="custom-input" required>
                                    <img style="top:39px" class="input-icon" src="{{ asset('assets/images/icons/a.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">How many followers do you have?</label>
                                    <input type="text" name="followers" placeholder="20" class="custom-input" required>
                                    <img class="input-icon" src="{{ asset('assets/images/icons/user3.png') }}">
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <label class="text-white" style="margin-left: 16px">Category</label>
                                    <select class="form-control" name="cat_id" style="height: 50px;border-radius: 15px">
                                        @foreach(DB::table('categories')->get() as $cat)
                                        <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="inputWithIcon">
                                    <label class="input-label">Anything else we should know about you?</label>
                                    <textarea class="custom-textarea" name="info" placeholder="Let us know about you..." required></textarea>
                                </div>
                                @if ($errors->has('info'))
                                    <span class="help-block pl-3 d-block" style="color:#d61919;margin-top: -15px">
                                        <p class="mb-0 text-right">{{ $errors->first('info') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn custom-btn w-100" type="submit">Submit</button>
                            </div>
                            <div class="col-12 mt-3">
                                <button class="btn custom-btn w-100" type="button" style="background:#2b2b2b" id="back">Back</button>
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
                        <h1 class="text-main-color mb-4 text-uppercase">Lets meet<br>your fans</h1>
                        <h4 class="text-main-color">Lorem Ipsum is simply dummy text of the printing and<br> typesetting industry. Lorem Ipsum has been the industry's<br> standard dummy text ever since the 1500s, when an<br> unknown printer took a galley of type and scrambled it to<br> make a type specimen book.</h4>
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
    })
</script>
@endsection
