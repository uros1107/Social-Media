@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.block-1 {
    height: 100vh;
}
.block-2 {
    background: #121212;
    padding-top: 80px;
    padding-bottom: 80px;
}
.block-3 {
    background: #171717;
    padding-bottom: 70px;
    padding-top: 70px;
}
.bg-img {
    height: 100vh;
    object-fit: cover;
    position: absolute;
    z-index: -1;
}
.hand-img {
    position: absolute;
    top: 35px;
    right: 0px;
}
.gradient {
    margin-top: -126px;
    height: 160px;
    width: 100%;
    z-index: 999;
    background: linear-gradient(180deg, rgb(19 19 19 / 6%) 30%, rgb(18 18 18) 70%);
}
.welcome-millionk {
    margin-top: 300px;
    margin-left: 70px;
}
.block-3-text {
    margin-bottom: 60px;
}
.block-title {
    font-size: 40px;
    letter-spacing: 6px;
    margin-bottom: 50px;
}
.horizontal-red-bar {
    width: 100px;
    height: 3px;
    background-color: #FF335C;
    margin: auto;
    margin-bottom: 40px;
}
.text-color {
    color: #fcfcfc!important;
}
.font-16 {
    font-size: 16px;
}
.create-showcase > p {
    max-width: 210px;
    margin: auto;
}
.item-title {
    margin: 30px 0px 20px;
    font-size: 18px;
}
.footer-text {
    padding: 10px;
    margin-left: 15px;
}
.footer-social {
    padding: 10px;
}
.footer-subscribe {
    width: 600px;
}
.footer-subscribe-part {
    background: #121212;
    padding: 10px 30px 0px;
}
.apply-btn {
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0.1em;
    width: 178px;
    border-radius: 10px!important;
    height: 45px;
}
.apply-btn:hover, .apply-btn:before {
    font-size: 14px;
    line-height: 16px;
    letter-spacing: 0.1em;
    width: 178px;
    border-radius: 10px!important;
}

@media screen and (max-width:768px) {
    .footer-subscribe {
        width: 400px!important;
    }
    .welcome-millionk {
        margin-left: 0px!important;
    }
    .m-main-text {
        /* font-size: 46px!important; */
        letter-spacing: 4px;
        margin-bottom: 26px;
        margin-top: 24px;
        font-weight: 500;
    }
}

