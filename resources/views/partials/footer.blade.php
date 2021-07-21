<div class="footer">
    <div class="container-fluid m-0" style="height: 100%!important;padding: 0 15px;">
        <div class="row footer-subscribe-part m-0">
            <div class="col-12 col-sm-4 col-md-4 my-auto">
                <h5 class="text-white">Join our mailing list</h5>
                <p style="color:#898989">Be the first to know about the newest<br>stars & talents coming on MillionK</p>
            </div>
            <div class="col-12 col-sm-8 col-md-8" style="text-align: -webkit-right;">
                <form class="custom-form d-flex my-auto footer-subscribe" id="request_invite" method="POST">
                    {{ csrf_field() }}
                    <div class="inputWithIcon" style="width: 73%">
                        <input type="text" placeholder="Email" class="footer-subscribe-input custom-input">
                        <img style="top: 16px" class="input-icon footer-subscribe-icon" src="{{ asset('assets/images/icons/a.png') }}">
                    </div>
                    <button class="btn custom-btn m-auto footer-subscribe-btn" style="margin-right: 0px!important;width: 25%;font-size:18px" type="submit">Subscribe</button>
                </form>
            </div>
        </div>
        <div class="row desktop" style="padding: 10px 30px;background:#171717;position:relative">
            <div class="d-flex" style="margin: 10px 0px">
                <img src="{{ asset('assets/images/top-left-img.png') }}" style="height: 46px;margin: 0px 10px;">
                <div class="footer-text">
                    <a href="{{ route('faq') }}"><p class="text-main-color mb-0">FAQ</p></a>
                </div>
                <div class="footer-text">
                    <a href="{{ route('request-idol') }}"><p class="text-main-color mb-0">Request An Idol</p></a>
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
            <div class="d-flex" style="margin: 10px 0px;right: 35px;position:absolute">
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
                <div class="my-auto" style="position: absolute;right:15px">
                    <!-- <a href="{{ route('privacy') }}" target="_blank" class="text-main-color mr-5">Privacy policy</a>
                    <a href="{{ route('terms') }}" target="_blank" class="text-main-color">Terms of service</a> -->
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
                        <a href="https://www.facebook.com"><img src="{{ asset('assets/images/icons/facebook.png') }}" style="height: 18px"></a>
                    </div>
                    <div class="footer-social">
                        <a href="https://www.instagram.com"><img src="{{ asset('assets/images/icons/instagram.png') }}" style="height: 18px"></a>
                    </div>
                    <div class="footer-social" style="margin-right: 10px;">
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
                        <a href="{{ route('request-idol') }}" class="text-main-color mb-0">Request An Idol</a>
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
                <div class="col-12 text-center" style="padding: 10px 15px;">
                    <p class="mb-0" style="color:#898989;font-size: 15px;line-height: 22px;">Copyright © 2021 Lumiworks.pte.Ltd<br>All rights reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>