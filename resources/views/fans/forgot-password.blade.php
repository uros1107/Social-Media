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
.title-part {
    margin: 100px 0px!important;
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
            <div class="col-12 col-sm-4 col-md-4 form-block" style="display: table;">
                <div style="display: table-cell;vertical-align: middle;">
                    <div class="title-part text-center">
                        <h2 class="text-white title">Forgot Password!</h2>
                        <h4 class="text-grey sub-title">Recover your password</h4>
                    </div>
                    <div class="register-part">
                        <form class="custom-form">
                            <div class="row m-0">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <div class="inputWithIcon">
                                        <label class="input-label">Email</label>
                                        <input type="text" placeholder="Email" class="custom-input">
                                        <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}">
                                    </div>
                                </div>
                                <div class="col-12 mt-4 mb-5">
                                    <button class="btn custom-btn w-100" type="button" id="next">Send request password</button>
                                </div>
                                <div class="col-12 mt-4 mb-5 text-center">
                                    <a class="text-white">Need help?</a>
                                </div>
                                <div class="col-12 text-center" style="margin-top: 100px">
                                    <a class="text-white">Don't have account?</a>
                                    <a class="text-main-color" href="{{ route('fans-signup') }}">Sign Up</a>
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
        $('#datepicker').datepicker({
            format: 'dd/mm/yyyy'
        });
    })
</script>
@endsection
