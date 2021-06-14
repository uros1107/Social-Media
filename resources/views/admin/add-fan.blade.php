@extends('layouts.admin')

@section('title', 'Welcome to MillionK')

@section('styles')
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
</style>
@endsection

@section('content')
<div class="top-header">
    <h4 class="text-white my-auto">Create Fans</h4>
    <div class="custom-breadcrumb my-auto">
        <h4 class="text-white mb-0"><span style="font-weight: normal!important">Dashboard</span> > Create Fans</h4>
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
            <h4 class="mb-3 ml-3">Create Fans <span class="text-main-color">Profile</span></h4>
            <form method="POST" enctype="multipart/form-data" id="add-fan">
                {{ csrf_field() }}
                <div class="row m-0">
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="name" placeholder="" value="" required>
                            <span>Full Name</span>
                        </label>
                        @if ($errors->has('name'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('name') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="email" name="email" placeholder="" value="" required>
                            <span>Email</span>
                        </label>
                        @if ($errors->has('email'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('email') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="text" name="phone" placeholder="" value="" required>
                            <span>Phone Number</span>
                        </label>
                        @if ($errors->has('phone'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('phone') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-6 col-sm-6">
                        <label class="pure-material-textfield-outlined w-100">
                            <input type="password" name="password" placeholder="" value="" required>
                            <span>Password</span>
                        </label>
                        @if ($errors->has('password'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('password') }}</p>
                            </span>
                        @endif
                    </div>
                    <div class="col-12 col-md-12 col-sm-12">
                        <label class="pure-material-textfield-outlined w-100 mb-0">
                            <textarea placeholder="" name="info" rows="5" style="height:100px" required></textarea>
                            <span>Bio</span>
                        </label>
                        @if ($errors->has('info'))
                            <span class="help-block pl-3 mb-2 d-block" style="color:#d61919">
                                <p class="mb-0" style="font-size: 14px">{{ $errors->first('info') }}</p>
                            </span>
                        @endif
                    </div>
                    <input type="file" class="d-none" name="photo" id="img-upload">
                    <div class="col-12 col-md-12 col-sm-12 text-right mt-3">
                        <button type="submit" class="btn custom-btn save-change-btn">Save Change</button>
                    </div>
                </div>
            </form>
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
                if(this.width != 500 || this.height != 500) {
                    toastr.error("Image size should be 500px * 500px!");
                    photo_img = false;
                } else {
                    $('#profile-img').attr("src", objectUrl);
                    photo_img = true;
                    _URL.revokeObjectURL(objectUrl);
                }
            };
            img.src = objectUrl;
        }
    });

    $(document).on('submit', '#add-fan', function(e) {
        e.preventDefault();
        var formData = new FormData($(this)[0]);

        if(!photo_img) {
            toastr.error('You should upload valid image file!');
        } else {
            $('.save-change-btn').html("<span class='spinner-grow spinner-grow-sm mr-1'></span>Submitting..");
            $('.save-change-btn').prop('disabled', true);
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: "{{ route('admin-store-fan') }}",
                method: 'POST',
                data: formData,
                cache: false,
                processData: false,
                contentType: false,
                success: function (res) {
                    if(res.success) {
                        toastr.success('Successfully added!');
                        $('.save-change-btn').html("Save Change");
                        $('.save-change-btn').prop('disabled', false);
                        setTimeout(() => {
                            location.href = "{{ route('admin-fans') }}";
                        }, 1000);
                    } else {
                        toastr.error('Server error! Please try again later!');
                        $('.save-change-btn').html("Submit");
                        $('.save-change-btn').prop('disabled', false);
                    }
                },
                error: function (error) {
                    toastr.error('Server error');
                    $('.save-change-btn').html("Submit");
                    $('.save-change-btn').prop('disabled', false);
                }
            });
        }
    });
})
</script>
@endsection