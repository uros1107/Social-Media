@extends('layouts.fans')

@section('title', 'Welcome to MILLIONK')

@section('styles')
<style>
.custom-col {
    padding-left: 10px;
    padding-right: 10px;
}
.save-btn,
.save-btn:hover,
.save-btn:focus {
    height: 40px;
    border-radius: 50px;
    font-size: 16px;
}
.edit-profile,
.change-password {
    display: none;
}
.alert-success {
    color: #45f10c;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
}
.alert-unsuccess {
    color: #FF335C;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
}

@media (max-width: 574px) { 
    .save-btn {
        width: 100%;
    }
    .container-fluid {
        padding: 0px 15px!important;
    }
    .featured .col-12 {
        padding: 0px 5px;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
}
</style>
@endsection

@section('content')
<div class="row discover-favourite mb-4">
    @if(Session::has('success'))
    <div class="col-12 col-md-12 col-sm-12 p-0">
        <div class="alert alert-success" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
    </div>
    @elseif(Session::has('unsuccess'))
    <div class="col-12 col-md-12 col-sm-12 p-0">
        <div class="alert alert-unsuccess" role="alert">
            <strong>Unsuccess!</strong> {{ Session::get('unsuccess') }}
        </div>
    </div>
    @endif
    <div class="col-12 col-sm-12 col-md-12 d-flex user-profile desktop">
        <div class="profile-img">
            @if(!Auth::user()->photo)
            <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle user-img">
            @else
            <img src="{{ asset('assets/images/img/'.Auth::user()->photo) }}" class="img-circle user-img">
            @endif
        </div>
        <div class="profile-info">
            <h4 class="text-white">{{ Auth::user()->name }}</h4>
            <h5 class='text-lowercase'>{{ '@'.Auth::user()->name }}</h5>
            <p>{{ Auth::user()->info }}</p>
        </div>
        <div class="profile-action">
            <div class="grey-btn">
                <button class="btn custom-btn change-password-btn">Change Password</button>
                <button class="btn custom-btn edit-profile-btn">Edit Profile</button>
            </div>
            <!-- <div class="fandom">
                <button class="btn custom-btn">My Fandom<span>{{ Auth::user()->fandom_lists? count(json_decode(Auth::user()->fandom_lists)) : 0 }}</span></button>
            </div> -->
        </div>
    </div>
    <div class="mobile w-100 pt-3" style="background:#2b2b2b">
        <div class="col-12 d-flex">
            <div class="profile-img">
                @if(!Auth::user()->photo)
                <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle user-img">
                @else
                <img src="{{ asset('assets/images/img/'.Auth::user()->photo) }}" class="img-circle user-img">
                @endif
            </div>
            <div class="profile-action m-auto m-profile-action" style="margin-right: 0px!important">
                <div class="grey-btn">
                    <button class="btn custom-btn mr-0 change-password-btn">Change Password</button>
                    <button class="btn custom-btn edit-profile-btn">Edit Profile</button>
                </div>
            </div>
        </div>
        <div class="col-12 d-flex m-user-profile">
            <h4 class="text-white mt-2">{{ Auth::user()->name }}</h4>
            <h4 class="mt-2 text-lowercase">{{ '@'.Auth::user()->name }}</h4>
        </div>
        <div class="col-12">
            <p style="color:#fcfcfc;font-size:12px">{{ Auth::user()->info }}</p>
            <!-- <div class="fandom m-fandom">
                <button class="btn custom-btn w-100 mt-2 mb-4 text-left">My Fandoms<span>{{ Auth::user()->fandom_lists? count(json_decode(Auth::user()->fandom_lists)) : 0 }}</span></button>
            </div> -->
        </div>
    </div>
</div>
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12 edit-profile">
        <div class="title-part">
            <h2 class="text-white">Edit Profile</h2>
            <p class="text-grey">You can edit your profile</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <form action="{{ route('fans-profile-update') }}" method="POST" id="profile-update" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="row m-0 mb-4" style="flex-wrap: wrap;">
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" placeholder="" name="name" id="name" value="{{ Auth::user()->name }}" required>
                            <span>Your Name</span>
                        </label>
                        @if ($errors->has('name'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="email" placeholder="" name="email" id="email" value="{{ Auth::user()->email }}"  disabled>
                            <span>Your Email</span>
                        </label>
                        @if ($errors->has('email'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" placeholder="" name="phone" id="phone" value="{{ Auth::user()->phone }}">
                            <span>Your Phone Number</span>
                        </label>
                        @if ($errors->has('phone'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                    </div>
                    <!-- <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" placeholder="" name="password" value="">
                            <span>Password</span>
                        </label>
                    </div> -->
                    <div class="col-12 col-md-12 col-sm-12 mt-2">
                        <label class="pure-material-textfield-outlined w-100 mb-0">
                            <textarea placeholder="" rows="5" name="info" id="info" style="height:100px" required>{{ Auth::user()->info }}</textarea>
                            <span>Your Bio</span>
                        </label>
                        <p class="text-main-color text-right mt-1 limit-message d-none" style="font-size: 14px">You can input maximum 100 words!</p>
                        <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Words: <span>0</span></p>
                        @if ($errors->has('info'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0 text-right" style="font-size: 14px">{{ $errors->first('info') }}</p>
                            </span>
                        @endif
                    </div>
                    <input type="file" name="photo" class="d-none" id="photo" value="">
                    <div class="col-12 col-md-12 col-sm-12 text-right mt-3">
                        <button type="button" class="btn custom-btn save-btn px-3 save-change-btn">Save Changes</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 change-password">
        <div class="title-part">
            <h2 class="text-white">Change Password</h2>
            <p class="text-grey">You can change password</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <form action="{{ route('fans-change-password') }}" id="change_password" method="POST">
                {{ csrf_field() }}
                <div class="row m-0 mb-4" style="flex-wrap: wrap;">
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" placeholder="" name="password" id="password" value="">
                            <span>Your Password</span>
                        </label>
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" placeholder="" id="confirm_password" value="">
                            <span>Confirm Password</span>
                        </label>
                    </div>
                    <div class="col-12 col-md-12 col-sm-12 text-right mt-3">
                        <button type="button" class="btn custom-btn save-btn password-btn px-4">Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">My Fandoms</h2>
            <p class="text-grey">List of your favourite idols</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0 mb-4">
                @if($fans->fandom_lists)
                @foreach(json_decode($fans->fandom_lists) as $idol)
                    @php
                        $idol = DB::table('idol_info')->where('idol_user_id', $idol)->first();
                    @endphp
                    <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol->idol_user_name) }}">
                        <div class="image-item">
                            <img src="{{ asset('assets/images/img/'.$idol->idol_photo) }}" class="w-100">    
                            <div class="gradient"></div>
                            <div class="image-profile">
                                <h5 class="text-white">{{ $idol->idol_full_name }}</h5>
                                <p class="text-white mb-0">Dancer, TikTok</p>
                            </div>
                        </div>
                    </div>
                @endforeach
                @else
                <div class="col-12 col-md-12 col-sm-12 d-flex" style="height: 200px">
                    <p class="text-white mb-0 text-center m-auto">No idols yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.custom-col').on('click', function() {
            var url = $(this).data('url');
            location.href = url;
        })
        $('.edit-profile-btn').on('click', function() {
            $('.edit-profile').slideToggle();
        })
        $('.change-password-btn').on('click', function() {
            $('.change-password').slideToggle();
        })
        $('.user-img').on('click', function() {
            $('#photo').click();
        })

        var _URL = window.URL || window.webkitURL;
        $('#photo').on('change', function() {
            const  fileType = $(this)[0].files[0].type;
            const validImageTypes = ['image/gif', 'image/jpeg', 'image/png', 'image/jpg'];
            var file, img;

            if (!validImageTypes.includes(fileType)) {
                toastr.error("You should input valid image file!");
            } else if((file = this.files[0])) {
                img = new Image();
                var objectUrl = _URL.createObjectURL(file);
                img.onload = function () {
                    $('.user-img').attr("src", objectUrl);
                    _URL.revokeObjectURL(objectUrl);
                };
                img.src = objectUrl;
            }
        })

        var word_limit = true;
        $("#info").on('keyup', function() {
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

        $('.save-change-btn').on('click', function() {
            if(!word_limit) {
                toastr.error('You can input maximum 100 words!');
            } else {
                $('#profile-update').submit();
            }
        });

        $('.password-btn').on('click', function() {
            if(!$('#password').val() || !$('#confirm_password').val()) {
                toastr.error('You should input all fields!');
            } else if($('#password').val() != $('#confirm_password').val()) {
                toastr.error('Your password does not match confirm password!');
            } else {
                $('#change_password').submit();
            }
        });
    })
</script>
@endsection