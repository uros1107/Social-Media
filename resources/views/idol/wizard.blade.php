@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.container-fluid {
    padding: 0px!important;
}
.modal-content {
    background: #2b2b2b!important;
}
.modal-body {
    padding: 2rem 1rem;
}
.close {
    margin-top: -22px;
}
#profile-img {
    width: 190px;
    object-fit: cover;
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
    /* background: #fcfcfc; */
    font-size: 12px;
    top: -7px;
}
</style>
@endsection

@section('content')
<div class="row wizard m-0 mb-3">
    <div class="col-12 col-sm-12 col-md-12 d-flex title">
       <h3 class="text-white">Complete your information to start</h3>
       <p class="text-white mb-0">Status:<span class="font-weight-bold">Pending</span></p>
    </div>
</div>
<div class="row wizard m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12 wizard-block">
        <div class="row m-0">
            <div class="col-12 col-sm-4 col-md-4 left-part">
                <div class="d-flex step-title">
                    <div class="my-auto">
                        <h4 class="text-white">Step</h4>
                    </div>
                    <div>
                        <p class="text-white mb-0"><span class="font-weight-bold" id="step_number">1</span>/4</p>
                    </div>
                </div>
                <div class="step mt-5">
                    <div class="step-item">
                        <div class="step-circle active" id="profile_step"></div>
                        <span class="text-white">Profile Information</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="request_step"></div>
                        <span class="text-white">Video Request</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="introduction_step"></div>
                        <span class="text-white">Video Introduction</span>
                    </div>
                    <div class="step-item">
                        <div class="step-circle" id="payment_step"></div>
                        <span class="text-white">Payment Method</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 right-part">
                <div class="sub-title" id="profile_information">
                    <h4 class="text-white mb-4">Profile <span class="text-main-color">Information</span></h4>
                    <input type="hidden" value="{{ Auth::user()->profile_stage }}" id="profile_stage">
                    @php
                        $idol_info = DB::table('idol_info')->where('idol_user_id', Auth::user()->id)->first();
                    @endphp
                    @if(Auth::user()->profile_stage == 0)
                    <form action="" id="setup-submit-1" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 img-upload mb-3">
                                <div class="d-flex">
                                    <div class="img-preview text-center w-50">
                                        <img src="{{ asset('assets/images/no-image.jpg') }}" id="profile-img" class="mb-2">
                                    </div>
                                    <div class="p-3 w-50 my-auto">
                                        <div class="upload-btn text-center w-100" id="photo_btn">
                                            <img src="{{ asset('assets/images/icons/upload.png') }}">
                                            <span class="ml-1 photo_img_label" style="color: #898989">Upload image</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('idol_photo'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_photo') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="idol_photo" id="photo_img" class="d-none" >
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name="idol_full_name" value="{{ Auth::user()->name }}">
                                    <span>Full Name</span>
                                </label>
                                @if ($errors->has('idol_full_name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_full_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name="idol_user_name" value="{{ Auth::user()->user_name }}">
                                    <span>Username</span>
                                </label>
                                @if ($errors->has('idol_user_name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_user_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="email" placeholder="" name="idol_email" style="padding-right: 90px;" value="{{ Auth::user()->email }}">
                                    <span>Email</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}" class="d-none">
                                    <span class="text-white mb-0 verified d-none">Verified!</span>
                                </label>
                                @if ($errors->has('idol_email'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_phone' style="padding-right: 90px;" value="{{ Auth::user()->phone }}">
                                    <span>Phone Number</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}" class="d-none">
                                    <span class="text-white mb-0 verified d-none">Verified!</span>
                                </label>
                                @if ($errors->has('idol_phone'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_phone') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_k_name' style="padding-right: 90px;" value="{{ Auth::user()->k_name }}">
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
                                    <select multiple="" name="idol_cat_id[]" class="label ui selection fluid dropdown idol_cat_id">
                                    @if(Auth::user()->cat_id)
                                        @foreach(DB::table('categories')->get() as $cat)
                                        @php
                                            $array = json_decode(Auth::user()->cat_id);
                                            $has_cat = in_array($cat->cat_id, $array);
                                        @endphp
                                        <option value="{{ $cat->cat_id }}" {{ $has_cat? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                        @endforeach
                                    @else
                                        @foreach(DB::table('categories')->get() as $cat)
                                        <option value="{{ $cat->cat_id }}">{{ $cat->cat_name }}</option>
                                        @endforeach
                                    @endif
                                    </select>
                                    <label class="select-label category-label">Category</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_head_bio' id="idol_head_bio" style="padding-right: 90px;" value="" maxlength="15">
                                    <span>Headline Bio</span>
                                </label>
                                <p class="text-main-color text-right mb-0 limit-message1 d-none" style="font-size: 12px">You can input maximum 15 characters!</p>
                                <p class="text-white text-right mb-0 mr-2 word-count1 d-none" style="font-size: 12px">Characters: <span>15</span></p>
                                @if ($errors->has('idol_head_bio'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_head_bio') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 mt-3">
                                <label class="pure-material-textfield-outlined w-100 mb-0">
                                    <textarea placeholder="" name="idol_bio" id="idol_bio" rows="5" style="height:100px">{{ Auth::user()->info }}</textarea>
                                    <span>Bio</span>
                                </label>
                                <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 12px">You can input maximum 250 characters!</p>
                                <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>250</span></p>
                                @if ($errors->has('idol_bio'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0 text-right" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="idol_user_id" value="{{ Auth::user()->id }}">
                            <input type="hidden" name="stage" value="25">
                            <div class="col-12 col-sm-12 col-md-12 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="profile_btn">Next</button>
                            </div>
                        </div>
                    </form>
                    @else
                    <form action="" id="setup-submit-1" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 img-upload mb-3">
                                <div class="d-flex">
                                    <div class="img-preview text-center w-50">
                                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" id="profile-img" class="mb-2">
                                    </div>
                                    <div class="p-3 w-50 my-auto">
                                        <div class="upload-btn text-center w-100" id="photo_btn">
                                            <img src="{{ asset('assets/images/icons/upload.png') }}">
                                            <span class="ml-1 photo_img_label" style="color: #898989">Upload image</span>
                                        </div>
                                    </div>
                                </div>
                                @if ($errors->has('idol_photo'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_photo') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="idol_photo" id="photo_img" class="d-none" >
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name="idol_full_name" value="{{ $idol_info->idol_full_name }}">
                                    <span>Full Name</span>
                                </label>
                                @if ($errors->has('idol_full_name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_full_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name="idol_user_name" value="{{ $idol_info->idol_user_name }}">
                                    <span>Username</span>
                                </label>
                                @if ($errors->has('idol_user_name'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_user_name') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="email" placeholder="" name="idol_email" style="padding-right: 90px;" value="{{ $idol_info->idol_email }}">
                                    <span>Email</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}" class="d-none">
                                    <span class="text-white mb-0 verified d-none">Verified!</span>
                                </label>
                                @if ($errors->has('idol_email'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_email') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_phone' style="padding-right: 90px;" value="{{ $idol_info->idol_phone }}">
                                    <span>Phone Number</span>
                                    <img src="{{ asset('assets/images/icons/verified.png') }}" class="d-none">
                                    <span class="text-white mb-0 verified d-none">Verified!</span>
                                </label>
                                @if ($errors->has('idol_phone'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_phone') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_k_name' style="padding-right: 90px;" value="{{ $idol_info->idol_k_name }}">
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
                            <div class="col-12 col-sm-12 col-md-12">
                                <label class="pure-material-textfield-outlined w-100">
                                    <input type="text" placeholder="" name='idol_head_bio' style="padding-right: 90px;" value="{{ $idol_info->idol_head_bio }}" maxlength="15">
                                    <span>Headline Bio</span>
                                </label>
                                @if ($errors->has('idol_head_bio'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_head_bio') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 mt-3">
                                <label class="pure-material-textfield-outlined w-100 mb-0">
                                    <textarea placeholder="" name="idol_bio" id="idol_bio" rows="5" style="height:100px">{{ $idol_info->idol_bio }}</textarea>
                                    <span>Bio</span>
                                </label>
                                <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 14px">You can input maximum 250 characters!</p>
                                <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>250</span></p>
                                @if ($errors->has('idol_bio'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0 text-right" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                                    </span>
                                @endif
                            </div>
                            <input type="hidden" name="stage" value="25">
                            <div class="col-12 col-sm-12 col-md-12 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="profile_btn">Next</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
                <div class="sub-title d-none" id="request_video">
                    <h4 class="text-white mb-4">Video Request <span class="text-main-color">Settings</span></h4>
                    @if(Auth::user()->profile_stage >= 25)
                        @php
                            $video_request = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
                        @endphp
                        @if(!$video_request)
                        <form action="" id="setup-submit-2" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <h4 class="text-white sub-title-1">Offered Language Preference(s)</h4>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5">
                                    <p class="sub-description-1">Your fans will be able to choose these language options for their personalized video</p>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex lang">
                                    <label class="custom-control black-checkbox mr-4 m-auto">
                                        <input type="radio" name="request_lang" value="1" class="fill-control-input d-none" checked>
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">English</span>
                                    </label>
                                    <label class="custom-control black-checkbox mr-4 m-auto">
                                        <input type="radio" name="request_lang" value="2" class="fill-control-input d-none">
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">Korean</span>
                                    </label>
                                    <label class="custom-control black-checkbox m-auto">
                                        <input type="radio" name="request_lang" value="3" class="fill-control-input d-none">
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">Mix (English + Korean)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5 mt-4">
                                    <h4 class="text-white sub-title-1">Accept Requests?</h4>
                                    <p class="sub-description-1">Set the price for a personalized video that your fans can ask for</p>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex mt-4">
                                    <label class="pure-material-textfield-outlined w-100  m-auto">
                                        <input type="text" placeholder="" name="request_video_price" class="text-main-color" value="100">
                                        <span>My Request Price</span>
                                    </label>
                                    @if ($errors->has('request_video_price'))
                                        <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                            <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                                        </span>
                                    @endif
                                </div>
                                <!-- <div class="col-12 col-sm-5 col-md-5">
                                    <h4 class="text-white sub-title-1">On Vacation?</h4>
                                    <p class="sub-description-1">Set your visibility now. Default is set to allow your fans to request videos on launch. You can switch this off later.</p>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                    <div class="m-auto">
                                        <label class="switch">
                                            <input type="checkbox" name="request_vocation" value="1" checked>
                                            <span class="slider"></span>
                                        </label>
                                        <span class="switch-label">Allow fans to request videos</span>
                                    </div>
                                </div> -->
                                <input type="hidden" name="stage" value="50">
                                <div class="col-6 col-sm-6 col-md-6 mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_profile">Back</button>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px" id="request_btn">Next</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="" id="setup-submit-2" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12">
                                    <h4 class="text-white sub-title-1">Offered Language Preference(s)</h4>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5">
                                    <p class="sub-description-1">Your fans will be able to choose these language options for their personalized video</p>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex lang">
                                    <label class="custom-control black-checkbox mr-4 m-auto">
                                        <input type="radio" name="request_lang" value="1" class="fill-control-input d-none" {{ $video_request->request_lang == 1 ? 'checked' : '' }}>
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">English</span>
                                    </label>
                                    <label class="custom-control black-checkbox mr-4 m-auto">
                                        <input type="radio" name="request_lang" value="2" class="fill-control-input d-none" {{ $video_request->request_lang == 2 ? 'checked' : '' }}>
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">Korean</span>
                                    </label>
                                    <label class="custom-control black-checkbox m-auto">
                                        <input type="radio" name="request_lang" value="3" class="fill-control-input d-none" {{ $video_request->request_lang == 3 ? 'checked' : '' }}>
                                        <span class="fill-control-indicator"></span>
                                        <span class="fill-control-description text-white">Mix (English + Korean)</span>
                                    </label>
                                </div>
                                <div class="col-12 col-sm-5 col-md-5 mt-4">
                                    <h4 class="text-white sub-title-1">Accept Requests?</h4>
                                    <p class="sub-description-1">Set the price for a personalized video that your fans can ask for</p>
                                </div>
                                <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex mt-4">
                                    <label class="pure-material-textfield-outlined w-100  m-auto">
                                        <input type="text" placeholder="" name="request_video_price" class="text-main-color" value="{{ $video_request->request_video_price }}">
                                        <span>My Request Price</span>
                                    </label>
                                    @if ($errors->has('request_video_price'))
                                        <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                            <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                                        </span>
                                    @endif
                                </div>
                                <input type="hidden" name="stage" value="50">
                                <div class="col-6 col-sm-6 col-md-6 mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_profile">Back</button>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px" id="request_btn">Next</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    @else
                    <form action="" id="setup-submit-2" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12">
                                <h4 class="text-white sub-title-1">Offered Language Preference(s)</h4>
                            </div>
                            <div class="col-12 col-sm-5 col-md-5">
                                <p class="sub-description-1">Your fans will be able to choose these language options for their personalized video</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex lang">
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="radio" name="request_lang" value="1" class="fill-control-input d-none" checked>
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">English</span>
                                </label>
                                <label class="custom-control black-checkbox mr-4 m-auto">
                                    <input type="radio" name="request_lang" value="2" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Korean</span>
                                </label>
                                <label class="custom-control black-checkbox m-auto">
                                    <input type="radio" name="request_lang" value="3" class="fill-control-input d-none">
                                    <span class="fill-control-indicator"></span>
                                    <span class="fill-control-description text-white">Mix (English + Korean)</span>
                                </label>
                            </div>
                            <div class="col-12 col-sm-5 col-md-5 mt-4">
                                <h4 class="text-white sub-title-1">Accept Requests?</h4>
                                <p class="sub-description-1">Set the price for a personalized video that your fans can ask for</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex mt-4">
                                <label class="pure-material-textfield-outlined w-100  m-auto">
                                    <input type="text" placeholder="" name="request_video_price" class="text-main-color" value="100">
                                    <span>My Request Price</span>
                                </label>
                                @if ($errors->has('request_video_price'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                                    </span>
                                @endif
                            </div>
                            <!-- <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">On Vacation?</h4>
                                <p class="sub-description-1">Set your visibility now. Default is set to allow your fans to request videos on launch. You can switch this off later.</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                <div class="m-auto">
                                    <label class="switch">
                                        <input type="checkbox" name="request_vocation" value="1" checked>
                                        <span class="slider"></span>
                                    </label>
                                    <span class="switch-label">Allow fans to request videos</span>
                                </div>
                            </div> -->
                            <input type="hidden" name="stage" value="50">
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_profile">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="request_btn">Next</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
                <div class="sub-title d-none" id="video_introduction">
                    <h4 class="text-white mb-4">Self-Introduction <span class="text-main-color">Video - Required</span></h4>
                    @if(Auth::user()->profile_stage >= 50)
                        @php
                            $video_request = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
                        @endphp
                        @if(!$video_request->request_video)
                        <form action="" id="setup-submit-3" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 mb-3">
                                    <div class="upload-video w-100 text-center">
                                        <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                                        <h5>Upload Video</h5>
                                        <p class="mb-0">Format ( .mp4 , .mkv )</p>
                                    </div>
                                    <div class="text-center" style="position: relative">
                                        <video class="w-100 d-none" id="video-tag" style="height: 300px;">
                                            <source src="" id="video_here">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <div class="play-video text-center d-none">
                                            <img src="{{ asset('assets/images/icons/play-video.png') }}">
                                        </div>
                                        <div class="pause-video text-center d-none">
                                            <img src="{{ asset('assets/images/icons/pause-video.png') }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('request_video'))
                                        <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                            <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video') }}</p>
                                        </span>
                                    @endif
                                    <input type="file" name="request_video" id="upload-video" class="d-none">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <p class="text-white text-center" style="font-size: 14px">Kindly take a quick 15-30 second video of yourself introducing your name, what you do, and how you will be reaching out to your fans as part of the MillionK family. The Self-Introduction video will be part of your public profile on the platform and will serve as a verification step for us</p>
                                </div>
                                <input type="hidden" name="stage" value="75">
                                <div class="col-6 col-sm-6 col-md-6 mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_request">Back</button>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px" id="introduction_btn">Next</button>
                                </div>
                            </div>
                        </form>
                        @else
                        <form action="" id="setup-submit-3" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-12 mb-3">
                                    <div class="upload-video w-100 text-center d-none">
                                        <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                                        <h5>Upload Video</h5>
                                        <p class="mb-0">Format ( .mp4 , .mkv )</p>
                                    </div>
                                    <div class="text-center" style="position: relative">
                                        <video class="w-100" id="video-tag" style="height: 300px;">
                                            <source src="{{ asset('assets/videos/'.$video_request->request_video) }}" id="video_here">
                                            Your browser does not support HTML5 video.
                                        </video>
                                        <div class="play-video text-center">
                                            <img src="{{ asset('assets/images/icons/play-video.png') }}">
                                        </div>
                                        <div class="pause-video text-center d-none">
                                            <img src="{{ asset('assets/images/icons/pause-video.png') }}">
                                        </div>
                                    </div>
                                    @if ($errors->has('request_video'))
                                        <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                            <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video') }}</p>
                                        </span>
                                    @endif
                                    <input type="file" name="request_video" id="upload-video" class="d-none">
                                </div>
                                <div class="col-12 col-sm-12 col-md-12">
                                    <p class="text-white text-center" style="font-size: 14px">Kindly take a quick 15-30 second video of yourself introducing your name, what you do, and how you will be reaching out to your fans as part of the MillionK family. The Self-Introduction video will be part of your public profile on the platform and will serve as a verification step for us</p>
                                </div>
                                <input type="hidden" name="stage" value="75">
                                <div class="col-6 col-sm-6 col-md-6 mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_request">Back</button>
                                </div>
                                <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                    <button type="button" class="btn custom-btn" style="font-size: 14px" id="introduction_btn">Next</button>
                                </div>
                            </div>
                        </form>
                        @endif
                    @else
                    <form action="" id="setup-submit-3" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 mb-3">
                                <div class="upload-video w-100 text-center">
                                    <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                                    <h5>Upload Video</h5>
                                    <p class="mb-0">Format ( .mp4 , .mkv )</p>
                                </div>
                                <div class="text-center" style="position: relative">
                                    <video class="w-100 d-none" id="video-tag" style="height: 300px;">
                                        <source src="" id="video_here">
                                        Your browser does not support HTML5 video.
                                    </video>
                                    <div class="play-video text-center d-none">
                                        <img src="{{ asset('assets/images/icons/play-video.png') }}">
                                    </div>
                                    <div class="pause-video text-center d-none">
                                        <img src="{{ asset('assets/images/icons/pause-video.png') }}">
                                    </div>
                                </div>
                                @if ($errors->has('request_video'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="request_video" id="upload-video" class="d-none">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <p class="text-white text-center" style="font-size: 14px">Kindly take a quick 15-30 second video of yourself introducing your name, what you do, and how you will be reaching out to your fans as part of the MillionK family. The Self-Introduction video will be part of your public profile on the platform and will serve as a verification step for us</p>
                            </div>
                            <input type="hidden" name="stage" value="75">
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_request">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="introduction_btn">Next</button>
                            </div>
                        </div>
                    </form>
                    @endif
                </div>
                <div class="sub-title d-none" id="payment_method">
                    <h4 class="text-white mb-5">Payment <span class="text-main-color">Method</span></h4>
                    <form id="setup-submit-4" action="{{ route('update-profile-stage') }}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 stripe">
                                <div id="paypal-button-container"></div>
                                <input type="hidden" name="idol_paypal_id" id="paypal_id" value="">
                                <input type="hidden" name="request_payment_method" id="setup_payment" value="1">
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_introduction">Back</button>
                            </div>
                            <input type="hidden" name="stage" value="100">
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn submit-btn" style="font-size: 14px">Submit</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script src="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.js"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id=AebDV6DljLVnoJwImUC4fxxsppb_7_LFupktKrw37RcUnMyJLdzgytpd6LA6CKdXiVS9ToqMUr62wovp"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
</script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: 0.1
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        toastr.success('Payment method verified!');
        $('#paypal_id').val(1);
      });
    },
    onError: function (err) {
        // For example, redirect to a specific error page
        toastr.error(err);
    }
  }).render('#paypal-button-container');
$(document).ready(function(){
    $('.label.ui.dropdown').dropdown();
    $('#profile-img').height($('#profile-img').width() * 1.6);

    $(document).on('click', '#photo_btn', function() {
        $('#photo_img').click();
    });

    $(document).on('submit', '#setup-submit', function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        if(!$('#paypal_id').val()) {
            toastr.error('You should setup payment method');
        } else {
            $('.submit-btn').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.submit-btn').prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('setup-submit') }}",
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(res.success) {
                        location.href = "{{ route('idol-payment-completed') }}";
                    } else {
                        toastr.error('Server error! Please try again later!');
                    }
                },
                error: function (error) {
                    toastr.error('Upload size was exceeds!');
                    $('.submit-btn').html("Submit");
                    $('.submit-btn').prop('disabled', false);
                }
            });
        }
    });

    var _URL = window.URL || window.webkitURL;
    var photo_img = false;
    $(document).on('change', '#photo_img', function() {
        const  fileType = $('#photo_img')[0].files[0].type;
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
        var file, img;

        if (!validImageTypes.includes(fileType)) {
            toastr.error("You should input valid image file!");
            $('.upload-photo').addClass('text-main-color');
            photo_img = false;
        } else if((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                // if(this.width != 500 || this.height != 500) {
                //     toastr.error("Image size should be 500px * 500px!");
                //     $('.upload-photo').addClass('text-main-color');
                //     photo_img = false;
                // } else {
                    // $('.photo_img_label').html($('#photo_img')[0].files[0].name);
                    $('.img-preview').removeClass('d-none');
                    $('#profile-img').attr("src", objectUrl);
                    $('#profile-img').height($('#profile-img').width() * 1.6);
                    $('.upload-photo').removeClass('text-main-color');
                    photo_img = true;
                    _URL.revokeObjectURL(objectUrl);
                // }
            };
            img.src = objectUrl;
        }
    });

    var word_limit = true;
    $("#idol_bio").on('keyup', function() {
        var words = 250 - $(this).val().length;

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

    $(document).on('click', '.upload-video, #video-tag', function() {
        $('#upload-video').click();
    })

    var video_check = false;
    $(document).on('change', '#upload-video', function() {
        const  fileType = $('#upload-video')[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            $('.upload-video').removeClass('d-none');
            $('#video-tag').addClass('d-none');
            $('.play-video, .pause-video').addClass('d-none');
            video_check = false;
            toastr.error("You should input valid video file!");
        } else if((file = this.files[0])) {
            $('#video-tag').removeClass('d-none');
            $('.upload-video').addClass('d-none');
            $(".play-video").removeClass('d-none');

            var $source = $('#video_here');
            $source[0].src = URL.createObjectURL(this.files[0]);
            $source.parent()[0].load();
            video_check = true;
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

    $(document).on('click', '#profile_btn', function() {
        var is_empty = false;
        $('#profile_information input[type=text]').each(function() {
            if(!$(this).val()) {
                toastr.error("You should input all fields!");
                is_empty = true;
                return false;
            }
        })
        if(!is_empty) {
            if(!photo_img && !$('#profile_stage').val()) {
                toastr.error("You should input photo image file correctly!");
            } else if(!word_limit) {
                toastr.error('You can input maximum 250 characters for bio!');
            } else if(!word_limit1) {
                toastr.error('You can input maximum 15 characters for headline bio!');
            } else if($('.ui.fluid.dropdown').children('a').length > 5 || !$('.ui.fluid.dropdown').children('a').length) {
                toastr.error('You can select maximum 5 categories!');
            } else {
                var form = new FormData($("#setup-submit-1")[0]);
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url: "{{ route('update-profile-stage') }}",
                    method: "POST",
                    data: form,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        $('#profile_information').addClass('d-none');
                        $('#request_video').removeClass('d-none');
                        $('#profile_step').removeClass('active');
                        $('#profile_step').addClass('completed');
                        $('#request_step').addClass('active');
                        $('#step_number').html('2');
                    }
                });
            }
        }
    })

    $(document).on('click', '#to_profile', function() {
        $('#profile_information').removeClass('d-none');
        $('#request_video').addClass('d-none');
        $('#profile_step').addClass('active');
        // $('#profile_step').removeClass('completed');
        // $('#request_step').removeClass('active');
        $('#step_number').html('1');
    })

    $(document).on('click', '#request_btn', function() {
        var form = new FormData($("#setup-submit-2")[0]);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "{{ route('update-profile-stage') }}",
            method: "POST",
            data: form,
            processData: false,
            contentType: false,
            success: function(data) {
                $('#request_video').addClass('d-none');
                $('#video_introduction').removeClass('d-none');
                $('#request_step').removeClass('active');
                $('#request_step').addClass('completed');
                $('#introduction_step').addClass('active');
                $('#step_number').html('3');
            }
        });
    })

    $(document).on('click', '#to_request', function() {
        $('#request_video').removeClass('d-none');
        $('#video_introduction').addClass('d-none');
        $('#request_step').addClass('active');
        // $('#request_step').removeClass('completed');
        // $('#introduction_step').removeClass('active');
        $('#step_number').html('2');
    })

    $(document).on('click', '#introduction_btn', function() {
        if(!video_check && $('#profile_stage').val() != 75) {
            toastr.error("You should upload video file!");
        } else {
            var form = new FormData($("#setup-submit-3")[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('update-profile-stage') }}",
                method: "POST",
                data: form,
                processData: false,
                contentType: false,
                success: function(data) {
                    $('#video_introduction').addClass('d-none');
                    $('#payment_method').removeClass('d-none');
                    $('#introduction_step').removeClass('active');
                    $('#introduction_step').addClass('completed');
                    $('#payment_step').addClass('active');
                    $('#step_number').html('4');
                }
            });
        }
    })

    $(document).on('click', '#to_introduction', function() {
        $('#video_introduction').removeClass('d-none');
        $('#payment_method').addClass('d-none');
        $('#introduction_step').addClass('active');
        // $('#introduction_step').removeClass('completed');
        // $('#payment_step').removeClass('active');
        $('#step_number').html('3');
    });

    $(document).on('click', '.submit-btn', function() {
        if(!$('#paypal_id').val()) {
            toastr.error('You should setup payment method');
        } else {
            $('.submit-btn').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.submit-btn').prop('disabled', true);

            var form = new FormData($("#setup-submit-4")[0]);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "{{ route('update-profile-stage') }}",
                method: "POST",
                data: form,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(res.success) {
                        location.href = "{{ route('idol-payment-completed') }}";
                    } else {
                        toastr.error('Server error! Please try again later!');
                    }
                },
                error: function (error) {
                    toastr.error('Upload size was exceeds!');
                    $('.submit-btn').html("Submit");
                    $('.submit-btn').prop('disabled', false);
                }
            });
        }
    });
})

var video = $("#video-tag").get(0);

video.addEventListener("ended", function() {
    $(".play-video").removeClass('d-none');
    $(".pause-video").addClass('d-none');
});
</script>
@endsection