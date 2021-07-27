@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    padding: 10px!important;
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
.featured .featured-video .review-content {
    color: unset;
}
.video-item:hover {
    cursor: pointer;
}
.user-profile-info {
    margin-top: -210px;
}
.featured .featured-video {
    padding: 0px 20px;
}
.video-item .play-video, .video-item .pause-video {
    bottom: 78px;
    right: 35px;
}
#send-review h4 {
    font-size: 22px;
}
@media (max-width: 574px) {
    .featured {
        padding: 0px 0px!important;
    }
    .featured .featured-video {
        padding: 0px;
    }
    .user-profile-info {
        margin-top: 0px;
    }
    .featured .featured-video .video-item img {
        height: unset;
    }
    .video-item .play-video, .video-item .pause-video {
        right: 25px;
    }
}
</style>
@endsection

@section('content')
<div class="row idol follow-idol mb-4 m-0">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
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
    <div class="col-12 col-md-8 col-sm-8 idol-information" style="vertical-align: middle;display: flex">
        <div class="my-auto w-100">
            <div class="new-profile">
                <div class="w-50 profile-left">
                    <h4 class="text-white mb-3">{{ $idol_info->idol_full_name }}</h4>
                    <p class="text-white mb-3">{{ $idol_info->idol_k_name }}</p>
                    <p class="text-white mb-2">{{ '@'.$idol_info->idol_user_name }}</p>
                </div>
                <div class="w-50 profile-right">
                    <div class="mb-4">
                        @if(!Auth::check())
                        <img src="{{ asset('assets/images/icons/follow.png') }}" class="mr-2">
                        <a href="#" class="join-fandom" data-id="{{ $idol->id }}"><span class="text-white">Follow</span></a>
                        @else
                        @php
                            $user = DB::table('users')->where('id', Auth::user()->id)->first();
                            $has = !$user->fandom_lists? '': in_array($idol->id, json_decode($user->fandom_lists));
                        @endphp
                            <div class="following {{ !$has ? 'd-none' : '' }}">
                                <img src="{{ asset('assets/images/icons/tick.png') }}" class="mr-2">
                                <a href="#" class="join-fandom" data-id="{{ $idol->id }}"><span class="text-white" >Following</span></a>
                            </div>
                            <div class="follow {{ $has ? 'd-none' : '' }}">
                                <img src="{{ asset('assets/images/icons/follow.png') }}" class="mr-2">
                                <a href="#" class="join-fandom" data-id="{{ $idol->id }}"><span class="text-white">Follow</span></a>
                            </div>
                        @endif
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
            <div class="mb-3 mt-2" style="border: 1px solid #2b2b2b;width: 100%;"></div>
            <div class="w-100">
                <h4 class="text-white" style="font-size: 16px;">{{ $idol_info->idol_head_bio }}</h4>
                <p class="text-white" style="font-size: 14px;">{{ $idol_info->idol_bio }}</p>
            </div>
            <div class="mb-4" style="border: 1px solid #2b2b2b;width: 100%;"></div>
            <div class="w-100 d-flex new-profile-btn">
                <button class="btn custom-btn question-btn" style="font-size: 16px">?</button>
                <button class="btn custom-btn w-100" style="font-size: 16px" id="new-request" data-id="{{ $idol->id }}">Request - $ {{ $request_video->request_video_price }}</button>
            </div>
            <div class="how-work-view mt-2 d-none">
                <div class="row">
                    <div class="col-12 title mb-3">
                        <div class="d-flex">
                            <h4 class="text-white">How does it work?</h4>
                            <img src="{{ asset('assets/images/icons/close.png') }}" class="close-btn">
                        </div>
                        <p class="text-white">What happens when I submit a request?</p>
                    </div>
                    <div class="col-12 how-content">
                        <div class="content-item d-flex mb-4">
                            <img src="{{ asset('assets/images/icons/paper.png') }}" class="mr-4">
                            <p class="mb-0 text-white">You will receive an email order confirmation</p>
                        </div>
                        <div class="content-item d-flex mb-4">
                            <img src="{{ asset('assets/images/icons/play.png') }}" class="mr-4">
                            <p class="mb-0 text-white">Your idol will fulfill your video request within 3~7 days</p>
                        </div>
                        <div class="content-item d-flex mb-4">
                            <img src="{{ asset('assets/images/icons/message.png') }}" class="mr-4">
                            <p class="mb-0 text-white">You will receive an email where you can view, share, or download your video</p>
                        </div>
                        <div class="content-item d-flex">
                            <img src="{{ asset('assets/images/icons/wallet.png') }}" class="mr-4">
                            <p class="mb-0 text-white">If your request is uncompleted, the hold on your card will be removed within 5-7 business days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if(count($orders))
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
            @foreach($orders as $order)
            @php
                $fans = DB::table('users')->where('id', $order->order_fans_id)->first();
            @endphp
            <div class="col-6 col-sm-3 col-md-3">
                <div class="video-item" data-id="{{ $order->order_id }}">
                    <video id="video_{{ $order->order_id }}">
                        <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mp4">
                        <source src="{{ asset('assets/videos/'.$order->order_video) }}" type="video/mkv">
                        Your browser does not support the video tag.
                    </video>
                    <div class="play-video text-center">
                        <img src="{{ asset('assets/images/icons/play-video.png') }}">
                    </div>
                    <div class="pause-video text-center d-none">
                        <img src="{{ asset('assets/images/icons/pause-video.png') }}">
                    </div>
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
</div>
@endif

