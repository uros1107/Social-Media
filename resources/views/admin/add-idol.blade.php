@extends('layouts.admin')

@section('title', 'Welcome to MILLIONK')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.banner-title {
    font-size: 12px;
    color: #898989;
    padding-left: 10px;
}
.banner-upload {
    justify-content: center;
    padding: 15px;
    background: #e5e5e5;
    border-radius: 15px;
}
#profile-img {
    width: 190px!important;
    height: 190px!important;
    object-fit: cover;
}
.input-icon {
    right: 15px!important;
    left: unset;
    width: 20px;
    padding: 0px;
    top: 21px!important;
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
    <h4 class="text-white my-auto">Create Idol</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Create Idol</h4>
    </div>
</div>
<div class="row m-0 mt-4">
    <div class="col-12 col-sm-3 col-md-3 mt-2 mb-3">
        <div class="upload-image">
            <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle" id="profile-img">
            <div class="upload-btn mt-3">Upload Photo Image</div>
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-9 mt-2 mb-3">
        <div class="profile">
            <h4 class="mb-3 ml-3">Create Idols <span class="text-main-color">Profile</span></h4>
            <form method="POST" action="{{ route('admin-store-idol') }}" enctype="multipart/form-data" id="add-idol">
                {{ csrf_field() }}
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="idol_full_name" placeholder="" value="" required>
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
                            <input type="text" name="idol_user_name" placeholder="" value="" required>
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
                            <input type="email" name="idol_email" placeholder="" value="" required>
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
                            <input type="text" name="idol_phone" placeholder="" value="">
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
                            <input type="password" name="password" placeholder="" value="" required>
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
                    <div class="col-12 col-sm-6 col-md-6">
                        <div class="select mt-1">
                            <!-- <select class="select-text" name="idol_cat_id" required>
                                @foreach(DB::table('categories')->get() as $cat)
                                <option value="{{ $cat->cat_id }}" {{ $cat->cat_id == Auth::user()->cat_id? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                @endforeach
                            </select> -->
                            <select multiple="" name="idol_cat_id[]" class="label ui selection fluid dropdown idol_cat_id">
                                @foreach(DB::table('categories')->get() as $cat)
                                <option value="{{ $cat->cat_id }}" {{ $cat->cat_id == Auth::user()->cat_id? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                @endforeach
                            </select>
                            <label class="select-label category-label">Category</label>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <label class="pure-material-textfield-outlined w-100 mb-0">
                            <textarea placeholder="" name="idol_bio" id="idol_bio" rows="5" style="height:100px" required></textarea>
                            <span>Bio</span>
                        </label>
                        <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 14px">You can input maximum 100 words!</p>
                        <p class="text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Words: <span>0</span></p>
                        @if ($errors->has('idol_bio'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" placeholder="" value="" name="request_video_price" class="text-main-color font-weight-bold" required>
                            <span>My Request Price</span>
                        </label>
                        @if ($errors->has('request_video_price'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <div class="m-auto">
                            <label class="switch my-auto">
                                <input type="checkbox" name="request_vocation" value="1" checked>
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label my-auto">Allow fans to request videos</span>
                        </div>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 mb-3">
                        <div>
                            <p class="banner-title mb-2">Upload Banner</p>
                            <div class="banner-upload d-flex text-center">
                                <img class="mr-2" src="{{ asset('assets/images/icons/upload.png') }}" style="width:20px;height:20px">
                                <span class="banner_img_label">Upload or Drag & Drop your image here</span>
                            </div>
                        </div>
                        <input type="file" class="d-none" name="idol_banner" id="idol_banner">
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
                        <input type="file" class="d-none" name="request_video" id="upload-video">
                    </div>
                    <input type="file" class="d-none" name="idol_photo" id="img-upload">
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
                    photo_img = true;
                    _URL.revokeObjectURL(objectUrl);
                // }
            };
            img.src = objectUrl;
        }
    });

    var banner_img = false;
    $(document).on('click', '.banner-upload', function() {
        $('#idol_banner').click();
    });

    $(document).on('change', '#idol_banner', function() {
        const  fileType = $(this)[0].files[0].type;
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
        var file, img;

        if (!validImageTypes.includes(fileType)) {
            toastr.error("You should input valid image file!");
            banner_img = false;
        } else if((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                // if(this.width != 1100 || this.height != 200) {
                //     toastr.error("Image size should be 1100px * 200px!");
                //     banner_img = false;
                // } else {
                    $('.banner_img_label').html($('#idol_banner')[0].files[0].name);
                    banner_img = true;
                    _URL.revokeObjectURL(objectUrl);
                // }
            };
            img.src = objectUrl;
        }
    });

    $(document).on('click', '.upload-video', function() {
        $('#upload-video').click();
    })

    var upload_video = false;
    $(document).on('change', '#upload-video', function() {
        const  fileType = $('#upload-video')[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            toastr.error("You should input valid video file!");
            upload_video = false;
        } else if((file = this.files[0])) {
            $('.upload-video-text > h4').html($(this)[0].files[0].name);
            upload_video = true;
        }
    });

    var word_limit = true;
    $("#idol_bio").on('keyup', function() {
        var words = 0;

        if ((this.value.match(/\S+/g)) != null) {
            words = this.value.match(/\S+/g).length;
        }

        if (words > 100) {
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

    $(document).on('click', '.save-change-btn', function(e) {
        if(!photo_img || !upload_video || !banner_img || !$('.ui.fluid.dropdown').children('a').length) {
            toastr.error('You should input all fields correctly!');
        } else if($('.ui.fluid.dropdown').children('a').length > 5) {
            toastr.error('You can select maximum 5 categories!');
        } else if(!word_limit) {
            toastr.error('You can input at maximum 100 words!');
        } else {
            $('.save-change-btn').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.save-change-btn').prop('disabled', true);
            $('#add-idol').submit();
        }
    });
})
</script>
@endsection