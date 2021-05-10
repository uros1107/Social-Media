@extends('layouts.front')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="container-fluid">
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
            <h1 class="text-white month">JULY</h1>
            <h3 class="text-white day">2021</h3>
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
                <input type="text" class="form-control email-address" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button">REQUEST INVITE</button>
                </div>
            </div>
        </div>
        <div class="middle-right">
            <div class="social-icon">
                <i class="fa fa-facebook-f text-white" style="font-size:24px"></i>
            </div>
            <div class="social-icon">
                <i class="fa fa-twitter text-white" style="font-size:24px"></i>
            </div>
            <div class="social-icon">
                <i class="fa fa-instagram text-white" style="font-size:24px"></i>
            </div>
            <div class="social-icon">
                <i class="fa fa-youtube-play text-white" style="font-size:24px"></i>
            </div>
        </div>
    </div>
    <div class="bottom desktop">
        <div class="d-flex">
            <div>
                <span style="color:#868686">Copyright © 2021 Lumiworks Pte. Ltd. All rights reserved.</span>
            </div>
            <div class="bottom-right-text">
                <span class="bottom-text">Privacy policy</span>
                <span class="bottom-text" style="margin-right: 40px">Terms of service</span>
            </div>
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
    <div class="m-middle mobile">
        <div>
            <div class="comming-part text-center">
                <p class="text-white m-comming">comming soon</p>
                <h2 class="text-white m-month">JULY</h2>
                <h2 class="text-white m-year">2021</h2>
            </div>
            <div class="welcome-part text-center">
                <span class="text-white m-welcome">Wecome to millionk</span>
                <h3 class="text-white m-main-title">Be The First To Know<br> When MillionK Launches</h3>
                <p class="text-white m-description">Sign up to reserve your spot. We'll let you know how to get up close and personal with your favourite Korean Wave Idols & Influencers.</p>
            </div>
            <div class="input-group mb-5 mt-4 email-part">
                <input type="text" class="form-control email-address m-email" placeholder="Email address" aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append">
                    <button class="btn btn-primary m-btn" type="button" style="font-size:14px">REQUEST INVITE</button>
                </div>
            </div>
            <div class="m-social text-center">
                <i class="fa fa-facebook-f text-white m-social-icon"></i>
                <i class="fa fa-twitter text-white m-social-icon"></i>
                <i class="fa fa-instagram text-white m-social-icon"></i>
                <i class="fa fa-youtube-play text-white m-social-icon"></i>
            </div>     
            <h4 class="text-center mt-3 copyright" style="color:#868686;font-size:14px">Copyright © 2021 Lumiworks Pte. Ltd.<br>All rights reserved.</h4>
            <div class="d-flex mt-3 mb-1 bottom-text">
                <p class="mx-auto mb-0" style="color:#FF335C">Privacy policy</p>
                <p class="mx-auto mb-0" style="color:#FF335C">Terms of service</p>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
@endsection