<div class="row featured mb-4 m-0">
    <div class="col-12 col-sm-12 col-md-12 featured-video d-flex">
        <div class="title-part">
            <h2 class="text-white">Comments</h2>
            <p class="text-grey">Comments about {{ $idol_info->idol_full_name }}</p>
        </div>
    </div>
    <div class="col-12 col-sm-12 col-md-12 featured-video">
        @if(count($reviews))
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
        @endif
        <div class="col-12 col-sm-12 col-md-12 payment-next">
            <div class="lang-preference mb-3">
                <div class="row m-0">
                    <form class="w-100" id="send-review" action="{{ route('send-review') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="col-12 title mb-3 text-center">
                            <h4 class="text-white">Your Comment</h4>
                            <div class="stars">
                                <i class="fa fa-star 1-star" style="font-size: 30px" data-value="1"></i>
                                <i class="fa fa-star 2-star" style="font-size: 30px" data-value="2"></i>
                                <i class="fa fa-star 3-star" style="font-size: 30px" data-value="3"></i>
                                <i class="fa fa-star 4-star" style="font-size: 30px" data-value="4"></i>
                                <i class="fa fa-star 5-star" style="font-size: 30px" data-value="5"></i>
                            </div>
                        </div>
                        <div class="col-12 title mb-3 text-center">
                            <h4 class="text-white mb-3">Leave Feedback</h4>
                            <input type="hidden" name="review_rating" value="0" id="review_rating">
                            <input type="hidden" name="review_fans_id" value="{{ Auth::check() ? Auth::user()->id : '' }}">
                            <input type="hidden" name="review_idol_id" value="{{ $idol->id }}">
                            <textarea style="background:#2b2b2b!important" name="review_feedback" id="review_feedback" class="form-control introduction mb-3 text-white" rows="5" placeholder="Please leave your message about this video." required></textarea>
                            <button type="button" class="btn custom-btn w-100 send-feedback-btn">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        <div>
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
            <video id="video" controls>
                <source src="{{ asset('assets/videos/'.$request_video->request_video) }}" type="video/mp4">
                <source src="{{ asset('assets/videos/'.$request_video->request_video) }}" type="video/mkv">
                Your browser does not support the video tag.
            </video>
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

function goto_category(url) {
    location.href = url;
}

