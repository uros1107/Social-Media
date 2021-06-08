@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

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
</style>
@endsection

@section('content')
<div class="row idol follow-idol mb-4 m-0">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', Auth::user()->id)->first();
        $request_video = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
    @endphp
    <div class="desktop w-100">
        <img class="bg-img w-100" src="{{ asset('assets/images/follow-bg.png') }}" class="w-100">
        <div class="action-btn">
            <button type="button" class="btn custom-btn mr-3">Change Password</button>
            <button type="button" class="btn custom-btn edit-btn">Edit Profile</button>
        </div>
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="background-image:unset">
                    <img src="{{ asset('assets/images/actor1.png') }}" class='img-circle'>
                    <div class="add-img">
                        <p class="text-white text-center mb-0" style="font-size: 30px">+</p>
                    </div>
                </div>
                <div class="idol-information">
                    <div class="tik-tok">
                        <button class="btn custom-btn mr-2">TIK - TOK</button>
                        <button class="btn custom-btn">STEAMER</button>
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
                            <button type="button" class="btn custom-btn" id="new-request">Reqeuest - ${{ $request_video->request_video_price }}</button>
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
                            <span>{{ $idol_info->idol_fans }} Fans</span>
                        </div>
                        <div class="day">
                            <img src="{{ asset('assets/images/icons/clock.png') }}" class="mr-2">
                            <span>Typically responds in 3 days</span>
                        </div>
                        <div class="how">
                            <img src="{{ asset('assets/images/icons/quiz.png') }}" class="mr-1">
                            <span class="text-white">How does it work?</span>
                        </div>
                        <div class="how-work-view d-none">
                            <div class="row">
                                <div class="col-12 title mb-3">
                                    <div class="d-flex">
                                        <h4 class="text-white">How does it work?</h4>
                                        <img src="{{ asset('assets/images/icons/close.png') }}" class="close-btn">
                                    </div>
                                    <p class="text-white">What happen when I request video?</p>
                                </div>
                                <div class="col-12 how-content">
                                    <div class="content-item d-flex mb-4">
                                        <img src="{{ asset('assets/images/icons/paper.png') }}" class="mr-4">
                                        <p class="mb-0 text-white">You will receive on email order confirmation</p>
                                    </div>
                                    <div class="content-item d-flex mb-4">
                                        <img src="{{ asset('assets/images/icons/play.png') }}" class="mr-4">
                                        <p class="mb-0 text-white">Your idol will fulfill your video request within 7 days</p>
                                    </div>
                                    <div class="content-item d-flex mb-4">
                                        <img src="{{ asset('assets/images/icons/message.png') }}" class="mr-4">
                                        <p class="mb-0 text-white">You will receive an email where you can view, share, or download your video</p>
                                    </div>
                                    <div class="content-item d-flex">
                                        <img src="{{ asset('assets/images/icons/wallet.png') }}" class="mr-4">
                                        <p class="mb-0 text-white">If your request is uncompleted, He hold on your card will be removed within 5-7 business days</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="mobile w-100">
        <img class="bg-img w-100" src="{{ asset('assets/images/mobile-follow-bg.png') }}" class="w-100">
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="background-image:unset">
                    <img src="{{ asset('assets/images/actor1.png') }}" class='img-circle'>
                    <div class="add-img">
                        <p class="text-white text-center mb-0" style="font-size: 30px">+</p>
                    </div>
                </div>
                <div class="ml-3">
                    <h5 class="text-white mt-2">@pakmiyong</h5>
                    <h3 class="text-white">John Doe</h3>
                    <div class="tik-tok">
                        <button class="btn custom-btn mr-2">TIK - TOK</button>
                        <button class="btn custom-btn">STEAMER</button>
                    </div>
                </div>
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
                    <span class="text-white">3.7k Fans</span>
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
                <button type="button" class="btn custom-btn mr-3">Change Password</button>
                <button type="button" class="btn custom-btn">Edit Profile</button>
            </div>
        </div>
        <div class="col-12 mt-3">
            <button type="button" class="btn custom-btn w-100" id="m-new-request">Reqeuest - ${{ $request_video->request_video_price }}</button>
        </div>
    </div>
</div>
<div class="row featured mb-5 m-0">
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
            <!-- <div class="col-6 col-sm-3 col-md-3">
                <div class="video-item" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                    <img src="{{ asset('assets/images/follow-actor.png') }}">
                    <div class="video-title d-flex mt-1">
                        <h5 class="mb-0">Congratulation Melissa</h5>
                        <h5 class="mb-0">02:20</h5>
                    </div>
                    <p class="mb-0">From <span class="text-main-color">John Doe</span></p>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-md-3">
                <div class="video-item" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                    <img src="{{ asset('assets/images/follow-actor.png') }}">
                    <div class="video-title d-flex mt-1">
                        <h5 class="mb-0">Congratulation Melissa</h5>
                        <h5 class="mb-0">02:20</h5>
                    </div>
                    <p class="mb-0">From <span class="text-main-color">John Doe</span></p>
                </div>
            </div>
            <div class="col-6 col-sm-3 col-md-3">
                <div class="video-item" data-src="https://www.youtube.com/embed/IP7uGKgJL8U">
                    <img src="{{ asset('assets/images/follow-actor.png') }}">
                    <div class="video-title d-flex mt-1">
                        <h5 class="mb-0">Congratulation Melissa</h5>
                        <h5 class="mb-0">02:20</h5>
                    </div>
                    <p class="mb-0">From <span class="text-main-color">John Doe</span></p>
                </div>
            </div> -->
        </div>
    </div>
</div>
<div class="row featured mb-4 m-0">
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="title-part">
            <h2 class="text-white">Review</h2>
            <p class="text-grey">Review about John Doe</p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        <div class="row m-0">
            <div class="col-12 col-sm-6 col-md-6">
                <div class="review-item">
                    <div class="review-img mr-3">
                        <img src="{{ asset('assets/images/profile.png') }}" class="img-circle">
                    </div>
                    <div class="review-content">
                        <h4>Unbelieavale I can’t see another world</h4>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. - <span class="text-main-color">John Doe</span></p>
                        <div class="rating mt-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-sm-6 col-md-6">
                <div class="review-item">
                    <div class="review-img mr-3">
                        <img src="{{ asset('assets/images/profile.png') }}" class="img-circle">
                    </div>
                    <div class="review-content">
                        <h4>Unbelieavale I can’t see another world</h4>
                        <p class="mb-0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s. - <span class="text-main-color">John Doe</span></p>
                        <div class="rating mt-2">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                    </div>
                </div>
            </div>
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
            <iframe class="embed-responsive-item" src="" id="video"  allowscriptaccess="always" allow="autoplay"></iframe>
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
            <div class="w-100 text-center" style="padding: 40px 20px;background: #E5E5E5;border-radius:10px">
                <img src="{{ asset('assets/images/icons/upload-video.png') }}">
                <h5 class="text-white" style="color:#2b2b2b!important">Upload Video</h5>
                <p class="text-white" style="color:#898989!important">Format(.mp4, mkv)</p>
            </div>
            <div class="w-100 mt-3">
                <button type="button" class="btn custom-btn w-100" style="font-size: 14px">Upload</button>
            </div>
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