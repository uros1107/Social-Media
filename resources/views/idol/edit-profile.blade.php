@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.container-fluid {
    background: #171717;
}
.footer .container-fluid {
    padding: 0px!important;
}
.alert-success {
    color: #45f10c;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
}
.change-password {
    display: none;
}
.user-profile-info {
    margin-top: -200px;
}
@media (max-width: 574px) { 
    .container-fluid {
        padding: 0px!important;
    }
    .block {
        padding: 0px;
        background: #171717;
    }
    .block .col-12 {
        padding: 0px;
    }
    .featured-video .col-6 {
        flex: 0 0 65%;
        max-width: 65%;
        padding: 0px 5px;
    }
    .featured-video {
        flex-wrap: initial;
        overflow: auto;
    }
    .bg-img-part {
        padding: 0px;
    }
    .ui.fluid.dropdown, .ui.fluid.dropdown:focus {
        background: #171717!important;
    }
    .category-label {
        background: #171717;
    }
    .user-profile-info {
        margin-top: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row m-0 edit-profile">
    @if(Session::has('success'))
        <div class="col-12 col-md-12 col-sm-12">
            <div class="alert alert-success" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        </div>
    @endif
    <div class="col-12 col-sm-3 col-md-3 bg-img-part">
        <div class="text-center block left desktop">
            <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" id="profile-img" class="img-circle mb-3 mt-5">
            <div>
                <button class="btn custom-btn mb-3 change-photo-btn">Change Photo Profile</button>
            </div>
            <div>
                <button class="btn custom-btn mb-3 change-password-btn">Change Password</button>
            </div>
            <h3 class="text-white mb-2">{{ $idol_info->idol_full_name }}</h3>
            <h4 class="mb-3">{{ '@'.$idol_info->idol_user_name }}</h4>
            <div class="rating mb-3">
                <span class="mr-2">Rating</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="likes mb-4">
                <img src="{{ asset('assets/images/icons/heart-dot.png') }}" class="mr-2">
                <span>{{ $fans_count }} Likes</span>
            </div>
        </div>
        <div class="mobile w-100">
            <div class="follow-idol mb-4">
                <div style="position: relative">
                    <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
                    <div class="gradient"></div>    
                </div>
                <div class="col-12 col-sm-12 col-md-12 user-profile-info">
                    <div class="idol-profile d-flex">
                        <div class="idol-image" style="background-image:unset;display: contents;">
                            <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
                            <!-- <div class="add-img">
                                <p class="text-white text-center mb-0" style="font-size: 30px">+</p>
                            </div> -->
                        </div>
                        @php
                            $cats = json_decode($idol_info->idol_cat_id);
                        @endphp
                        <div class="ml-3">
                            <h5 class="text-white mt-3 mb-2">{{ '@'.$idol_info->idol_user_name }}</h5>
                            <h3 class="text-white mt-2">{{ $idol_info->idol_full_name }}</h3>
                            <div class="d-flex" style="flex-wrap: wrap">
                                @foreach($cats as $cat)
                                @php
                                    $cat = DB::table('categories')->where('cat_id', $cat)->first();
                                @endphp
                                <div class="tik-tok mb-2 mr-2">
                                    <button class="btn custom-btn">{{ $cat->cat_name }}</button>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="w-100">
                        <p class="text-white">{{ $idol_info->idol_bio }}</p>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 mt-4">
                    <div class="row m-0">
                        <div class="col-4 p-0 text-center">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <span class="text-white">Rating</span>
                        </div>
                        <div class="col-4 p-0 text-center">
                            <div class="fans">
                                <img src="{{ asset('assets/images/icons/heart-dot.png') }}" class="mr-2">
                            </div>
                            <span class="text-white">{{ $idol_info->idol_rating }} Fans</span>
                        </div>
                        <div class="col-4 p-0 text-center">
                            <div class="day">
                                <img src="{{ asset('assets/images/icons/clock.png') }}" class="mr-2">
                            </div>
                            <span class="text-white">Responds in 3 days</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-3">
                    <div class="action-btn text-center" style="position:initial">
                        <button type="button" class="btn custom-btn mr-3 change-photo-btn">Change Photo</button>
                        <button type="button" class="btn custom-btn">Change Pasword</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
        <div class="row m-0 block right">
            <div class="col-12 col-md-12 col-sm-12 desktop">
                <h4 class="profile-title text-white mb-4">Edit <span class="text-main-color">Profile</span></h4>
            </div>
            <div class="col-12 col-md-6 col-sm-6">
                <label class="pure-material-textfield-outlined w-100">
                    <input type="text" placeholder="" id="idol_full_name" value="{{ $idol_info->idol_full_name }}">
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
                    <input type="text" placeholder="" id="idol_user_name" value="{{ $idol_info->idol_user_name }}">
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
                    <input type="email" placeholder="" id="idol_email" value="{{ $idol_info->idol_email }}" disabled>
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
                    <input type="text" placeholder="" id="idol_phone" value="{{ $idol_info->idol_phone }}">
                    <span>Phone Number</span>
                </label>
                @if ($errors->has('idol_phone'))
                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_phone') }}</p>
                    </span>
                @endif
            </div>
            <!-- <div class="col-12 col-md-6 col-sm-6">
                <label class="pure-material-textfield-outlined w-100">
                    <input type="password" placeholder="" value="">
                    <span>Password</span>
                </label>
            </div> -->
            <div class="col-12 col-sm-12 col-md-12">
                <div class="select mt-1">
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
            <div class="col-12 col-md-12 col-sm-12 mt-3">
                <label class="pure-material-textfield-outlined w-100 mb-0">
                    <textarea placeholder="" rows="5" id="idol_bio" style="height:100px">{{ $idol_info->idol_bio }}</textarea>
                    <span>Bio</span>
                </label>
                <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 14px">You can input maximum 200 characters!</p>
                <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>200</span></p>
                @if ($errors->has('idol_bio'))
                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                        <p class="mb-0 text-right" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                    </span>
                @endif
            </div>
            <div class="col-12 col-md-12 col-sm-12">
                <div>
                    <p class="banner-title mb-2">Upload Banner</p>
                    <div class="banner-upload d-flex text-center">
                        <img class="mr-2" src="{{ asset('assets/images/icons/upload.png') }}">
                        <span class="text-white banner_img_label">{{ $idol_info->idol_banner }}</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-sm-12 mt-3 change-password">
        <div class="block">
            <div class="row m-auto">
                <div class="col-12 col-sm-12 col-md-12 video-setting desktop">
                    <h4 class="video-setting-title mb-1 text-white">Change <span class="text-main-color">Password</span></h4>
                    <p class="mb-0">You can change your password</p>
                    <div class="divider"></div>
                </div>
                <form action="{{ route('idol-change-password') }}" id="change_password" method="POST"class="w-100">
                    {{ csrf_field() }}
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" name="password" placeholder="" id="password" value="">
                            <span>Password</span>
                        </label>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" placeholder="" id="confirm_password" value="">
                            <span>Confirm Password</span>
                        </label>
                    </div>
                    <div class="col-12 col-sm-6 col-md-6">
                        <button type="button" class="btn custom-btn save-change-btn password-btn">Change Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-sm-12 mt-3">
        <div class="block">
            <div class="row m-auto">
                <div class="col-12 col-sm-12 col-md-12 video-setting desktop">
                    <h4 class="video-setting-title mb-1 text-white">Request <span class="text-main-color">Video Setting</span></h4>
                    <p class="mb-0">Start your personalize video for fans</p>
                    <div class="divider"></div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <form action="{{ route('idol-profile-update') }}" id="profile-update" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="lang-prefer">
                        <h4 class="text-white">Language Preference</h4>
                        <p>Your fans will choose this language for your request video</p>
                        <div class="mobile">
                            <div class="d-flex mb-3">
                                <label class="custom-control black-checkbox m-auto" style="margin-left: 0px!important">
                                    <input type="radio" name="request_lang" value="1" class="fill-control-input d-none" {{ $video_request->request_lang == 1? 'checked' : '' }}>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">English</span>
                                </label>
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="radio" name="request_lang" value="2" class="fill-control-input d-none" {{ $video_request->request_lang == 2? 'checked' : '' }}>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Korean</span>
                                </label>
                            </div>
                            <label class="custom-control black-checkbox m-auto">
                                <input type="radio" name="request_lang" value="3" class="fill-control-input d-none" {{ $video_request->request_lang == 3? 'checked' : '' }}>
                                <span class="fill-control-indicator"></span>
                                <span class="fill-control-description text-white">Mix (English + Korean)</span>
                            </label>
                        </div>
                        <div class="desktop">
                            <div class="d-flex">
                                <label class="custom-control black-checkbox m-auto" style="margin-left: 0px!important">
                                    <input type="radio" name="request_lang" value="1" class="fill-control-input d-none" {{ $video_request->request_lang == 1? 'checked' : '' }}>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">English</span>
                                </label>
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="radio" name="request_lang" value="2" class="fill-control-input d-none" {{ $video_request->request_lang == 2? 'checked' : '' }}>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Korean</span>
                                </label>
                                <label class="custom-control black-checkbox m-auto">
                                    <input type="radio" name="request_lang" value="3" class="fill-control-input d-none" {{ $video_request->request_lang == 3? 'checked' : '' }}>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Mix (English + Korean)</span>
                                </label>
                            </div>
                        </div>
                        <div class="allow-fans mt-4">
                            <label class="switch">
                                <input type="checkbox" name="request_vocation" value="{{ $video_request->request_vocation }}" {{ $video_request->request_vocation == 1? 'checked' : '' }}>
                                <span class="slider"></span>
                            </label>
                            <span class="switch-label">Allow fans to request videos</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-6 col-md-6">
                    <div class="request-price">
                        <div class="desktop">
                            <h4 class="text-white">Request Price</h4>
                            <p>Set your request price for your request videos fee</p>
                        </div>
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" class="text-main-color" name="request_video_price" value="{{ $video_request->request_video_price }}">
                            <span>My Request Price</span>
                        </label>
                        <input type="file" name="idol_photo" class="d-none" id="idol_photo">
                        <input type="hidden" name="idol_full_name" value="{{ $idol_info->idol_full_name }}">
                        <input type="hidden" name="idol_user_name" value="{{ $idol_info->idol_user_name }}">
                        <input type="hidden" name="idol_email" value="{{ $idol_info->idol_email }}">
                        <input type="hidden" name="password" value="">
                        <input type="hidden" name="idol_phone" value="{{ $idol_info->idol_phone }}">
                        <input type="hidden" name="idol_bio" value="{{ $idol_info->idol_bio }}">
                        <input type="hidden" name="idol_cat_id" value="{{ $idol_info->idol_cat_id }}">
                        <input class="d-none" type="file" name="idol_banner" id="idol_banner">
                        <button type="button" class="btn custom-btn save-change-btn profile-update-btn">Save Changes</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-sm-12 mt-3">
        <div class="block featured">
            <div class="col-12 col-sm-12 col-md-12 video-sub-title">
                <h4 class="text-white mb-1">Featured <span class="text-main-color">Videos</span></h4>
                <p class="mb-0">All featured request video from your fans will display on your public view</p>
                <div class="divider mb-3"></div>
            </div>
            <div class="row m-0 p-0 featured-video">
                @if(count($orders))
                @foreach($orders as $order)
                @php
                    $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
                @endphp
                <div class="col-6 col-sm-3 col-md-3">
                    <div class="video-item" data-id="{{ $order->order_id }}">
                        <video id="video_{{ $order->order_id }}" controls>
                            <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mp4">
                            <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mkv">
                            Your browser does not support the video tag.
                        </video>
                        <div class="video-title d-flex mt-1">
                            <h5 class="mb-0">Congratulation Melissa</h5>
                            <h5 class="mb-0 mt-0" id="duration_{{ $order->order_id }}">00:00</h5>
                        </div>
                        <p class="mb-0 text-left">From <span class="text-main-color">{{ $fans->name }}</span></p>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 col-sm-12 col-md-12 d-flex" style="height:100px">
                    <p class="text-white m-auto" style="font-size: 16px">No video yet.</p>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-sm-12 mt-3">
        <div class="block tags">
            <div class="row m-0">
                <div class="col-12 col-sm-12 col-md-12">
                    <div class="tags-title d-flex">
                        <div class="w-100">
                            <h4 class="text-white">Tags</h4>
                            <p class="mb-0">Let your fans find you with your Influencer categories </p>
                        </div>
                        <!-- <button class="btn custom-btn my-auto tag-add-btn">+ Add</button> -->
                    </div>
                    <div class="divider"></div>
                </div>  
                <div class="col-12 col-sm-12 col-md-12 d-flex mb-2" style="overflow: auto">
                    @php
                        $cats = json_decode($idol_info->idol_cat_id);
                    @endphp
                    @foreach($cats as $cat)
                    @php
                        $cat = DB::table('categories')->where('cat_id', $cat)->first();
                    @endphp
                    <div class="tag-item">
                        <img class="my-auto mr-2" src="{{ asset('assets/images/icons/search.png') }}">
                        <p class="text-white my-auto mb-0 mr-2">{{ $cat->cat_name }}</p>
                        <img class="my-auto" src="{{ asset('assets/images/icons/more.png') }}">
                    </div>
                    @endforeach
                </div>  
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 mt-3">
        <div class="row block m-0">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="review">
                    <h4 class="text-white">Review</h4>
                    <p class="mb-0">Review list from your fans</p>
                </div>
                <div class="divider"></div>
            </div>
            @if(count($reviews))
            @foreach($reviews as $review)
            @php
                $fans = DB::table('users')->where('id', $review->review_fans_id)->first();
            @endphp
            <div class="col-12 col-sm-6 col-md-6">
                <div class="review-item d-flex">
                    @if(!$fans->photo)
                    <img class="img-circle mr-3" src="{{ asset('assets/images/no-image.jpg') }}">
                    @else
                    <img class="img-circle mr-3" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                    @endif
                    <div class="review-content">
                        <div class="d-flex" style="position:relative">
                            <h5 class="text-white">Unbelieavale I can’t see another world</h5>
                            <!-- <img class="desktop" src="{{ asset('assets/images/icons/more.png') }}" style="width: 20px;height: 20px"> -->
                        </div>
                        <p class="mb-2">{{ $review->review_feedback }} <span class="text-main-color">- {{ $fans->name }}</span></p>
                        <div class="rating mt-2">
                            @for($i = 1 ; $i <= $review->review_rating ; $i++)
                            <i class="fa fa-star" style="color:#FFC107"></i>
                            @endfor
                            @for($i = 1 ; $i <= 5 - $review->review_rating ; $i++)
                            <i class="fa fa-star"></i>
                            @endfor
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="col-12 col-sm-12 col-md-12 mt-4 mb-4">
                <p class="text-white mb-0 text-center">No review yet.</p>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script>
function format(s) {
    var m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}
$(document).ready(function() {
    $('.label.ui.dropdown').dropdown();

    $(".video-item").each(function() {
        var id = $(this).data('id');
        var myVideo = document.getElementById("video_" + id);
        myVideo.onloadedmetadata = function() {
            $('#duration_' + id).html(format(this.duration));
        };
    });

    var _URL = window.URL || window.webkitURL;
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

    $(document).on('click', '.change-photo-btn', function() {
        $('#idol_photo').click();
    });

    var photo_img = false;
    $(document).on('change', '#idol_photo', function() {
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

    $(document).on('change', '#idol_full_name', function() {
        $('input[name=idol_full_name]').val($(this).val());
    })

    $(document).on('change', '#idol_user_name', function() {
        $('input[name=idol_user_name]').val($(this).val());
    })

    $(document).on('change', '#idol_email', function() {
        $('input[name=idol_email]').val($(this).val());
    })

    $(document).on('change', '#idol_phone', function() {
        $('input[name=idol_phone]').val($(this).val());
    })

    $(document).on('change', '#idol_bio', function() {
        $('input[name=idol_bio]').val($(this).val());
    })

    $(document).on('change', '.idol_cat_id', function() {
        var idol_cat_ids = [];
        setTimeout(() => {
            $('.ui.label>a').each(function() {
                idol_cat_ids.push(Number($(this).data('value')));
            })
            $('input[name=idol_cat_id]').val(idol_cat_ids);
        }, 500);
    })

    $(document).on('change', '#password', function() {
        $('input[name=password]').val($(this).val());
    })

    $('.password-btn').on('click', function() {
        if(!$('#password').val() || !$('#confirm_password').val()) {
            toastr.error('You should input all fields!');
        } else if($('#password').val() != $('#confirm_password').val()) {
            toastr.error('Your password does not match confirm password!');
        } else {
            $('#change_password').submit();
        }
    });

    $('.change-password-btn').on('click', function() {
        $('.change-password').slideToggle();
    });


    var word_limit = true;
    $("#idol_bio").on('keyup', function() {
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

    $('.profile-update-btn').on('click', function() {
        if(!word_limit) {
            toastr.error('You can input maximum 200 characters!');
        } else if(!$('.ui.fluid.dropdown').children('a').length) {
            toastr.error('You can input all fields correctly!');
        } else {
            $('#profile-update').submit();
        }
    });

})

</script>
@endsection