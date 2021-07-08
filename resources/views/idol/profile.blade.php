@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

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
#uploadModal .embed-responsive-16by9::before {
    padding-top: 0;
}
#uploadModal .modal-dialog {
    max-width: 400px;
    height: 100%;
    justify-content: center;
    align-items: center;
    display: flex;
}
.upload-modal {
    padding: 20px;
}
#uploadModal .close {
    right: 15px;
    top: 5px;
}
.featured .featured-video .review-content {
    color: unset;
}
.alert-success {
    color: #45f10c;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
    border-radius: 10px;
}
.alert-unsuccess {
    color: #FF335C;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
    border-radius: 10px;
}
.user-profile-info {
    margin-top: -200px;
}
@media (max-width: 574px) { 
    .featured {
        padding: 0px 15px;
    }
    .user-profile-info {
        margin-top: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row idol follow-idol mb-4 m-0">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', Auth::user()->id)->first();
        $request_video = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
        $cats = json_decode($idol_info->idol_cat_id);
    @endphp
    <div class="desktop w-100">
        <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
        <div class="action-btn">
            <button type="button" class="btn custom-btn mr-3 edit-btn">Change Password</button>
            <button type="button" class="btn custom-btn edit-btn">Edit Profile</button>
        </div>
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="background-image:unset">
                    <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
                    <div class="add-img">
                        <p class="text-white text-center mb-0" style="font-size: 30px">+</p>
                    </div>
                </div>
                <div class="idol-information">
                    <div class="d-flex">
                        @foreach($cats as $cat)
                        @php
                        $cat = DB::table('categories')->where('cat_id', $cat)->first();
                        @endphp
                        <div class="tik-tok mr-2">
                            <button class="btn custom-btn">{{ $cat->cat_name }}</button>
                        </div>
                        @endforeach
                    </div>
                    <div class="name-action d-flex">
                        <div class="name-part">
                            <div class="name d-flex">
                                <h3>{{ $idol_info->idol_full_name }}</h3>
                                <h5 class="my-auto ml-3">{{ '@'.$idol_info->idol_user_name }}</h5>
                            </div>
                            <div class="description">
                                <p>{{ $idol_info->idol_bio }}</p>
                            </div>
                        </div>
                        <div class="action-part d-flex">
                            <button type="button" class="btn custom-btn">Request - ${{ $request_video->request_video_price }}</button>
                        </div>
                    </div>
                    <div class="review-part d-flex">
                        <div class="rating mr-4">
                            <span class="mr-2">Rating</span>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="fans mr-4">
                            <img src="{{ asset('assets/images/icons/heart-dot.png') }}" class="mr-2">
                            <span>{{ $fans_count }} Fans</span>
                        </div>
                        <div class="day">
                            <img src="{{ asset('assets/images/icons/clock.png') }}" class="mr-2">
                            <span>Typically responds in 3 days</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile w-100">
        <div style="position: relative">
            <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
            <div class="gradient"></div>
        </div>
        <div class="col-12 col-sm-12 col-md-12 user-profile-info">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="background-image:unset;display: contents;">
                    <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
                    <div class="add-img">
                        <p class="text-white text-center mb-0" style="font-size: 30px">+</p>
                    </div>
                </div>
                <div class="ml-3">
                    <h5 class="text-white mt-3">{{ '@'.$idol_info->idol_user_name }}</h5>
                    <h3 class="text-white mt-2">{{ $idol_info->idol_full_name }}</h3>
                    <div class="d-flex" style="flex-wrap: wrap;">
                        @foreach($cats as $cat)
                        @php
                            $cat = DB::table('categories')->where('cat_id', $cat)->first();
                        @endphp
                        <div class="tik-tok mr-2 mb-2">
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
                    <span class="text-white">{{ $fans_count }} Fans</span>
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
                <button type="button" class="btn custom-btn mr-3 edit-btn">Change Password</button>
                <button type="button" class="btn custom-btn edit-btn">Edit Profile</button>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="button" class="btn custom-btn w-100">Request - ${{ $request_video->request_video_price }}</button>
        </div>
    </div>
</div>
<div class="row featured mb-5 m-0">
    @if(Session::has('success'))
        <div class="col-12 col-md-12 col-sm-12 mb-3">
            <div class="alert alert-success mb-0" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        </div>
    @elseif(Session::has('unsuccess'))
        <div class="col-12 col-md-12 col-sm-12 mb-3">
            <div class="alert alert-unsuccess mb-0" role="alert">
                <strong>Unsuccess!</strong> {{ Session::get('unsuccess') }}
            </div>
        </div>
    @endif
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="title-part">
            <h2 class="text-white">Featured Videos</h2>
            <p class="text-grey">All videos</p>
            <div class="divider mb-4 desktop"></div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="row m-0 video-list">
            @if(count($orders))
            @foreach($orders as $order)
            @php
                $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
            @endphp
            <div class="col-6 col-sm-3 col-md-3">
                <div class="video-item" data-id="{{ $order->order_id }}" data-src="{{ asset('assets/videos/'.$order->order_video) }}">
                    <video id="video_{{ $order->order_id }}" controls>
                        <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mp4">
                        <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mkv">
                        Your browser does not support the video tag.
                    </video>
                    <div class="video-title d-flex mt-1">
                        <h5 class="mb-0">Congratulation Melissa</h5>
                        <h5 class="mb-0" id="duration_{{ $order->order_id }}">00:00</h5>
                    </div>
                    <p class="mb-0">From <span class="text-main-color">{{ $fans->name }}</span></p>
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
<div class="row featured mb-4 m-0">
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="title-part">
            <h2 class="text-white">Review</h2>
            <p class="text-grey">Review about {{ $idol_info->idol_full_name }}</p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="row m-0">
            @if(count($reviews))
            @foreach($reviews as $review)
            @php
                $fans = DB::table('users')->where('id', $review->review_fans_id)->first();
            @endphp
            <div class="col-12 col-sm-6 col-md-6">
                <div class="review-item">
                    <div class="review-img mr-3">
                        @if(!$fans->photo)
                        <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle">
                        @else
                        <img src="{{ asset('assets/images/img/'.$fans->photo) }}" class="img-circle">
                        @endif
                    </div>
                    <div class="review-content">
                        <h4>Unbelieavale I can’t see another world</h4>
                        <p class="mb-0">{{ $review->review_feedback }} - <span class="text-main-color">{{ $fans->name }}</span></p>
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

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9">
            <video id="video" controls autoplay>
                <source src="" type="video/mp4">
                <source src="" type="video/mkv">
                Your browser does not support the video tag.
            </video>
        </div>
      </div>
    </div>
  </div>
</div> 

<!-- Modal -->
<div class="modal fade" id="uploadModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content" style="background:#2b2b2b">
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        
        <!-- 16:9 aspect ratio -->
        <div class="embed-responsive embed-responsive-16by9 upload-modal">
            <h4 class="text-white mb-4">Upload Introduction</h4>
            <div class="w-100 text-center video-upload" style="padding: 40px 20px;background: #E5E5E5;border-radius:10px;cursor:pointer">
                <img src="{{ asset('assets/images/icons/upload-video.png') }}">
                <h5 class="text-white upload-video-label" style="color:#2b2b2b!important">Upload Video</h5>
                <p class="text-white" style="color:#898989!important">Format(.mp4, mkv)</p>
            </div>
            <form action="{{ route('idol-update-video') }}" id="update-video" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <input type="file" name="video" class="d-none" id="video-upload">
                <div class="w-100 mt-3">
                    <button type="button" class="btn custom-btn w-100 video-upload-btn" style="font-size: 14px">Upload</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</div> 

@endsection

@section('scripts')

<script>
function format(s) {
    var m = Math.floor(s / 60);
    m = (m >= 10) ? m : "0" + m;
    s = Math.floor(s % 60);
    s = (s >= 10) ? s : "0" + s;
    return m + ":" + s;
}
$(document).ready(function() {

    $(".video-item").each(function() {
        var id = $(this).data('id');
        var myVideo = document.getElementById("video_" + id);
        myVideo.onloadedmetadata = function() {
            $('#duration_' + id).html(format(this.duration));
        };
    });

    $(document).on('click', '.video-item', function() {
        var videoSrc = $(this).data('src');
        $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"); 
        $('#myModal').modal('toggle');
    });

    var show = false;
    $(document).on('click', '.how', function() {
        show = !show;
        if(show) {
            $('.how-work-view').removeClass('d-none');    
        } else {
            $('.how-work-view').addClass('d-none');
        }
    });

    $(document).on('click', '.video-upload', function() {
        $('#video-upload').click();
    })

    let video =  false;
    $(document).on('change', '#video-upload', function() {
        const  fileType = $(this)[0].files[0].type;
        const validVideoTypes = ['video/mp4', 'video/mkv'];
        var file;

        if (!validVideoTypes.includes(fileType)) {
            toastr.error("You should input valid video file!");
            video = false;
        } else if((file = this.files[0])) {
            $('.upload-video-label').html($(this)[0].files[0].name);
            video = true;
        }
    })

    $(document).on('click', '.video-upload-btn', function(e) {
        e.preventDefault();

        if(!video) {
            toastr.error('Please input video file!');
        } else {
            $('#update-video').submit();
        }
    })

    $(document).on('click', '.close-btn', function() {
        $('.how-work-view').addClass('d-none');
    });

    $(document).on('click', '#new-request, #m-new-request', function() {
        console.log(123)
        location.href = "{{ route('new-request') }}";
    });

    $(document).on('click', '.add-img', function() {
        $('#uploadModal').modal('toggle');
    });
    $(document).on('click', '.edit-btn', function() {
        location.href = "{{ route('idol-edit-profile') }}";
    });
})
</script>
@endsection