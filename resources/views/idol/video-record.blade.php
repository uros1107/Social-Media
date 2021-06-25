@extends('layouts.idol')

@section('title', 'Welcome to MILLIONK')

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
.btn-group {
    position: absolute;
    bottom: 15px;
    left: 15px;
}
.btn-group > div {
    height: 30px;
    border-radius: 5px!important;
    font-size: 11px;
    background-color: #2b2b2b;
    border-color: #4e4e4e;
}
.btn-group > div:hover,
.btn-group > div:active {
    height: 30px;
    border-radius: 5px!important;
    font-size: 11px;
    background-color: #ff335c;
    border-color: #ff335c;
}
video {
    border-radius: 15px;
}
.upload-video {
    cursor: pointer;
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
                <form id="submit_video" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <input type="hidden" name="order_id" value="{{ $order->order_id }}">
                    <input type="file" name="video" class="d-none" id="upload_video">
                    <button type="submit" class="btn custom-btn submit-video">Submit Video</button>
                </form>
            </div>
        </div>
        <div class="divider"></div>
    </div>
    <div class="col-12 col-sm-12 mobile">
        <div class="d-flex mt-3 mb-3">
            <div class="record-video ml-0" style="cursor:pointer">
                <img class="mb-2" style="margin-top: 35px" src="{{ asset('assets/images/icons/dark-camera.png') }}">
                <h4 class="record-btn">Record Video</h4>
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
        <div class="video-part w-100 mb-3" id="video-part" style="position:relative">
            <div class="record-video ml-0" style="cursor:pointer">
                <img class="mb-2" style="margin-top: 35px" src="{{ asset('assets/images/icons/dark-camera.png') }}">
                <h4 class="record-btn" style="color:#898989;font-size: 16px">Record Video</h4>
            </div>
            <div id="show_record" class="d-none">
                <video width="100%" height="290" id="preview" autoplay muted>
                    Your browser does not support the video tag.
                </video>
                <video id="recording" width="100%" height="290" controls style="display:none">
                    Your browser does not support the video tag.
                </video>
                <div class="spinner-border m-auto d-none" id="spinner" style="color:#ff335c"></div>
                <div class="btn-group" id="btn_group">
                    <div id="startButton" class="btn text-white mr-3"> Start </div>
                    <div id="stopButton" class="btn btn-danger text-white" style="display:none;"> Stop </div>
                </div>
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
                            @if($fans->photo)
                            <img class="img-circle" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                            @else
                            <img class="img-circle" src="{{ asset('assets/images/no-image.jpg') }}">
                            @endif
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
                            <p class="mb-2">Language request for this personalized video</p>
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
<script src="{{ asset('assets/js/record.js') }}"></script>

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
        const  fileType = $(this)[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            toastr.error("You should input valid video file!");
        } else if((file = this.files[0])) {
            $('#video-name').html($(this)[0].files[0].name);
            formData.append('video', $(this)[0].files[0]);
        }
    });
    $(document).on('click', '.record-btn', function() {
        $('#show_record').removeClass('d-none');
        $(this).parent().addClass('d-none');
    });
    $(document).on('submit', '#submit_video', function(e) {
        e.preventDefault();

        if(!formData.get('order_id')) { 
            formData.append('order_id', "{{ $order->order_id }}");
        }

        if(formData.get('video')) {
            $('.submit-video').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.submit-video').prop('disabled', true);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('idol-submit-video') }}",
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(!res.success) {
                        // toastr.error(res.errors.video);
                        if(res.error) {
                            toastr.error('Your stripe account id is incorrect!');
                            $('.submit-video').html("Submit Video");
                        $('.submit-video').prop('disabled', false);
                        }
                    } else if(res.success) {
                        location.href = "{{ route('idol-earning') }}";
                    } else {
                        toastr.error('Server error');
                        $('.submit-video').html("Submit Video");
                        $('.submit-video').prop('disabled', false);
                    }
                },
                error: function (error) {
                    toastr.error(error);
                    $('.submit-video').html("Submit Video");
                    $('.submit-video').prop('disabled', false);
                }
            });
        } else {
            toastr.error('You should upload or record video!');
        }
    });
});
</script>
@endsection