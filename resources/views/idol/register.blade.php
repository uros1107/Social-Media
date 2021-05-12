@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.btn-primary {
    border-top-left-radius: 10px!important;
    border-bottom-left-radius: 10px!important;
}
.hand-img {
    position: absolute;
    top: -200px;
    right: -15px;
}
.item-title {
    font-size: 18px;
    margin: 30px 0px;
}
</style>
@endsection

@section('content')
<div class="container-fluid">
    <!-- desktop -->
    <div class="top desktop">
        <img src="{{ asset('assets/images/top-left-img.png') }}">
    </div>
    <div class="middle desktop">
        <div class="middle-center">
            <div class="">
                <div>
                    <span class="comming text-white">Welcome to Millionk</span>
                </div>
            </div>
            <h1 class="text-white main-text">MEET THE WORLD'S FIRST<br> HALLYU CELEBRITY PLATFORM</h1>
            <h3 class="description">Create & Earn by Fulfilling personalized<br> videos from your fans worldwide.</h3>
            <div class="input-group mb-3 mt-5">
                <button class="btn btn-primary" type="submit">APPLY NOW</button>
            </div>
        </div>
        <div class="middle-hand">
            <img src="{{ asset('assets/images/hand.png') }}" class="hand-img">
        </div>
    </div>
    
    <div class="connect-block text-center">
        <h1 class="text-white">CONNECT WITH YOUR FRIENDS WORLDWIDE</h1>
        <div class="horizontal-red-bar"></div>
        <div class="row">
            <div class="col-12 col-sm-4 col-md-4 create-showcase">
                <img src="{{ asset('assets/images/create_showcase.png') }}" style="border-radius: 50%">
                <h4 class="text-main-color text-uppercase item-title">Create Showcase</h4>
                <p class="text-white">Your own pricing for personalized videos for your fans</p>
            </div>
            <div class="col-12 col-sm-4 col-md-4 create-showcase">
                <img src="{{ asset('assets/images/showcase.png') }}" style="border-radius: 50%">
                <h4 class="text-main-color text-uppercase item-title">Showcase</h4>
                <p class="text-white">Choosen personalized videos you have given for your fans</p>
            </div>
            <div class="col-12 col-sm-4 col-md-4 create-showcase">
                <img src="{{ asset('assets/images/next_gen.png') }}" style="border-radius: 50%">
                <h4 class="text-main-color text-uppercase item-title">Next-Gen</h4>
                <p class="text-white">Take the next step in connecting with your fans through personalized videos</p>
            </div>
        </div>
    </div>
      
</div>
@endsection

@section('scripts')
@endsection