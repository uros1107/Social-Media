@extends('layouts.admin')

@section('title', 'Welcome to MILLIONK')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.container-fluid {
    background: #e5e5e5;
}
#profile-img {
    width: 190px!important;
    object-fit: cover;
}
.input-icon {
    right: 15px!important;
    left: unset;
    width: 20px;
    padding: 0px;
    top: 21px!important;
}
.alert-success {
    color: #45f10c;
    background-color: #fcfcfc;
    border-color: #fcfcfc;
}
.ui.fluid.dropdown {
    padding: 11px;
    border-radius: 10px;
    min-height: 50px;
    background: #fcfcfc;
    border: 1px solid #b7b7b7;
}
.ui.selection.active.dropdown:hover {
    border-color: #b7b7b7;
}
.category-label {
    background: #fcfcfc;
    font-size: 12px;
    top: -7px;
}
</style>
@endsection

@section('content')
<div class="top-header">
    <h4 class="text-white my-auto">{{ $idol_info->idol_full_name }}</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Edit Idol</h4>
    </div>
</div>
<div class="row m-0 mt-4 edit-idol">
    @if(Session::has('success'))
        <div class="col-12 col-md-12 col-sm-12">
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="col-12 col-sm-3 col-md-3 mt-2 mb-3">
        <div class="upload-image pt-5">
            @if(!$idol_info->idol_photo)
            <img src="{{ asset('assets/images/no-image.jpg') }}" class="" id="profile-img">
            @else
            <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="" id="profile-img">
            @endif
            <div class="upload-btn mt-3">Upload Photo Image</div>
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-9 mt-2 mb-3">
        <div class="profile">
            <h4 class="mb-3 ml-3">{{ $idol_info->idol_full_name }} <span class="text-main-color">Profile</span></h4>
            <form method="POST" action="{{ route('admin-update-idol') }}" enctype="multipart/form-data" id="add-idol">
                {{ csrf_field() }}
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_full_name" placeholder="" value="{{ $idol_info->idol_full_name }}" required>
                            <span>Full Name</span>
                        </label>
                        @if ($errors->has('idol_full_name'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_full_name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_user_name" placeholder="" value="{{ $idol_info->idol_user_name }}" required>
                            <span>User Name</span>
                        </label>
                        @if ($errors->has('idol_user_name'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_user_name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="email" name="idol_email" placeholder="" value="{{ $idol_info->idol_email }}" required>
                            <span>Email</span>
                        </label>
                        @if ($errors->has('idol_email'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_email') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_phone" placeholder="" value="{{ $idol_info->idol_phone }}">
                            <span>Phone Number</span>
                        </label>
                        @if ($errors->has('idol_phone'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_phone') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_head_bio" id="idol_head_bio" placeholder="" value="{{ $idol_info->idol_head_bio }}">
                            <span>Headline Bio</span>
                        </label>
                        <p class="text-main-color text-right mb-0 limit-message1 d-none" style="font-size: 12px">You can input maximum 15 characters!</p>
                        <p class="text-right mb-0 mr-2 word-count1 d-none" style="font-size: 12px">Characters: <span>15</span></p>
                        @if ($errors->has('idol_head_bio'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_head_bio') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" name="password" placeholder="" value="">
                            <span>Password</span>
                            <img class="input-icon eye-hide" src="{{ asset('assets/images/icons/hide.png') }}">
                            <img class="input-icon eye-show d-none" src="{{ asset('assets/images/icons/show.png') }}">
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('password') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_k_name" placeholder="" value="{{ $idol_info->idol_k_name }}">
                            <span>Korean Name</span>
                        </label>
                        @if ($errors->has('idol_k_name'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_k_name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="select mt-1">
                            <!-- <select class="select-text" name="idol_cat_id" required>
                                @foreach(DB::table('categories')->get() as $cat)
                                <option value="{{ $cat->cat_id }}" {{ $cat->cat_id == $idol_info->idol_cat_id? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                @endforeach
                            </select> -->
                            <select multiple="" name="idol_cat_id[]" class="label ui selection fluid dropdown idol_cat_id">
                                @foreach(DB::table('categories')->get() as $cat)
                                @php
                                    $array = json_decode($idol_info->idol_cat_id);
                                    $has_cat = in_array($cat->cat_id, $array);
                                @endphp
                                <option value="{{ $cat->cat_id }}" {{ $has_cat? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                            <label class="select-label category-label">Category</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 mt-2">
                        <label class="pure-material-textfield-outlined w-100 mb-0">
                            <textarea placeholder="" name="idol_bio" id="idol_bio" rows="5" style="height:100px" required>{{ $idol_info->idol_bio }}</textarea>
                            <span>Bio</span>
                        </label>
                        <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 12px">You can input maximum 200 characters!</p>
                        <p class="text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>0</span></p>
                        @if ($errors->has('idol_bio'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6 mt-2">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" placeholder="" value="{{ $video_request->request_video_price }}" name="request_video_price" class="text-main-color font-weight-bold" required>
                            <span>Request Price</span>
                        </label>
                        @if ($errors->has('request_video_price'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6" style="margin-bottom: 10px;">
                        <div class="m-auto d-flex">
                            <label class="switch my-auto">
                                <input type="checkbox" name="request_vocation" value="1" {{ $video_request->request_vocation == 1? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                            <div class="my-auto" style="padding-top: 26px;">
                                <span class="switch-label">Allow fans to request videos</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <h4 class="upload-video-title">Self Introduction Video (Required)</h4>
                        <div class="upload-video text-center d-none">
                            <img class="my-auto mr-4" src="{{ asset('assets/images/icons/upload-video.png') }}">
                            <div class="upload-video-text">
                                <h4>{{ $video_request->request_video }}</h4>
                                <p class="mb-0">Drag & Drop your files here</p>
                                <p class="mb-0">Format ( .mp4 , .mkv )</p>
                            </div>
                        </div>
                        <div class="text-center" style="position: relative">
                            <video class="w-100 {{ $video_request->request_video? '' : 'd-none' }}" id="video-tag" style="height: 300px;">
                                <source src="{{ asset('assets/videos/'.$video_request->request_video) }}" id="video_here">
                                Your browser does not support HTML5 video.
                            </video>
                            <div class="play-video text-center {{ $video_request->request_video? '' : 'd-none' }}">
                                <img src="{{ asset('assets/images/icons/play-video.png') }}">
                            </div>
                            <div class="pause-video text-center d-none">
                                <img src="{{ asset('assets/images/icons/pause-video.png') }}" class="ml-0" style="width: 12px;">
                            </div>
                        </div>
                        <input type="file" class="d-none" name="request_video" id="upload-video">
                    </div>
                    <input type="file" class="d-none" name="idol_photo" id="img-upload">
                    <input type="hidden" name="idol_info_id" value="{{ $idol_info->idol_id }}">
                    <div class="col-12 col-md-12 col-sm-12 text-right mt-3">
                        <button type="button" class="btn custom-btn save-change-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>

<script>
$(document).ready(function() {
    $('.label.ui.dropdown').dropdown();
    $('#profile-img').height($('#profile-img').width() * 1.6);

    $('.eye-hide').on('click', function() {
        $('input[name=password]').prop('type','text');
        $(this).addClass('d-none');
        $('.eye-show').removeClass('d-none');
    });
    $('.eye-show').on('click', function() {
        $('input[name=password]').prop('type','password');
        $(this).addClass('d-none');
        $('.eye-hide').removeClass('d-none');
    });
    $(document).on('click', '.upload-image', function() {
        $('#img-upload').click();
    })

    var _URL = window.URL || window.webkitURL;
    var photo_img = false;
    $(document).on('change', '#img-upload', function() {
        const  fileType = $(this)[0].files[0].type;
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
        var file, img;

        if (!validImageTypes.includes(fileType)) {
            toastr.error("You should input valid image file!");
            photo_img = false;
        } else if((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                // if(this.width != 500 || this.height != 500) {
                //     toastr.error("Image size should be 500px * 500px!");
                //     photo_img = false;
                // } else {
                    $('#profile-img').attr("src", objectUrl);
                    $('#profile-img').height($('#profile-img').width() * 1.6);
                    photo_img = true;
                    _URL.revokeObjectURL(objectUrl);
                // }
            };
            img.src = objectUrl;
        }
    });

    $(document).on('click', '.upload-video, #video-tag', function() {
        $('#upload-video').click();
    })

    var upload_video = false;
    $(document).on('change', '#upload-video', function() {
        const  fileType = $('#upload-video')[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            toastr.error("You should input valid video file!");
            $('#video-tag').addClass('d-none');
            $('.upload-video').addClass('d-flex');
            $('.upload-video').removeClass('d-none');
            $(".play-video").addClass('d-none');
            upload_video = false;
        } else if((file = this.files[0])) {
            $('#video-tag').removeClass('d-none');
            $('.upload-video').removeClass('d-flex');
            $('.upload-video').addClass('d-none');
            $(".play-video").removeClass('d-none');

            var $source = $('#video_here');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
            // $('.upload-video-text > h4').html($(this)[0].files[0].name);
            upload_video = true;
        }
    });

    $(document).on('ended', '#video-tag', function() {
        $(".play-video").removeClass('d-none');
        $(".pause-video").addClass('d-none');
    });

    $(document).on('click', '.play-video, .pause-video', function() {
        var video = $("#video-tag").get(0);

        if ( video.paused ) {
            video.play();
            $(".play-video").addClass('d-none');
            $(".pause-video").removeClass('d-none');
        } else {
            video.pause();
            $(".play-video").removeClass('d-none');
            $(".pause-video").addClass('d-none');
        }

        return false;
    });

    var word_limit = true;
    $("#idol_bio").on('keyup', function() {
        // var words = 0;
        var words = 200 - $(this).val().length;

        // if ((this.value.match(/\S+/g)) != null) {
        //     words = this.value.match(/\S+/g).length;
        // }

        if (words < 0) {
            $('.limit-message').removeClass('d-none');
            $('.word-count').addClass('d-none');
            word_limit = false;
        }
        else {
            $('.limit-message').addClass('d-none');
            $('.word-count').removeClass('d-none');
            $('.word-count span').html(words);
            word_limit = true;
        }
    });

    var word_limit1 = true;
    $("#idol_head_bio").on('keyup', function() {
        var words = 15 - $(this).val().length;

        // if ((this.value.match(/\S+/g)) != null) {
        //     words = this.value.match(/\S+/g).length;
        // }

        if (words < 0) {
            $('.limit-message1').removeClass('d-none');
            $('.word-count1').addClass('d-none');
            word_limit1 = false;
        }
        else {
            $('.limit-message1').addClass('d-none');
            $('.word-count1').removeClass('d-none');
            $('.word-count1 span').html(words);
            word_limit1 = true;
        }
    });

    $(document).on('click', '.save-change-btn', function(e) {

        if(!$('.ui.fluid.dropdown').children('a').length) {
            toastr.error('You should input all fields correctly!');
        } else if($('.ui.fluid.dropdown').children('a').length > 5) {
            toastr.error('You can select maximum 5 categories!');
        } else if(!word_limit) {
            toastr.error('You can input maximum 200 characters for bio!');
        } else if(!word_limit1) {
            toastr.error('You can input maximum 15 characters for head bio!');
        } else {
            $('.save-change-btn').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.save-change-btn').prop('disabled', true);
            $('#add-idol').submit();
        }
    });
})
</script>
@endsection