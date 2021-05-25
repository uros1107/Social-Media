@extends('layouts.fans')

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
</style>
@endsection

@section('content')
<div class="row follow-idol mb-4 m-0">
    <div class="desktop w-100">
        <img class="bg-img w-100" src="{{ asset('assets/images/follow-bg.png') }}" class="w-100">
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image">
                    <img src="{{ asset('assets/images/actor1.png') }}" class='img-circle'>
                </div>
                <div class="idol-information">
                    <div class="tik-tok">
                        <button class="btn custom-btn mr-2">TIK - TOK</button>
                        <button class="btn custom-btn">STEAMER</button>
                    </div>
                    <div class="name-action d-flex">
                        <div class="name-part">
                            <div class="name d-flex">
                                <h3>John Doe</h3>
                                <h5 class="my-auto ml-3">@pakmiyong</h5>
                            </div>
                            <div class="description">
                                <p>I’m dance studio teacher with millions of views on TikTok. 50% of fees will go to dog charities</p>
                            </div>
                        </div>
                        <div class="action-part d-flex">
                            <button type="button" class="btn custom-btn mr-2 active">Join Fandom</button>
                            <button type="button" class="btn custom-btn" id="new-request">Reqeuest - $190</button>
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
                            <span>3.7k Fans</span>
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
                <div class="idol-image">
                    <img src="{{ asset('assets/images/actor1.png') }}" class='img-circle'>
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
            <button type="button" class="btn custom-btn w-100 mb-2 active">Join Fandom</button>
            <button type="button" class="btn custom-btn w-100" id="m-new-request">Reqeuest - $190</button>
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
            </div>
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

@endsection

@section('scripts')

<script>
$(document).ready(function() {

    $(document).on('click', '.video-item', function() {
        var videoSrc = $(this).data('src');
        $("#video").attr('src', videoSrc + "?autoplay=1&amp;modestbranding=1&amp;showinfo=0"); 
        $('#myModal').modal('toggle');
    })

    var show = false;
    $(document).on('click', '.how', function() {
        show = !show;
        if(show) {
            $('.how-work-view').removeClass('d-none');    
        } else {
            $('.how-work-view').addClass('d-none');
        }
    })

    $(document).on('click', '.close-btn', function() {
        $('.how-work-view').addClass('d-none');
    })

    $(document).on('click', '#new-request, #m-new-request', function() {
        console.log(123)
        location.href = "{{ route('new-request') }}";
    })
})
</script>
@endsection