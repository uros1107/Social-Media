@extends('layouts.fans')

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
.custom-breadcrumb {
    position: absolute;
    top: 30px;
    left: 30px;
    background: transparent;
}
.user-profile-info {
    margin-top: -170px;
}
@media (max-width: 574px) {
    .featured {
        padding: 0px 10px!important;
    }
    .someone {
        display: block!important;
    }
    .someone .form-group {
        width: 100%!important;
    }
    .user-profile-info {
        margin-top: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol mb-4 m-0">
    <div class="desktop w-100">
        @php
            $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
            $idol_request = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
            $cats = json_decode($idol_info->idol_cat_id);
        @endphp
        <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
        <div class="custom-breadcrumb">
            <a href="#" class="text-white" style="font-weight: 700">New Request / </a>
        </div>
        <div class="gradient"></div>
        <div class="col-12 col-sm-12 col-md-12" style="margin-top:-87px">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="display: contents;">
                    <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
                </div>
                <div class="idol-information">
                    <div class="d-flex">
                        @foreach($cats as $cat)
                        @php
                        $cat = DB::table('categories')->where('cat_id', $cat)->first();
                        @endphp
                        <div class="tik-tok mr-2">
                            <button class="btn custom-btn" onclick='goto_category("{{ route('idol-category-get', $cat->cat_name) }}")'>{{ $cat->cat_name }}</button>
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
                            @if(!Auth::check())
                            <button type="button" class="btn custom-btn mr-2 active join-fandom" data-id="{{ $idol->id }}" style="width: 160px">Follow</button>
                            @else
                            @php
                                $user = DB::table('users')->where('id', Auth::user()->id)->first();
                                $has = !$user->fandom_lists? '': in_array($idol->id, json_decode($user->fandom_lists));
                            @endphp
                            <button type="button" class="btn custom-btn mr-2 {{ $has ? '' : 'active' }} join-fandom" data-id="{{ $idol->id }}" style="width: 160px">
                                @if($has)
                                <i class='fas fa-check mr-2' style='font-size:16px'></i>
                                @endif
                                Following
                            </button>
                            @endif
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
                        <!-- <div class="day">
                            <img src="{{ asset('assets/images/icons/clock.png') }}" class="mr-2">
                            <span>Typically responds in 3 days</span>
                        </div> -->
                        <div class="how" style="z-index:10">
                            <div class="text-right">
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
            </div>
        </div>
    </div>
    <div class="mobile w-100">
        <div style="position:relative">
            <img class="bg-img w-100" src="{{ asset('assets/images/img/'.$idol_info->idol_banner) }}" class="w-100">
            <div class="gradient"></div>
        </div>
        <div class="custom-breadcrumb">
            <a href="#" class="text-white" style="font-weight: 700">New Request / </a>
        </div>
        <div class="col-12 col-sm-12 col-md-12 user-profile-info">
            <div class="idol-profile d-flex">
                <div class="idol-image" style="display: contents;">
                    <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class='img-circle'>
                </div>
                <div class="ml-3">
                    <h5 class="text-white mt-2">{{ '@'.$idol_info->idol_user_name }}</h5>
                    <h3 class="text-white">{{ $idol_info->idol_full_name }}</h3>
                    <div class="d-flex" style="flex-wrap: wrap;">
                        @foreach($cats as $cat)
                        @php
                        $cat = DB::table('categories')->where('cat_id', $cat)->first();
                        @endphp
                        <div class="tik-tok mr-2 mb-2">
                            <button class="btn custom-btn" onclick='goto_category("{{ route('idol-category-get', $cat->cat_name) }}")'>{{ $cat->cat_name }}</button>
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
                <div class="col-6 p-0 text-center">
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                    </div>
                    <span class="text-white">Rating</span>
                </div>
                <div class="col-6 p-0 text-center">
                    <div class="fans">
                        <img src="{{ asset('assets/images/icons/heart-dot.png') }}" class="mr-2">
                    </div>
                    <span class="text-white">{{ $idol_info->idol_fans }} Fans</span>
                </div>
                <!-- <div class="col-4 p-0 text-center">
                    <div class="day">
                        <img src="{{ asset('assets/images/icons/clock.png') }}" class="mr-2">
                    </div>
                    <span class="text-white">Responds in 3 days</span>
                </div> -->
            </div>
        </div>
        <div class="col-12 mt-3">
            @if(!Auth::check())
            <button type="button" class="btn custom-btn w-100 mb-2 active join-fandom" data-id="{{ $idol->id }}">Follow</button>
            @else
            @php
                $user = DB::table('users')->where('id', Auth::user()->id)->first();
                $has = !$user->fandom_lists? '': in_array($idol->id, json_decode($user->fandom_lists));
            @endphp
            <button type="button" class="btn custom-btn w-100 mb-2 {{ $has ? '' : 'active' }} join-fandom" data-id="{{ $idol->id }}">
                @if($has)
                <i class='fas fa-check mr-2' style='font-size:16px'></i>
                @endif
                Following
            </button>
            @endif
        </div>
    </div>
</div>
<div class="row featured mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8 featured-video">
        <div class="title-part">
            <h2 class="text-white">New request from {{ Auth::user()->name }}</h2>
            <p class="text-grey">Let your Idol know what you want them to say in their personalized video to you or your friends</p>
            <div class="divider mt-2 mb-4"></div>
        </div>
        <div class="who-is w-100 mb-3">
            <h4 class="text-white w-100">Who is this for?</h4>
            <div class="d-flex someone">
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
            <h4 class="text-white w-100">Select an Occasion</h4>
            <div class="row m-0 occasion">
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="8">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-1.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion1.png') }}">
                        <span class="text-white">None</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="1">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-2.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion2.png') }}">
                        <span class="text-white">Encouragement</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="2">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-3.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion3.png') }}">
                        <span class="text-white">Birthday</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="3">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-4.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion4.png') }}">
                        <span class="text-white">Gift</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="4">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-5.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion5.png') }}">
                        <span class="text-white">Advice</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="5">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-6.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion6.png') }}">
                        <span class="text-white">Congratulations</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="6">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-7.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion7.png') }}">
                        <span class="text-white">Valentine’s</span>
                    </div>
                </div>
                <div class="col-6 col-md-6">
                    <div class="occasion-item" data-id="7">
                        <img class="mr-2 ml-1 grey-img" src="{{ asset('assets/images/icons/g-8.png') }}">
                        <img class="mr-2 ml-1 white-img d-none" src="{{ asset('assets/images/icons/occasion8.png') }}">
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
                                    <label for="f-option">English</label>
                                    <div class="check"></div>
                                </li>
                                <li>
                                    <input type="radio" id="s-option" name="order_lang" value="2">
                                    <label for="s-option">Korean</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                                <li>
                                    <input type="radio" id="t-option" name="order_lang" value="3">
                                    <label for="t-option">Both</label>
                                    <div class="check"><div class="inside"></div></div>
                                </li>
                            </ul>
                        </div>
                        <div class="divider mb-3"></div>
                        <div class="form-group">
                            <label for="comment" class="text-white" style="font-size: 18px">Instructions</label>
                            <textarea class="form-control introduction text-white" name="order_introduction" rows="5" id="comment" placeholder="Hi! My friend Ashley is a super-fan of yours and she’s been following you for years. Could you surprise her by wishing her Happy Birthday?"></textarea>
                            <p class="text-main-color text-right mt-1 limit-message d-none" style="font-size: 12px">You can input maximun 250 characters!</p>
                            <p class="text-white text-right mb-0 mr-2 word-count mt-1 d-none" style="font-size: 12px">Characters: <span>250</span></p>
                        </div>
                        <input type="hidden" name="order_occasion" id="occasion" value="">
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
function goto_category(url) {
    location.href = url;
}
$(document).ready(function() {
    $(document).on('click', '.idol-image', function() {
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
    })

    $(document).on('click', '.close-btn', function() {
        $('.how-work-view').addClass('d-none');
    })

    $(document).on('click', '.occasion-item', function() {
        $('#occasion').val($(this).data('id'));
        if(!$(this).hasClass('active')) {
            $(this).addClass('active');
            $(this).find('.grey-img').addClass('d-none');
            $(this).find('.white-img').removeClass('d-none');
        }
        $('.occasion-item').not(this).each(function(){
            $(this).removeClass('active');
            $(this).find('.grey-img').removeClass('d-none');
            $(this).find('.white-img').addClass('d-none');
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

    var word_limit = true;
    $("#comment").on('keyup', function() {
        var words = 250 - $(this).val().length;

        // if ((this.value.match(/\S+/g)) != null) {
        //     words = this.value.match(/\S+/g).length;
        // }

        if (words < 0) {
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

    $(document).on('click', '.continue-btn', function(e) {
        if(!$('#comment').val() || !$('.to-input').val() || !$('#occasion').val()) {
            toastr.error('You should input all fields!');
        } else if(!word_limit) {
            toastr.error('You can input maximun 250 characters!');
        } else {
            $('#continue').submit();
        }
    })
    $(document).on('click', '.join-fandom', function() {
        var id = $(this).data('id');

        @if(!Auth::check())
            location.href = "{{ route('fans-signin') }}";
        @else
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
                        toastr.success('Successfully added!');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    } else if(res['status'] == 2) {
                        toastr.success('Successfully removed!');
                        setTimeout(() => {
                            location.reload();
                        }, 1000);
                    }
                },
                error: function (error) {
                    toastr.error(error);
                }
            });
        @endif
    });
});
</script>
@endsection