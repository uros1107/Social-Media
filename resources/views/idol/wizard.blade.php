@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
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
                        <span class="text-white">Payment method</span>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-8 col-md-8 right-part">
                <form action="" id="setup-submit" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="sub-title" id="profile_information">
                        <h4 class="text-white mb-4">Profile <span class="text-main-color">Information</span></h4>
                        <div class="row">
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
                                    <input type="text" placeholder="" name="idol_user_name" value="">
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
                            <div class="col-12 col-sm-12 col-md-12">
                                <div class="select mt-1">
                                    <select class="select-text" name="idol_cat_id" required>
                                        @foreach(DB::table('categories')->get() as $cat)
                                        <option value="{{ $cat->cat_id }}" {{ $cat->cat_id == Auth::user()->cat_id? 'selected' : '' }}>{{ $cat->cat_name }}</option>
                                        @endforeach
                                    </select>
                                    <label class="select-label">Category</label>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12 col-md-12 mt-3">
                                <label class="pure-material-textfield-outlined w-100 mb-0">
                                    <textarea placeholder="" name="idol_bio" rows="5" style="height:100px">{{ Auth::user()->info }}</textarea>
                                    <span>Bio</span>
                                </label>
                                @if ($errors->has('idol_bio'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_bio') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 img-upload">
                                <label class="ml-2 upload-photo">Upload Photo Profile (500px x 500px)</label>
                                <div class="upload-btn text-center" id="photo_btn">
                                    <img src="{{ asset('assets/images/icons/upload.png') }}">
                                    <span class="ml-1 photo_img_label" style="color: #898989">Upload or Drag & Drop your image here</span>
                                </div>
                                @if ($errors->has('idol_photo'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_photo') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="idol_photo" id="photo_img" class="d-none" >
                            </div>
                            <div class="col-12 col-sm-6 col-md-6 img-upload">
                                <label class="ml-2 upload-banner">Upload Banner (1100px x 200px)</label>
                                <div class="upload-btn text-center" id="banner_btn">
                                    <img src="{{ asset('assets/images/icons/upload.png') }}">
                                    <span class="ml-1 banner_img_label" style="color: #898989">Upload or Drag & Drop your image here</span>
                                </div>
                                @if ($errors->has('idol_banner'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('idol_banner') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="idol_banner" id="banner_img" class="d-none" >
                            </div>
                            <input type="hidden" name="idol_user_id" value="{{ Auth::user()->id }}">
                            <div class="col-12 col-sm-12 col-md-12 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="profile_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="request_video">
                        <h4 class="text-white mb-4">Request <span class="text-main-color">Video</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">Language Preference</h4>
                                <p class="sub-description-1">Your fans will choose this language for your request video</p>
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
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">Request Price</h4>
                                <p class="sub-description-1">Set your request price for your request videos fee</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                <label class="pure-material-textfield-outlined w-100  m-auto">
                                    <input type="text" placeholder="" name="request_video_price" class="text-main-color" value="190">
                                    <span>My Request Price</span>
                                </label>
                                @if ($errors->has('request_video_price'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video_price') }}</p>
                                    </span>
                                @endif
                            </div>
                            <div class="col-12 col-sm-5 col-md-5">
                                <h4 class="text-white sub-title-1">On Vacation?</h4>
                                <p class="sub-description-1">Set your visibility, Let your fans know that you "On Vacation"</p>
                            </div>
                            <div class="col-12 col-sm-7 col-md-7 pl-0 d-flex">
                                <div class="m-auto">
                                    <label class="switch">
                                        <input type="checkbox" name="request_vocation" value="1" checked>
                                        <span class="slider"></span>
                                    </label>
                                    <span class="switch-label">Allow fans to request videos</span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_profile">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="request_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="video_introduction">
                        <h4 class="text-white mb-4">Video <span class="text-main-color">Introduction</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 mb-3">
                                <div class="upload-video w-100 text-center">
                                    <img class="mb-2" src="{{ asset('assets/images/icons/upload-video.png') }}">
                                    <h5>Upload Video</h5>
                                    <p class="mb-0">Format ( .mp4 , .mkv )</p>
                                </div>
                                @if ($errors->has('request_video'))
                                    <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                        <p class="mb-0" style="font-size: 14px">{{ $errors->first('request_video') }}</p>
                                    </span>
                                @endif
                                <input type="file" name="request_video" id="upload-video" class="d-none">
                            </div>
                            <div class="col-12 col-sm-12 col-md-12">
                                <button type="button" class="btn custom-btn w-100 upload-video-btn">Upload</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_request">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px" id="introduction_btn">Next</button>
                            </div>
                        </div>
                    </div>
                    <div class="sub-title d-none" id="payment_method">
                        <h4 class="text-white mb-5">Payment <span class="text-main-color">Method</span></h4>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-12 stripe">
                                <div class="mobile-view">
                                    <img class="mb-3" src="{{ asset('assets/images/stripe.png') }}">
                                    <h4 class="text-white">Stripe<span>(Direct to Local Bank)</span></h4>
                                </div>
                                <ul class="text-white">
                                    <li>
                                        <p class="mb-0 text-white">US$3 Per Withdrawal</p>
                                    </li>
                                    <li>
                                        <p class="mb-0 text-white">Stripe may charge additional fees for you to withdraw additional funds. Funds withdrawn will be in your local currency.</p>
                                    </li>
                                </ul>
                                <button type="button" class="btn custom-btn setup_payment_btn">Set Up Payment</button>
                                <input type="hidden" name="idol_stripe_account_id" id="stripe_account_id" value="">
                                <input type="hidden" name="request_payment_method" id="setup_payment" value="1">
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 mt-4">
                                <button type="button" class="btn custom-btn" style="font-size: 14px;background:#2b2b2b" id="to_introduction">Back</button>
                            </div>
                            <div class="col-6 col-sm-6 col-md-6 text-right mt-4">
                                <button type="submit" class="btn custom-btn submit-btn" style="font-size: 14px">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="row">
                    <div class="col-md-12">
                        <div class="well">
                            <div class="row-fluid">
                                <div class="col-sm-12">
                                    <h4 class="text-white mb-4" style="font-size: 16px">Please input your stripe account id.</h4>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="col-sm-12">
                                    <label class="pure-material-textfield-outlined w-100 mb-4">
                                        <input type="text" id="m_stripe_account_id" placeholder="">
                                        <span>Account Id</span>
                                    </label>
                                </div>
                            </div>
                            <div class="row-fluid">
                                <div class="col-sm-12 text-right">
                                    <button type="button" class="btn custom-btn w-100 save-card" data-dismiss="modal" style="border-radius: 15px!important;font-size: 16px">OK</button>
                                </div>
                            </div>
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
$(document).ready(function(){
    $(document).on('click', '#photo_btn', function() {
        $('#photo_img').click();
    });

    $(document).on('submit', '#setup-submit', function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        if(!$('#stripe_account_id').val()) {
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
                if(this.width != 500 || this.height != 500) {
                    toastr.error("Image size should be 500px * 500px!");
                    $('.upload-photo').addClass('text-main-color');
                    photo_img = false;
                } else {
                    $('.photo_img_label').html($('#photo_img')[0].files[0].name);
                    $('.upload-photo').removeClass('text-main-color');
                    photo_img = true;
                    _URL.revokeObjectURL(objectUrl);
                }
            };
            img.src = objectUrl;
        }
    });

    $(document).on('click', '#banner_btn', function() {
        $('#banner_img').click();
    })

    var banner_img = false;
    $(document).on('change', '#banner_img', function() {
        const  fileType = $('#banner_img')[0].files[0].type;
        const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
        var file, img;

        if (!validImageTypes.includes(fileType)) {
            toastr.error("You should input valid image file!");
            $('.upload-banner').addClass('text-main-color');
            banner_img = false;
        } else if((file = this.files[0])) {
            img = new Image();
            var objectUrl = _URL.createObjectURL(file);
            img.onload = function () {
                if(this.width != 1100 || this.height != 200) {
                    toastr.error("Image size should be 1100px * 200px!");
                    $('.upload-banner').addClass('text-main-color');
                    banner_img = false;
                } else {
                    $('.banner_img_label').html($('#banner_img')[0].files[0].name);
                    $('.upload-banner').removeClass('text-main-color');
                    _URL.revokeObjectURL(objectUrl);
                    banner_img = true;
                }
            };
            img.src = objectUrl;
        }
    });

    $(document).on('click', '.upload-video, .upload-video-btn', function() {
        $('#upload-video').click();
    })

    $(document).on('change', '#upload-video', function() {
        const  fileType = $('#upload-video')[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            toastr.error("You should input valid video file!");
        } else if((file = this.files[0])) {
            $('.upload-video > h5').html($(this)[0].files[0].name);
            $('.upload-video > p').hide();
        }
    });

    $(document).on('click', '#profile_btn', function() {
        $('#profile_information input[type=text]').each(function() {
            if(!$(this).val()) {
                toastr.error("You should input all fields!");
                return false;
            }
        })
        if(!photo_img) {
            toastr.error("You should input photo image file correctly!");
        } else if(!banner_img) {
            toastr.error("You should input banner image file correctly!");
        } else {
            $('#profile_information').addClass('d-none');
            $('#request_video').removeClass('d-none');
            $('#profile_step').removeClass('active');
            $('#profile_step').addClass('completed');
            $('#request_step').addClass('active');
            $('#step_number').html('2');
        }
    })

    $(document).on('click', '#to_profile', function() {
        $('#profile_information').removeClass('d-none');
        $('#request_video').addClass('d-none');
        $('#profile_step').addClass('active');
        $('#profile_step').removeClass('completed');
        $('#request_step').removeClass('active');
        $('#step_number').html('1');
    })

    $(document).on('click', '#request_btn', function() {
        $('#request_video').addClass('d-none');
        $('#video_introduction').removeClass('d-none');
        $('#request_step').removeClass('active');
        $('#request_step').addClass('completed');
        $('#introduction_step').addClass('active');
        $('#step_number').html('3');
    })

    $(document).on('click', '#to_request', function() {
        $('#request_video').removeClass('d-none');
        $('#video_introduction').addClass('d-none');
        $('#request_step').addClass('active');
        $('#request_step').removeClass('completed');
        $('#introduction_step').removeClass('active');
        $('#step_number').html('2');
    })

    $(document).on('click', '#introduction_btn', function() {
        if(!$('#upload-video').val()) {
            toastr.error("You should upload video file!");
        } else {
            $('#video_introduction').addClass('d-none');
            $('#payment_method').removeClass('d-none');
            $('#introduction_step').removeClass('active');
            $('#introduction_step').addClass('completed');
            $('#payment_step').addClass('active');
            $('#step_number').html('4');
        }
    })

    $(document).on('click', '#to_introduction', function() {
        $('#video_introduction').removeClass('d-none');
        $('#payment_method').addClass('d-none');
        $('#introduction_step').addClass('active');
        $('#introduction_step').removeClass('completed');
        $('#payment_step').removeClass('active');
        $('#step_number').html('3');
    })

    $(document).on('click', '.setup_payment_btn', function() {
        $('#myModal').modal('toggle');
    });

    $(document).on('change', '#m_stripe_account_id', function() {
        $('#stripe_account_id').val($(this).val());
    });
})
</script>
@endsection