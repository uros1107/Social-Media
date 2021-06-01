@extends('layouts.admin')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="top-header">
    <h4 class="text-white my-auto">Create Idols</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Create Idols</h4>
    </div>
</div>
<div class="row m-0 mt-4">
    <div class="col-12 col-sm-3 col-md-3 mt-2 mb-3">
        <div class="upload-image">
            <img src="{{ asset('assets/images/actor1.png') }}" class="img-circle">
            <div class="upload-btn mt-3">Upload Photo Image</div>
        </div>
        <input type="file" class="d-none" id="img-upload">
    </div>
    <div class="col-12 col-sm-9 col-md-9 mt-2 mb-3">
        <div class="profile">
            <h4 class="mb-3 ml-3">Create Idols <span class="text-main-color">Profile</span></h4>
            <div class="row m-0">
                <div class="col-12 col-md-6 col-sm-6">
                    <label class="pure-material-textfield-outlined w-100">
                        <input placeholder="" value="John Doe">
                        <span>Full Name</span>
                    </label>
                </div>
                <div class="col-12 col-md-6 col-sm-6">
                    <label class="pure-material-textfield-outlined w-100">
                        <input placeholder="" value="johndoe">
                        <span>User Name</span>
                    </label>
                </div>
                <div class="col-12 col-md-6 col-sm-6">
                    <label class="pure-material-textfield-outlined w-100">
                        <input placeholder="" value="john@gmail.com">
                        <span>Email</span>
                    </label>
                </div>
                <div class="col-12 col-md-6 col-sm-6">
                    <label class="pure-material-textfield-outlined w-100">
                        <input placeholder="" value="+12312312312">
                        <span>Phone Number</span>
                    </label>
                </div>
                <div class="col-12 col-md-12 col-sm-12">
                    <label class="pure-material-textfield-outlined w-100 mb-0">
                        <textarea placeholder="" rows="5" style="height:100px">I’m dance studio teacher with millions of views on TikTok. 50% of fees will go to dog charities</textarea>
                        <span>Bio</span>
                    </label>
                </div>
                <div class="col-12 col-md-6 col-sm-6">
                    <label class="pure-material-textfield-outlined w-100">
                        <input placeholder="" value="$190" class="text-main-color font-weight-bold">
                        <span>My Request Price</span>
                    </label>
                </div>
                <div class="col-12 col-md-6 col-sm-6">
                    <div class="m-auto">
                        <label class="switch my-auto">
                            <input type="checkbox">
                            <span class="slider"></span>
                        </label>
                        <span class="switch-label my-auto">Allow fans to request videos</span>
                    </div>
                </div>
                <div class="col-12 col-md-12 col-sm-12">
                    <h4 class="upload-video-title">Upload first video (if have)</h4>
                    <div class="upload-video text-center d-flex">
                        <img class="my-auto mr-4" src="{{ asset('assets/images/icons/upload-video.png') }}">
                        <div class="upload-video-text">
                            <h4>Upload video</h4>
                            <p class="mb-0">Drag & Drop your files here</p>
                            <p class="mb-0">Format ( .mp4 , .mkv )</p>
                        </div>
                    </div>
                    <input type="file" class="d-none" id="upload-video">
                </div>
                <div class="col-12 col-md-12 col-sm-12 text-right mt-3">
                    <button class="btn custom-btn save-change-btn">Save Change</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')

<script>
$(document).ready(function() {
    $(document).on('click', '.upload-image', function() {
        $('#img-upload').click();
    })
    $(document).on('click', '.upload-video', function() {
        $('#upload-video').click();
    })
})
</script>
@endsection