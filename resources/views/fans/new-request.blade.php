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
        @php
            $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
            $idol_request = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
        @endphp
        <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image">
                    <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
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
                            <span>{{ $idol_info->idol_fans }} Fans</span>
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
                    <h5 class="text-white mt-2">{{ '@'.$idol_info->idol_user_name }}</h5>
                    <h3 class="text-white">{{ $idol_info->idol_full_name }}</h3>
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
                    <span class="text-white">{{ $idol_info->idol_fans }} Fans</span>
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
            <h2 class="text-white">New request from {{ Auth::user()->name }}</h2>
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
                        <input type="text" class="custom-input to-input">
                    </div>
                </div>
            </div>
        </div>
        <div class="divider mb-3"></div>
        <div class="who-is w-100 mb-4">
            <h4 class="text-white w-100">Select on Occasion</h4>
            <div class="row m-0 occasion">
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="8">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-1.png') }}">
                        <span class="text-white">None</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item active" data-id="1">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-2.png') }}">
                        <span class="text-white">Encouragement</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="2">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-3.png') }}">
                        <span class="text-white">Birthday</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="3">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-4.png') }}">
                        <span class="text-white">Gift</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="4">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-5.png') }}">
                        <span class="text-white">Advice</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="5">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-6.png') }}">
                        <span class="text-white">Congrats</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="6">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/icons/g-7.png') }}">
                        <span class="text-white">Valentine’s</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="7">
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
                    <form action="{{ route('payment') }}" method="POST" id="continue">
                        {{ csrf_field() }}
                        <div class="language-setting mb-3">
                            <ul>
                                <li>
                                    <input type="radio" id="f-option" name="order_lang" value="1" checked>
                                    <label for="f-option">Engilsh</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    <input type="radio" id="s-option" name="order_lang" value="2">
                                    <label for="s-option">Korean</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                                <li>
                                    <input type="radio" id="t-option" name="order_lang" value="3">
                                    <label for="t-option">Mix</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                            </ul>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="form-group">
                            <label for="comment" class="text-white" style="font-size: 18px">Introduction</label>
                            <textarea class="form-control introduction text-white" name="order_introduction" rows="5" id="comment" placeholder="Tell your idol what they want to say on the video"></textarea>
                        </div>
                        <input type="hidden" name="order_occasion" id="occasion" value="1">
                        <input type="hidden" name="order_who_for" id="who_for" value="2">
                        <input type="hidden" name="order_to" id="to" value="">
                        <input type="hidden" name="order_idol_id" value="{{ $idol->id }}">
                        <div class="divider mb-3"></div>
                        <div class="submit">
                            <button type="button" class="btn custom-btn w-100 continue-btn" style="font-size: 14px">Continue</button>
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
        $('#occasion').val($(this).data('id'));
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
        }
        $('.occasion-item').not(this).each(function(){
            $(this).removeClass('active');
        });
    });
    $(document).on('click', '.first-block', function() {
        if($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            if($('#who_for').val() == 2) {
                $('#who_for').val(1);
            } else {
                $('#who_for').val(2);
            }
            $('.first-block').not(this).each(function(){
                $(this).addClass('deactive');
            });
        }
    });
    $(document).on('change', '.to-input', function() {
        $('#to').val($(this).val());
    });
    $(document).on('click', '.continue-btn', function(e) {
        if(!$('#comment').val() || !$('.to-input').val()) {
            toastr.error('You should input all fields!');
        } else {
            $('#continue').submit();
        }
    })
});
</script>
@endsection