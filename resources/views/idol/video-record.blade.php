@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.modal-dialog {
    max-width: 800px;
    margin: 30px auto;
}
.modal-body {
  position:relative;
  padding:0px;
}
.close {
  position:absolute;
  right:-30px;
  top:0;
  z-index:999;
  font-size:2rem;
  font-weight: normal;
  color:#fff;
  opacity:1;
}
#myModal {
    top: 25%;
}
.modal-backdrop {
    background-color: #FF335C;
}
.video-part {
    height: 290px;
}
.submit-video {
    border-radius: 12px!important;
    font-size: 16px;
    width: 290px;
}
@media (max-width: 574px) {
    .video-part,
    .share {
        display: none!important;
    }
    .record-video {
        width: 50%;
        height: 123px;
        background: #2B2B2B;
        border-radius: 15px;
        margin: 0px 10px;
        text-align: center;
    }
    .record-video h4 {
        font-size: 16px;
        text-align: center;
        color: #898989
    }
    .record-video p {
        font-size: 14px;
        text-align: center;
        color: #898989;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol view-video payment-success m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Take your video or upload video</h2>
                <p class="text-grey">Personalized video for <span class="text-main-color">John Doe</span></p>
            </div>
            <div class="m-auto d-flex share" style="margin-right: 0px!important">
                <button type="button" class="btn custom-btn submit-video">Submit Video</button>
            </div>
        </div>
        <div class="divider"></div>
    </div>
    <div class="col-12 col-sm-12 mobile">
        <div class="d-flex mt-3 mb-3">
            <div class="record-video ml-0">
                <img class="mb-2" style="margin-top: 35px" src="{{ asset('assets/images/icons/dark-camera.png') }}">
                <h4 class="">Record Video</h4>
            </div>
            <div class="record-video mr-0">
                <img class="mb-2" style="margin-top: 20px" src="{{ asset('assets/images/icons/dark-upload.png') }}">
                <h4 class="">Upload Video</h4>
                <p class="mb-0">Format ( .mp4 , .mkv )</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 mobile">
        <button type="button" class="btn custom-btn submit-video w-100">Submit Video</buttton>
    </div>
</div>
<div class="row featured view-video payment-success mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="video-part w-100 mb-3">
            <video width="100%" height="290" controls>
                <source src="https://www.youtube.com/watch?v=ImtZ5yENzgE" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Personalized video request detail</h2>
                <p class="text-grey">Let see what do you want</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">27 May 2021</p>
            </div>
        </div>
        <div class="w-100">
            <div class="instruction">
                <h5 class="text-white">Instruction</h5>
                <br>
                <p class="text-white" style="font-size: 16px">Here is the instruction from you for your idols</p><br>
                <p class="text-white" style="font-size: 16px">Hi, John</p><br>
                <p class="text-white" style="font-size: 16px">Please make video for Melissa, Encourage her for her exam next month.</p>
                <p class="text-white" style="font-size: 16px">Thank you so much.</p><br>
                <p class="text-white" style="font-size: 16px">Regards</p>
                <p class="text-white" style="font-size: 16px">John Doe</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3 desktop" style="height:290px;background: #e5e5e5!important;padding-top:80px!important">
            <div class="row m-0">
                <div class="col-12 title mb-3 text-center">
                    <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                    <h4 style="color:#2b2b2b">Upload Video</h4>
                    <p class="mb-0" style="color:#898989">Drag & Drop your files here</p>
                    <p class="mb-0" style="color:#898989">Format ( .mp4 , .mkv )</p>
                </div>
            </div>
        </div>
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">Request from</h4>
                    </div>
                </div>
                <div class="col-12 how-content">
                    <div class="content-item mb-4">
                        <div class="user-img">
                            <img src="{{ asset('assets/images/profile.png') }}" class="img-circle">
                        </div>
                        <div class="ml-3 my-auto user-name">
                            <p class="mb-0">@johndoe</p>
                            <p class="text-main-color mb-0">John Doe</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white mb-3">Occasion</h4>
                            <p class="mb-0">Occasion Type</p>
                            <p class="text-main-color mb-0">Encouragement</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">For who?</h4>
                            <p class="mb-0">Someone else</p>
                            <p class="text-main-color mb-0">Melissa</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">Language</h4>
                            <p class="mb-0">Language request for this personalized video</p>
                            <p class="text-main-color mb-0">English</p>
                        </div>
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
    $(document).on('click', '.occasion-item', function() {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
    $(document).on('click', '.first-block', function() {
        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.first-block').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
    });
});
</script>
@endsection