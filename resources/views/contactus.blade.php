@extends('layouts.front')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.block-3 {
    background: #171717;
    padding-bottom: 50px;
    padding-top: 50px;
}
.block-3-text {
    margin-bottom: 40px;
}
.block-title {
    font-size: 40px;
    letter-spacing: 6px;
    margin-bottom: 20px;
}
.horizontal-red-bar {
    width: 100px;
    height: 3px;
    background-color: #FF335C;
    margin: auto;
    margin-bottom: 20px;
}
.text-color {
    color: #fcfcfc!important;
}
.font-16 {
    font-size: 16px;
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
.logo {
    padding: 45px 45px 0px;
}

@media screen and (max-width:768px) {
    .footer-subscribe {
        width: 400px!important;
    }
}

@media screen and (max-width:475px) {
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
        font-size: 30px!important;
        letter-spacing: 4px;
        margin-bottom: 0px;
    }
    .horizontal-red-bar {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    p, h5 {
        font-size: 14px!important;
    }
    a {
        font-size: 14px;
    }
    .logo img {
        width: 50px;
    }
    .logo {
        padding: 18px 18px 0px;
    }
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0" style="background-color: #171717;">
        <div class="block-1">  
            <div class="logo">
                <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}"></a>
            </div>
        </div>  
        <div class="block-3">
            <div class="text-center block-3-text">
                <h1 class="text-white block-title">Contact Us</h1>
                <div class="horizontal-red-bar"></div>
                <h3 class="text-white block-sub-title">We would love to hear from you!</h3>
                @if(Session::get('success'))
                <h2 class="text-white block-sub-title">{{ Session::get('success') }}</h2>
                @endif
            </div>
            <div class="container mb-5">
                <form class="custom-form" action="{{ route('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row m-0">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">Email</label>
                                <input type="email" name="email" placeholder="Email" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}" style="top: 31px;">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block pl-3 mb-2 d-block" style="color:#d61919;margin-top: -10px;">
                                    <p class="mb-0">{{ $errors->first('email') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">What is your question?</label>
                                <textarea class="custom-textarea" name="question" style="height:120px!important" placeholder="Let us know about you..." required></textarea>
                            </div>
                            <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 14px">You can input maximum 200 characters!</p>
                            <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>200</span></p>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn custom-btn w-100 register-btn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
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
                    <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}" style="height: 46px;margin: 0px 10px;"></a>
                    <div class="footer-text">
                        <a href="{{ route('faq') }}"><p class="text-main-color mb-0">FAQ</p></a>
                    </div>
                    <div class="footer-text">
                        <a href="{{ route('faq') }}"><p class="text-main-color mb-0">Request An Idol</p></a>
                    </div>
                    <div class="footer-text">
                        <a href="{{ route('idol-registration') }}"><p class="text-main-color mb-0">Apply As An Idol</p></a>
                    </div>
                    <div class="footer-text">
                        <a href="{{ route('contact-us') }}"><p class="text-main-color mb-0">Contact Us</p></a>
                    </div>
                    <div class="footer-text">
                        <a href="{{ route('privacy') }}"><p class="text-main-color mb-0">Privacy Policy</p></a>
                    </div>
                    <div class="footer-text">
                        <a href="{{ route('terms') }}"><p class="text-main-color mb-0">Terms of Service</p></a>
                    </div>
                </div>
                <div class="col-sm-4 col-md-4 d-flex" style="justify-content: flex-end;margin: 10px 0px">
                    <div class="footer-social">
                        <a href="https://www.facebook.com"><img src="{{ asset('assets/images/icons/facebook.png') }}" style="height: 18px"></a>
                    </div>
                    <div class="footer-social">
                        <a href="https://www.instagram.com"><img src="{{ asset('assets/images/icons/instagram.png') }}" style="height: 18px"></a>
                    </div>
                    <div class="footer-social">
                        <a href="mailto:hello@millionk.com"><img src="{{ asset('assets/images/icons/gmail.png') }}" style="height: 18px"></a>
                    </div>
                </div>
                <div class="col-12">
                    <div style="height: 1px;background: #898989;width:100%"></div>
                </div>
                <div class="col-12 d-flex" style="margin: 20px 0px 10px;">
                    <div class="my-auto">
                        <p class="mb-0" style="color:#898989">Copyright © 2021 Lumiworks.pte.Ltd.All rights reserved.</p>
                    </div>
                    <!-- <div class="my-auto" style="position: absolute;right:15px">
                        <a href="{{ route('privacy') }}" target="_blank" class="text-main-color mr-5">Privacy policy</a>
                        <a href="{{ route('terms') }}" target="_blank" class="text-main-color">Terms of service</a>
                    </div> -->
                </div>
            </div>
            <div class="mobile">
                <div class="row" style="background:#171717">
                    <div class="col-6 d-flex" style="margin: 10px 0px">
                        <a href="{{ route('index') }}"><img src="{{ asset('assets/images/top-left-img.png') }}" style="height: 46px;margin: 0px 10px;"></a>
                    </div>
                    <div class="col-6 d-flex" style="margin: 10px 0px;justify-content: flex-end;">
                        <div class="footer-social">
                            <a href="https://www.facebook.com"><img src="{{ asset('assets/images/icons/facebook.png') }}" style="height: 18px"></a>
                        </div>
                        <div class="footer-social">
                            <a href="https://www.instagram.com"><img src="{{ asset('assets/images/icons/instagram.png') }}" style="height: 18px"></a>
                        </div>
                        <div class="footer-social">
                            <a href="mailto:hello@millionk.com"><img src="{{ asset('assets/images/icons/gmail.png') }}" style="height: 18px"></a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a href="{{ route('faq') }}" class="text-main-color mb-0">FAQ</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0">Request An Idol</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0" href="{{ route('idol-registration') }}">Apply As An Idol</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a class="text-main-color mb-0" href="{{ route('contact-us') }}">Contact Us</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a href="{{ route('privacy') }}" class="text-main-color mb-0">Privacy Policy</a>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="footer-text">
                            <a href="{{ route('terms') }}" class="text-main-color mb-0">Terms of Service</a>
                        </div>
                    </div>
                    <div class="col-12 text-center" style="padding: 0px 15px;border-top: 1px solid #2b2b2b;">
                        <!-- <a href="{{ route('privacy') }}" target="_blank" class="text-main-color">Privacy policy</a> -->
                    </div>
                    <!-- <div class="col-12 text-center" style="padding: 10px 15px">
                        <a href="{{ route('terms') }}" target="_blank" class="text-main-color">Terms of service</a>
                    </div> -->
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

<script>

</script>
@endsection