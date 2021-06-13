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
    background: #2B2B2B;
    border-radius: 15px;
    text-align: center;
    padding-top: 80px;
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
        @php
            $fans =  DB::table('users')->where('id', $order->order_fans_id)->first();
        @endphp
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Take your video or upload video</h2>
                <p class="text-grey">Personalized video for <span class="text-main-color">{{ $fans->name }}</span></p>
                @if ($errors->has('upload_video'))
                    <p style="color:red">{{ $errors->first('upload_video') }}</p>
                @endif
            </div>
            <div class="m-auto d-flex share" style="margin-right: 0px!important">
                <form action="{{ route('idol-submit-video') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                    <input type="file" name="upload_video" class="d-none" id="upload_video">
                    <button type="submit" class="btn custom-btn submit-video">Submit Video</button>
                </form>
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
            <!-- <video width="100%" height="290" controls>
                <source src="https://www.youtube.com/watch?v=ImtZ5yENzgE" type="video/mp4">
                Your browser does not support the video tag.
            </video> -->
            <div class="record-video ml-0">
                <img class="mb-2" style="margin-top: 35px" src="{{ asset('assets/images/icons/dark-camera.png') }}">
                <h4 style="color:#898989;font-size: 16px">Record Video</h4>
            </div>
        </div>
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Personalized video request detail</h2>
                <p class="text-grey">Let see what do you want</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">{{  Carbon\Carbon::parse($order->created_at)->format('d F Y') }}</p>
            </div>
        </div>
        <div class="w-100">
            <div class="instruction">
                <h5 class="text-white">Instruction</h5>
                <br>
                <p style="font-size: 16px;color: #898989">Here is the instruction from you for your idols</p><br>
                <p class="text-white" style="font-size: 16px">{{ $order->order_introduction }}</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3 desktop" style="height:290px;background: #e5e5e5!important;padding-top:80px!important">
            <div class="row m-0">
                <div class="col-12 title mb-3 text-center upload-video">
                    <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                    <h4 style="color:#2b2b2b" id="video-name">Upload Video</h4>
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
                            <p class="mb-0">{{ '@'.$fans->name }}</p>
                            <p class="text-main-color mb-0">{{ $fans->name }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white mb-3">Occasion</h4>
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order->order_occasion)->first();
                            @endphp
                            <p class="mb-0">Occasion Type</p>
                            <p class="text-main-color mb-0">{{ $occasion->occasion_name }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">For who?</h4>
                            <p class="mb-0">{{ $order->order_who_for == 1? 'For me' : 'Someone else' }}</p>
                            <p class="text-main-color mb-0">{{ $order->order_to }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <h4 class="text-white">Language</h4>
                            <p class="mb-0">Language request for this personalized video</p>
                            @if($order->order_lang == 1)
                            <p class="text-main-color mb-0">English</p>
                            @elseif($order->order_lang == 2)
                            <h4 class="text-main-color">Korean</h4>
                            @else
                            <h4 class="text-main-color">Mix(English and Korean)</h4>
                            @endif
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
    $(document).on('click', '.upload-video', function() {
        $('#upload_video').click();
    });
    $(document).on('change', '#upload_video', function() {
        $('#video-name').html($(this)[0].files[0].name);
    });
});
</script>
@endsection