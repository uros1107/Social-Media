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
        </div>
    </div>
</div>
<div class="row featured mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8 featured-video">
        <div class="title-part">
            <h2 class="text-white">New request from John Doe</h2>
            <p class="text-grey">Tell the Influencer what is your idea to make request video</p>
            <div class="divider mt-2 mb-4"></div>
        </div>
        <div class="who-is w-100 mb-3">
            <h4 class="text-white w-100">Who is this for?</h4>
            <div class="d-flex">
                <div class="col-12 col-sm-6 col-md-6 user-block d-flex">
                    <div class="first-block mr-2">
                        <img src="{{ asset('assets/images/icons/users.png') }}">
                        <div>
                            <span class="text-white">Someone else</span>
                        </div>
                    </div>
                    <div class="first-block deactive">
                        <img src="{{ asset('assets/images/icons/users.png') }}">
                        <div>
                            <span class="text-white">For me</span>
                        </div>
                    </div>
                </div>
                <div class="vertical-line desktop"></div>
                <div class="col-12 col-sm-6 col-md-6 to">
                    <div class="form-group" style="width: 80%">
                        <label for="usr" class="text-white">To:</label>
                        <input type="text" class="custom-input" id="usr">
                    </div>
                </div>
            </div>
        </div>
        <div class="divider mb-3"></div>
        <div class="who-is w-100 mb-4">
            <h4 class="text-white w-100">Select on Occasion</h4>
            <div class="row m-0 occasion">
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-1.png') }}">
                        <span class="text-white">None</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item active">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-2.png') }}">
                        <span class="text-white">Encouragement</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-3.png') }}">
                        <span class="text-white">Birthday</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-4.png') }}">
                        <span class="text-white">Gift</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-5.png') }}">
                        <span class="text-white">Advice</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-6.png') }}">
                        <span class="text-white">Congrats</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-7.png') }}">
                        <span class="text-white">Valentine’s</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-8.png') }}">
                        <span class="text-white">Other</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 featured-video">
        <div class="lang-preference">
            <div class="row m-0">
                <div class="col-12 title">
                    <div class="d-flex">
                        <h4 class="text-white">Language Preference</h4>
                    </div>
                    <p class="mb-0">Your idol will use the language you choose here</p>
                </div>
                <div class="col-12 how-content">
                    <form action="{{ route('payment') }}" method="POST">
                        {{ csrf_field() }}
                        <div class="language-setting mb-3">
                            <ul>
                                <li>
                                    <input type="radio" id="f-option" name="selector" checked>
                                    <label for="f-option">Engilsh</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    <input type="radio" id="s-option" name="selector">
                                    <label for="s-option">Korean</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                                <li>
                                    <input type="radio" id="t-option" name="selector">
                                    <label for="t-option">Mix</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                            </ul>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="form-group">
                            <label for="comment" class="text-white" style="font-size: 18px">Introduction</label>
                            <textarea class="form-control introduction" rows="5" id="comment" placeholder="Tell your idol what they want to say on the video"></textarea>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="submit">
                            <button type="submit" class="btn custom-btn w-100" style="font-size: 14px">Continue</button>
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
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if($(this).hasClass('active')) {
            $(this).removeClass('active');
        } else {
            $(this).addClass('active');
        }
    });
    $(document).on('click', '.first-block', function() {
        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.first-block').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
    });
});
</script>
@endsection