$(document).ready(function() {
    @if(Session::get('success'))
        toastr.success('Successfully submitted!');
    @endif

    @if(Session::get('ussuccess'))
        toastr.error('Unsuccessfully your comment!');
    @endif

    $('.video-item video').each(function() {
        $(this).height($(this).width() * 1.5);
    })
    $('.idol-img').height($('.idol-img').width());

    $(document).on('click', '.idol-image', function() {
        $('#myModal').modal('toggle');
    });

    $(".video-item").each(function() {
        var id = $(this).data('id');
        var myVideo = document.getElementById("video_" + id);
        myVideo.onloadedmetadata = function() {
            $('#duration_' + id).html(format(this.duration));
        };
    });

    // $(document).on('click', '.video-item', function() {
        // location.href = "{{ route('view-video') }}" + '?order_id=' + $(this).data('id');
    // })

    $(document).on('ended', '.video-item video', function() {
        $(".play-video").removeClass('d-none');
        $(".pause-video").addClass('d-none');
    });

    $(document).on('click', '.video-item .play-video, .video-item .pause-video', function() {
        var video = $(this).parent().find('video').get(0);

        if ( video.paused ) {
            video.play();
            $(this).parent().find('.play-video').addClass('d-none');
            $(this).parent().find('.pause-video').removeClass('d-none');
        } else {
            video.pause();
            $(this).parent().find('.play-video').removeClass('d-none');
            $(this).parent().find('.pause-video').addClass('d-none');
        }

        return false;
    });

    $(document).on('click', '.question-btn', function() {
        if($('.how-work-view').hasClass('d-none')) {
            $('.how-work-view').removeClass('d-none');    
        } else {
            $('.how-work-view').addClass('d-none');
        }
    })

    $(document).on('click', '.close-btn', function() {
        $('.how-work-view').addClass('d-none');
    })

    $("#myModal").on("hidden.bs.modal", function () {
        $("#video").get(0).pause();
    });

    $(document).on('click', '#new-request, #m-new-request', function() {
        @if(Auth::check())
            var id = $(this).data('id');
            location.href = "{{ route('new-request') }}" + '?id=' + id;
        @else
            location.href = "{{ route('fans-signin') }}";
        @endif
    })

    $(document).on('click', '.join-fandom', function() {
        var id = $(this).data('id');

        @if(!Auth::check())
            location.href = "{{ route('fans-signin') }}";
        @else
            if($(this).parent().hasClass('following')) {
                $('.following').addClass('d-none');
                $('.follow').removeClass('d-none');
            } else {
                $('.following').removeClass('d-none');
                $('.follow').addClass('d-none');
            }
            $.ajaxSetup({
                headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
                url: "{{ route('join-fandom') }}",
                method: 'POST',
                data: { idol_user_id: id },
                success: function (res) {
                    if(res['status'] == 1) {
                        toastr.success('Successfully updated!');
                    } else if(res['status'] == 2) {
                        toastr.success('Successfully updated!');
                    }
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
        @endif
    });

    $(document).on('click', '.new-profile-video .play-video', function() {
        var videoSrc = $(this).data('src');
        $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"); 
        $('#myModal').modal('toggle');
    });

    $(document).on('click', '.fa-star', function() {
        var count = $(this).data('value');
        $('#review_rating').val(count);
        for (let i = 1; i <= count; i++) {
            $('.' + i + '-star').css('color', '#FFC107');
        }
        for (let i = count + 1; i <= 5; i++) {
            $('.' + i + '-star').css('color', '#23282c');
        }
    });

    $(document).on('click', '.send-feedback-btn', function(e) {
        @if(!Auth::check())
            location.href = "{{ route('fans-signin') }}";
        @else
            if(!$('#review_feedback').val()) {
                toastr.error('You should leave feedback!');
            } else {
                $('#send-review').submit();
            }
        @endif
    })
})
</script>
@endsection