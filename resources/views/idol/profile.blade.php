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
.featured .featured-video {
    padding: 0px 20px;
}
@media (max-width: 574px) { 
    .featured {
        padding: 0px 15px;
    }
    .user-profile-info {
        margin-top: 0px;
    }
    .featured .featured-video {
        padding: 0px;
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
    <div class="col-12 col-md-4 col-sm-4 new-profile-video">
        <div style="position: relative">
            <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="idol-img">
            <div class="play-video text-center" data-src="{{ asset('assets/videos/'.$request_video->request_video) }}">
                <img src="{{ asset('assets/images/icons/play-video.png') }}">
            </div>
        </div>
    </div>
    <div class="col-12 col-md-8 col-sm-8 idol-information">
        <div class="new-profile">
            <div class="w-50 profile-left">
                <h4 class="text-white mb-3">{{ $idol_info->idol_full_name }}</h4>
                <p class="text-white mb-3">{{ $idol_info->idol_full_name }}</p>
                <p class="text-white mb-2">{{ '@'.$idol_info->idol_user_name }}</p>
            </div>
            <div class="w-50 profile-right">
                <div class="mb-4">
                    <img src="{{ asset('assets/images/icons/tick.png') }}" class="mr-2">
                    <span class="text-white">Following</span>
                </div>
                <div class="mb-4">
                    <img src="{{ asset('assets/images/icons/fill-heart.png') }}" class="mr-2">
                    <span class="text-white">{{ $fans_count }} Fans</span>
                </div>
                <div class="mb-2">
                    <img src="{{ asset('assets/images/icons/fill-chat.png') }}" class="mr-2">
                    <span class="text-white">{{ $reviews->count() }} Comments</span>
                </div>
            </div>
        </div>
        <div class="mb-3" style="border: 1px solid #2b2b2b;width: 100%;"></div>
        <div class="w-100">
            <h4 class="text-white" style="font-size: 16px;">{{ $idol_info->idol_head_bio }}</h4>
            <p class="text-white" style="font-size: 14px;">{{ $idol_info->idol_bio }}</p>
        </div>
        <div class="mb-3" style="border: 1px solid #2b2b2b;width: 100%;"></div>
        <div class="w-100 d-flex new-profile-btn">
            <button class="btn custom-btn question-btn" style="font-size: 16px">?</button>
            <button class="btn custom-btn w-100" style="font-size: 16px">Request Now - $ {{ $request_video->request_video_price }}</button>
        </div>
    </div>
</div>
<div class="row featured mb-5 m-0">
    @if(count($orders))
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="title-part">
            <h2 class="text-white">Featured Videos</h2>
            <p class="text-grey">All videos</p>
            <div class="divider mb-4 desktop"></div>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="row m-0 video-list">
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
                    <!-- <div class="video-title d-flex mt-1">
                        <h5 class="mb-0">Congratulation Melissa</h5>
                        <h5 class="mb-0" id="duration_{{ $order->order_id }}">00:00</h5>
                    </div> -->
                    <p class="mb-0">From <span class="text-main-color">{{ $fans->name }}</span></p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>

@if(count($reviews))
<div class="row featured mb-4 m-0">
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="title-part">
            <h2 class="text-white">Comments</h2>
            <p class="text-grey">Comments about {{ $idol_info->idol_full_name }}</p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="row m-0">
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
        </div>
    </div>
</div>
@endif

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
            <video id="video" controls>
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
    $('.idol-img').height($('.idol-img').width());

    $(".video-item").each(function() {
        var id = $(this).data('id');
        var myVideo = document.getElementById("video_" + id);
        myVideo.onloadedmetadata = function() {
            $('#duration_' + id).html(format(this.duration));
        };
    });

    $('.video-item video').each(function() {
        $(this).height($(this).width() * 1.5);
    })

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

    $(document).on('click', '.play-video', function() {
        var videoSrc = $(this).data('src');
        $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"); 
        $('#myModal').modal('toggle');
    });
})

</script>
@endsection