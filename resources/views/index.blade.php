@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<link rel="stylesheet" href="{{ asset('assets/css/toastr.css') }}">
<link rel="stylesheet" href="{{ asset('assets/css/toastr1.css') }}">
<style>
.content {
    background: url("{{ asset('assets/images/bg.png') }}") no-repeat center center;
    background-size: cover;
    height: 100vh;
}
#request_invite, #m_request_invite {
    display:flex!important;
    width:100%;
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid" style="background-color: rgb(0 0 0 / 70%);">
        <!-- desktop -->
        <div class="top desktop">
            <img src="{{ asset('assets/images/top-left-img.png') }}">
        </div>
        <div class="middle desktop">
            <div class="middle-left">
                <div class="text-center">
                    <div>
                        <span class="comming text-white">coming soon</span>
                    </div>
                </div>
                <h1 class="text-white welcome-month">JULY</h1>
                <h3 class="text-white welcome-day">2021</h3>
            </div>
            <div class="middle-center">
                <div class="">
                    <div>
                        <span class="comming text-white">Welcome to Millionk</span>
                    </div>
                </div>
                <h1 class="text-white main-text">Be The First To Know<br> When MillionK Launches</h1>
                <h3 class="description">Sign up to reserve your spot. We'll let you know how to get up close and<br> personal with your favourite Korean Wave Idols & Influencers.</h3>
                <div class="input-group mb-3 mt-5">
                    <form id="request_invite">
                        {{ csrf_field() }}
                        <input type="text" class="form-control email-address" style="color:#dcdcdc!important" name="email" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit">REQUEST INVITE</button>
                        </div>
                    </form>
                </div>
                <p class="text-white mt-5 d-none success-msg">Open up your email and click the subscribe button to confirm your email address.</p>
                <p class="text-white mt-5 d-none repeat-msg">We have already subscribed to your email address.</p>
            </div>
            <div class="middle-right">
                <div class="social-icon">
                    <a href="https://www.facebook.com/MillionK.official"><i class="fa fa-facebook-f text-white" style="font-size:24px"></i></a>
                </div>
                <!-- <div class="social-icon">
                    <i class="fa fa-twitter text-white" style="font-size:24px"></i>
                </div> -->
                <div class="social-icon">
                    <a href="https://www.instagram.com/millionk.official/"><i class="fa fa-instagram text-white" style="font-size:24px"></i></a>
                </div>
                <!-- <div class="social-icon">
                    <i class="fa fa-youtube-play text-white" style="font-size:24px"></i>
                </div> -->
            </div>
        </div>
        <div class="bottom desktop">
            <div class="d-flex">
                <div>
                    <span style="color:#868686">Copyright © 2021 Lumiworks Pte. Ltd. All rights reserved.</span>
                </div>
                <div class="bottom-right-text">
                    <a href="{{ route('privacy') }}" target="_blank"><span class="bottom-text">Privacy Policy</span></a>
                    <a href="{{ route('terms') }}" target="_blank"><span class="bottom-text" style="margin-right: 40px">Terms Of Service</span></a>
                </div>
            </div>
        </div>

        <!-- mobile -->
        <div class="m-top mobile">
            <div class="top-bar">
                <img class="logo-img" src="{{ asset('assets/images/top-left-img.png') }}">
                <div class="right-side-icons d-none">
                    <i class="fa fa-search" style="color: #FF335C"></i>
                    <i class="fa fa-bell-o text-white"></i>
                    <i class="fa fa-navicon text-white"></i>
                </div>
            </div>
        </div>
        <div class="m-middle mobile">
            <div>
                <div class="comming-part text-center">
                    <p class="text-white m-comming">coming soon</p>
                    <h2 class="text-white m-month">JULY</h2>
                    <h2 class="text-white m-year">2021</h2>
                </div>
                <div class="welcome-part text-center">
                    <span class="text-white m-welcome">Wecome to millionk</span>
                    <h3 class="text-white m-main-title">Be The First To Know<br> When MillionK Launches</h3>
                    <p class="text-white m-description">Sign up to reserve your spot. We'll let you know how to get up close and personal with your favourite Korean Wave Idols & Influencers.</p>
                </div>
                <div class="input-group mb-5 mt-4 email-part">
                    <form style="justify-content: center;" id="m_request_invite">
                        {{ csrf_field() }}
                        <input type="text" class="form-control email-address m-email text-white" style="color:#dcdcdc!important" name="email" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2" required>
                        <div class="input-group-append">
                            <button class="btn btn-primary m-btn" type="submit" style="font-size:14px;">REQUEST INVITE</button>
                        </div>
                    </form>
                </div>
                <p class="text-white mt-4 d-none text-center success-msg">Open up your email and click the subscribe button to confirm your email address.</p>
                <p class="text-white mt-4 d-none text-center repeat-msg">We have already subscribed to your email address.</p>
                <div class="m-social text-center">
                    <a href="https://www.facebook.com/MillionK.official"><i class="fa fa-facebook-f text-white m-social-icon"></i></a>
                    <!-- <i class="fa fa-twitter text-white m-social-icon"></i> -->
                    <a href="https://www.instagram.com/millionk.official/"><i class="fa fa-instagram text-white m-social-icon"></i></a>
                    <!-- <i class="fa fa-youtube-play text-white m-social-icon"></i> -->
                </div>     
                <h4 class="text-center mt-3 copyright" style="color:#868686;font-size:14px">Copyright © 2021 Lumiworks Pte. Ltd.<br>All rights reserved.</h4>
                <div class="d-flex mt-3 mb-1 bottom-text">
                    <a href="{{ route('privacy') }}" target="_blank" class="m-auto"><p class="mx-auto mb-0" style="color:#FF335C">Privacy Policy</p></a>
                    <a href="{{ route('terms') }}" target="_blank"  class="m-auto"><p class="mx-auto mb-0" style="color:#FF335C">Terms Of Service</p></a>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script src="{{ asset('assets/js/toastr.min.js') }}"></script>
<script>
$(document).ready(function() {
    $('#request_invite, #m_request_invite').on('submit', function(e) {
        e.preventDefault();

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('send-mail') }}",
            type: "POST",
            data: $(this).serialize(),
            success: function(data) {
                if(data['success']) {
                    $('.input-group').addClass('d-none');
                    $('.success-msg').removeClass('d-none');
                } else {
                    $('.input-group').addClass('d-none');
                    $('.repeat-msg').removeClass('d-none');
                }
            },
            error: function() {
                toastr.error('Server error!');
            }
        })
    })
})
</script>
@endsection