@media screen and (max-width:475px) {
    .block-2 {
        background: #121212;
        padding-top: 60px;
        padding-bottom: 30px;
    }
    .footer-subscribe {
        width: 100%!important;
    }
    .footer-subscribe-part {
        padding: 10px 0px 0px!important;
    }
    .footer-subscribe-input {
        height: 36px!important;
        font-size: 12px!important;
    }
    .footer-subscribe-btn {
        height: 36px!important;
        font-size: 12px!important;
    }
    .footer-subscribe-icon {
        top: 9px!important;
    }
    .footer-text {
        margin-left: 0px!important;
    }
    .block-3-text {
        margin-bottom: 30px;
    }
    .block-title {
        font-size: 18px!important;
        letter-spacing: 4px;
        margin-bottom: 30px;
    }
    .horizontal-red-bar {
        margin-bottom: 30px;
        margin-top: 20px;
    }
    .item-title {
        font-size: 16px;
    }
    p, h5 {
        font-size: 14px!important;
    }
    .create-showcase {
        margin-bottom: 35px;
    }
    .create-showcase > p {
        max-width: 100%;
        margin: auto;
    }
    a {
        font-size: 14px;
    }
    .welcome-millionk {
        margin-top: 200px;
        margin-left: 0px;
    }
    .m-comming {
        font-size: 10px;
    }
    .m-comming:before {
        content: "this this"
    }
    .m-main-text {
        font-size: 20px!important;
    }
    .m-description {
        font-size: 12px;
        max-width: 240px;
        margin: auto;
    }
    .apply-btn {
        font-size: 10px;
        height: 30px!important;
        width: 120px!important;
    }
    .custom-form .col-12 {
        padding: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="content">
    <div>
        <img class="bg-img w-100" src="{{ asset('assets/images/bg.png') }}">
    </div>
    <div class="container-fluid p-0" style="height: 100%!important;background-color: rgb(0 0 0 / 70%);">
        <div class="block-1">  
            <div class="top desktop">
                <img src="{{ asset('assets/images/top-left-img.png') }}">
            </div>
            <div class="row desktop m-0">
                <div class="col-12 d-flex pr-0">
                    <div class="welcome-millionk">
                        <div class="">
                            <span class="comming text-white">Welcome to Millionk</span>
                        </div>
                        <h1 class="text-white main-text">MEET THE WORLD'S FIRST<br> HALLYU CELEBRITY PLATFORM</h1>
                        <h3 class="description">Create & Earn by Fulfilling personalized<br> videos from your fans worldwide.</h3>
                        <div class="input-group mb-3 mt-5">
                            <button class="btn custom-btn apply-btn" type="submit">APPLY NOW</button>
                        </div>
                    </div>
                    <div class="middle-hand">
                        <img src="{{ asset('assets/images/hand.png') }}" class="hand-img">
                    </div>
                </div>
            </div>
            <div class="row mobile m-0">
                <div class="col-12 d-flex">
                    <div class="welcome-millionk text-center">
                        <div class="">
                            <span class="comming text-white m-comming">Welcome to Millionk</span>
                        </div>
                        <h3 class="text-white m-main-text">MEET THE WORLD'S FIRST HALLYU CELEBRITY PLATFORM</h3>
                        <h3 class="description m-description">Create & Earn by Fulfilling personalized videos from your fans worldwide.</h3>
                        <div class="input-group mb-3 mt-5" style="justify-content: center">
                            <button class="btn custom-btn apply-btn" type="submit">APPLY NOW</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>  
        <div class="gradient"></div>
        <div class="block-2 text-center">
            <h1 class="text-color block-title desktop">CONNECT WITH YOUR FRIENDS WORLDWIDE</h1>
            <div class="mobile" style="margin-bottom: 30px!important;max-width: 240px">
                <h3 class="text-color" style="font-size: 18px">CONNECT WITH YOUR FRIENDS WORLDWIDE</h3>
            </div>
            <div class="horizontal-red-bar"></div>
            <div class="container">
                <div class="row m-0">
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/create_showcase.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">Create Showcase</h4>
                        <p class="text-color font-16">Your own pricing for personalized videos for your fans</p>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/showcase.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">Showcase</h4>
                        <p class="text-color font-16">Choosen personalized videos you have given for your fans</p>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/next_gen.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">Next-Gen</h4>
                        <p class="text-color font-16">Take the next step in connecting with your fans through personalized videos</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-2 text-center" style="background: #2b2b2b">
            <h1 class="text-color block-title desktop">HOW DOES IT WORK?</h1>
            <h3 class="text-color mobile" style="margin-bottom: 30px!important;font-size: 18px">HOW DOES IT WORK?</h3>
            <div class="horizontal-red-bar"></div>
            <div class="container">
                <div class="row m-0">
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/icons/s_search.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">STEP 1</h4>
                        <p class="text-color font-16">Sign up on this page and set up your profile once you have been approved on the platform</p>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/icons/s_cart.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">STEP 2</h4>
                        <p class="text-color font-16">Fans wil be able to view your profile and request a video (e.g. for a birthday celebration, etc)</p>
                    </div>
                    <div class="col-12 col-sm-4 col-md-4 create-showcase">
                        <img src="{{ asset('assets/images/icons/s_wallet.png') }}" style="border-radius: 50%">
                        <h4 class="text-main-color text-uppercase item-title">STEP 3</h4>
                        <p class="text-color font-16">Once a request has been filled, 75% of the fee you set will be forwarded to you. You can choose to decline requests as well</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="block-3">
            <div class="text-center block-3-text">
                <h1 class="text-color block-title desktop">APPLY TO JOIN MILLIONK AS AN IDOL NOW</h1>
                <div class="mobile" style="margin-bottom: 30px!important;max-width: 240px">
                    <h3 class="text-color mobile" style="max-width: 220px;font-size: 18px">APPLY TO JOIN MILLIONK AS AN IDOL NOW</h3>
                </div>
                <div class="horizontal-red-bar"></div>
                <h5 class="text-color desktop" style="font-size: 24px;max-width: 55%;margin: auto">If you are part of the Korean Wave sweeping the globe, you can apply here and we will get in touch with you within 72hours.</h5>
                <h5 class="text-color mobile">If you are part of the Korean Wave sweeping the globe, you can apply here and we will get in touch with you within 72hours.</h5>
            </div>
            <div class="container">
                <form class="custom-form" action="{{ route('idol-register') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row m-0">
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">Your Name</label>
                                <input type="text" name="name" placeholder="Your name" class="custom-input" required>
                                <!-- <i class="fa fa-user fa-lg fa-fw" aria-hidden="true"></i> -->
                                <img class="input-icon" src="{{ asset('assets/images/icons/user.png') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">Phone Number(Never Shared)</label>
                                <input type="text" name="phone" placeholder="Phone number" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/phone.png') }}">
                            </div>
                            @if ($errors->has('phone'))
                                <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                    <p class="mb-0">{{ $errors->first('phone') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">Email</label>
                                <input type="text" name="email" placeholder="Email" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                    <p class="mb-0">{{ $errors->first('email') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">Password</label>
                                <input type="password" name="password" placeholder="Password" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/password.png') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">Where can we find you?</label>
                                <input type="text" name="where_find" placeholder="Twitter" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/twitter.png') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">Your handle/Username</label>
                                <input type="text" name="handle_name" placeholder="User name" class="custom-input" required>
                                <img style="top:39px" class="input-icon" src="{{ asset('assets/images/icons/a.png') }}">
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-md-6">
                            <div class="inputWithIcon">
                                <label class="input-label">How many followers do you have?</label>
                                <input type="text" name="followers" placeholder="20" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/user3.png') }}">
                            </div>
                            @if ($errors->has('followers'))
                                <span class="help-block pl-3 mb-4 d-block" style="color:#d61919">
                                    <p class="mb-0">{{ $errors->first('followers') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">Anything else we should know about you?</label>
                                <textarea class="custom-textarea" name="info" style="height:120px!important" placeholder="Let us know about you..." required></textarea>
                            </div>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn custom-btn w-100" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
        <!-- mobile -->
        <div class="m-top mobile">
            <div class="top-bar">
                <img class="logo-img" src="{{ asset('assets/images/top-left-img.png') }}">
                <div class="right-side-icons">
                    <i class="fa fa-search" style="color: #FF335C"></i>
                    <i class="fa fa-bell-o text-white"></i>
                    <i class="fa fa-navicon text-white"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="footer">
        <div class="container-fluid m-0" style="height: 100%!important">
            <div class="row footer-subscribe-part">
                <div class="col-12 col-sm-4 col-md-4 my-auto">
                    <h5 class="text-color">Join our mailing list</h5>
                    <p style="color:#898989">Be the first to know about the newest<br>stars & talents coming on MillionK</p>
                </div>
                <div class="col-12 col-sm-8 col-md-8" style="text-align: -webkit-right;">
                    <form class="custom-form d-flex my-auto footer-subscribe">
                        <div class="inputWithIcon" style="width: 73%">
                            <input type="text" placeholder="Email" class="footer-subscribe-input custom-input">
                            <img style="top: 16px" class="input-icon footer-subscribe-icon" src="{{ asset('assets/images/icons/a.png') }}">
                        </div>
                        <button class="btn custom-btn m-auto footer-subscribe-btn" style="margin-right: 0px!important;width: 25%" type="submit">Subscribe</button>
                    </form>
                </div>
            </div>
            <div class="row desktop" style="padding: 10px 30px;background:#171717">
                <div class="col-sm-8 col-md-8 d-flex" style="margin: 10px 0px">
                    <img src="{{ asset('assets/images/top-left-img.png') }}" style="height: 46px;margin: 0px 10px;">
                    <div class="footer-text">
                        <p class="text-main-color mb-0">About</p>
                    </div>
                    <div class="footer-text">
                        <p class="text-main-color mb-0">Request an Idol</p>
                    </div>
                    <div class="footer-text">
                        <p class="text-main-color mb-0">FAQ</p>
                    </div>
                    <div class="footer-text">
                        <p class="text-main-color mb-0">Help</p>
                    </div>
                    <div class="footer-text">
                        <p class="text-main-color mb-0">Contact Us</p>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 d-flex" style="justify-content: flex-end;margin: 10px 0px">
                    <div class="footer-social">
                        <img src="{{ asset('assets/images/icons/facebook.png') }}" style="height: 18px">
                    </div>
                    <div class="footer-social">
                        <img src="{{ asset('assets/images/icons/instagram.png') }}" style="height: 18px">
                    </div>
                    <div class="footer-social">
                        <img src="{{ asset('assets/images/icons/gmail.png') }}" style="height: 18px">
                    </div>
                </div>
                <div class="col-12">
                    <div style="height: 1px;background: #898989;width:100%"></div>
                </div>
                <div class="col-12 d-flex" style="margin: 20px 0px 10px;">
                    <div class="my-auto">
                        <p class="mb-0" style="color:#898989">Copyright © 2021 Lumiworks.pte.Ltd.All rights reserved.</p>
                    </div>
                    <div class="my-auto" style="position: absolute;right:15px">
                        <a href="#" class="text-main-color mr-5">Privacy policy</a>
                        <a href="#" class="text-main-color">Tearms of service</a>
                    </div>
                </div>
            </div>
            <div class="mobile">
                <div class="row" style="background:#171717">
                    <div class="col-6 d-flex" style="margin: 10px 0px">
                        <img src="{{ asset('assets/images/top-left-img.png') }}" style="height: 46px;margin: 0px 10px;">
                    </div>
                    <div class="col-6 d-flex" style="margin: 10px 0px;justify-content: flex-end;">
                        <div class="footer-social">
                            <img src="{{ asset('assets/images/icons/facebook.png') }}" style="height: 18px">
                        </div>
                        <div class="footer-social">
                            <img src="{{ asset('assets/images/icons/instagram.png') }}" style="height: 18px">
                        </div>
                        <div class="footer-social">
                            <img src="{{ asset('assets/images/icons/gmail.png') }}" style="height: 18px">
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">About</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">Help</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">Request an Idol</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">FAQ</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                        </div>
                    </div>
                    <div class="col-12 text-center" style="padding: 10px 15px;border-top: 1px solid #2b2b2b;">
                        <a href="#" class="text-main-color">Privacy policy</a>
                    </div>
                    <div class="col-12 text-center" style="padding: 10px 15px">
                        <a href="#" class="text-main-color">Tearms of service</a>
                    </div>
                    <div class="col-12 text-center" style="padding: 10px 15px;margin-bottom:20px">
                        <p class="mb-0" style="color:#898989">Copyright © 2021 Lumiworks.pte.Ltd<br>All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
@endsection