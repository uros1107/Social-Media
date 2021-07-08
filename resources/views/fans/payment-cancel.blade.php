@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    /* padding: 0px!important; */
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
.sidebar {
    display: none;
}
.main {
    margin-left: 0px!important;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
}
</style>
@endsection

@section('content')
<div class="row follow-idol mb-4">
    <div class="w-100">
        <img class="bg-img w-100" src="{{ asset('assets/images/payment-bg.png') }}" class="w-100">
    </div>
    <div class="col-12 col-sm-12 col-md-12 image-text text-center">
        <img src="{{ asset('assets/images/cancel.png') }}" class="mb-2">
        <h3 class="text-white mb-2">Your order is canceled!</h3>
        <p class="text-white mb-2">Your idol cancelled your order, Your payment will be refunded.</p>
        <button type="button" class="btn custom-btn">Go To My Orders</button>
    </div>
</div>
<div class="row featured payment-success mb-5 m-0">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="row m-0 mb-4">
            <div class="w-40">
                <div class="title-part">
                    <h2 class="text-white">Let Get Know Each Other</h2>
                    <p class="text-grey mb-0">Tell us which categories you love so we can recommend you which idols you like</p>
                </div>
            </div>
            <div class="w-60 d-flex image-item-list">
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person1.png') }}">
                    <span class="ml-2 text-white">Actors</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person2.png') }}">
                    <span class="ml-2 text-white">TV Host</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person3.png') }}">
                    <span class="ml-2 text-white">KPOP</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person1.png') }}">
                    <span class="ml-2 text-white">Musicians</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person2.png') }}">
                    <span class="ml-2 text-white">Comedians</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person3.png') }}">
                    <span class="ml-2 text-white">Models</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person1.png') }}">
                    <span class="ml-2 text-white">Youtubers</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0">
                    <img src="{{ asset('assets/images/person/person2.png') }}">
                    <span class="ml-2 text-white">All categories</span>
                </div>
                <div class="col-6 col-sm-4 col-md-4 mb-3 p-0 save-btn">
                    <button type="button" class="btn custom-btn">Save</button>
                </div>
            </div>
        </div>
        <div class="title-part">
            <div class="w-100">
                <h2 class="text-white">Order Confirmation</h2>
                <p class="text-grey">Please check your order</p>
                <div class="divider"></div>
            </div>
            <div class="row mx-0 mb-5">
                @php
                    $fans =  DB::table('users')->where('id', $order['order_fans_id'])->first();
                @endphp
                <div class="col-sm-6 col-md-6 col-6">
                    <div class="order-confirm-profile">
                        <h4 class="text-white">Requested from</h4>
                        <div class="d-flex">
                            @if($fans->photo)
                            <img class="img-circle mr-3" src="{{ asset('assets/images/img/'.$fans->photo) }}">
                            @else
                            <img class="img-circle mr-3" src="{{ asset('assets/images/no-image.jpg') }}">
                            @endif
                            <div class="profile-detail mt-1">
                                <p class="text-grey mb-2">{{ '@'.$fans->user_name }}</p>
                                <p class="text-main-color mb-0">{{ $fans->name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-6">
                    <div class="order-confirm-profile">
                        <h4 class="text-white">Occasion</h4>
                        <div class="d-flex">
                            @php
                                $occasion = DB::table('occasions')->where('occasion_id', $order['order_occasion'])->first();
                            @endphp
                            <div class="profile-detail mt-1">
                                <p class="text-grey mb-2">Occasion Type</p>
                                <p class="text-main-color mb-0">{{ $occasion->occasion_name }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-6">
                    <div class="order-confirm-profile pt-0">
                        <h4 class="text-white">For who?</h4>
                        <div class="d-flex">
                            <div class="profile-detail mt-1">
                                <p class="text-grey mb-2">{{ $order['order_who_for'] == 1? 'For me' : 'Someone else' }}</p>
                                <p class="text-main-color mb-0">{{ $order['order_to'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-6 col-6">
                    <div class="order-confirm-profile pt-0">
                        <h4 class="text-white">Language </h4>
                        <div class="d-flex">
                            <div class="profile-detail mt-1">
                                <p class="text-grey mb-2">Language request for this personalized video</p>
                                @if($order['order_lang'] == 1)
                                <p class="text-main-color mb-0">English</p>
                                @elseif($order['order_lang'] == 2)
                                <p class="text-main-color mb-0">Korean</p>
                                @else
                                <p class="text-main-color mb-0">Mix(English and Korean)</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Your personalized video request detail</h2>
                <p class="text-grey">This is your detail request</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">27 May 2021</p>
            </div>
        </div>
        <div class="w-100">
            <div class="instruction">
                <h5 class="text-white">Instruction</h5>
                <br>
                <p style="font-size: 16px;color:#898989">Here is the instruction from you for your idols</p><br>
                <p class="text-white" style="font-size: 16px">
                    {{ $order['order_introduction'] }}
                </p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">What does next?</h4>
                    </div>
                </div>
                <div class="col-12 how-content">
                    <div class="content-item mb-3">
                        <div class="bg-circle">
                            <img src="{{ asset('assets/images/icons/send.png') }}">
                        </div>
                        <div class="ml-3 my-auto">
                            <p class="mb-0 text-white desc">Check for a confirmation email</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="bg-circle">
                            <img src="{{ asset('assets/images/icons/fill-calendar.png') }}">
                        </div>
                        <div class="ml-3 my-auto">
                            <p class="mb-0 text-white desc">{{ $idol_info->idol_full_name }} has up to 7 days to complete your request</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="bg-circle">
                            <img src="{{ asset('assets/images/icons/message.png') }}">
                        </div>
                        <div class="ml-3 my-auto">
                            <p class="mb-0 text-white desc">When your request has been completed, an email will be sent to your inbox</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="bg-circle">
                            <img src="{{ asset('assets/images/icons/paper-upload.png') }}">
                        </div>
                        <div class="ml-3 my-auto">
                            <p class="mb-0 text-white desc">If {{ $idol_info->idol_full_name }} is unable to complete the request, the $200 hold on your card will be removed between the next 5-7 Days</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">Idols</h4>
                    </div>
                </div>
                <div class="col-12 how-content">
                    <div class="content-item mb-3">
                        <div class="user-img">
                            <img src="{{ asset('assets/images/actor1.png') }}" class="img-circle">
                        </div>
                        <div class="ml-3 my-auto user-name">
                            <p class="mb-0">{{ '@'.$idol_info->idol_user_name }}</p>
                            <p class="text-main-color mb-0">{{ $idol_info->idol_full_name }}</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0">Rating</p>
                            <p class="text-main-color mb-0">{{ $idol_info->idol_rating }}/5</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0">Email</p>
                            <p class="text-main-color mb-0">{{ $idol_info->idol_email }}</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0">Fans</p>
                            <p class="text-main-color mb-0">{{ $idol_info->idol_fans }}/Fans</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="my-auto user-name">
                            <p class="mb-0">Country</p>
                            <p class="text-main-color mb-0">Singapore</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="lang-preference">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">Transaction Detail</h4>
                    </div>
                </div>
                @if($order['order_payment_method'] == 2)
                <div class="col-12 mb-2">
                    <div style="border: 1px solid #fff;border-radius: 10px;padding: 15px">
                        <h5 class="text-white">Payment Method</h5>
                        <div class="d-flex">
                            <img src="{{ asset('assets/images/master-card.png') }}">
                            <p class="text-main-color mb-0 ml-2">Mastercard</p>
                            <p class="ml-2 mb-0">***2423</p>
                        </div>
                    </div>
                </div>
                @else
                <div class="col-12 mb-2">
                    <div style="border: 1px solid #fff;border-radius: 10px;padding: 15px">
                        <h5 class="text-white">Payment Method</h5>
                        <div class="d-flex">
                            <p class="text-main-color mb-0 ml-2">Visa</p>
                            <p class="ml-2 mb-0">***2423</p>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12 how-content transaction">
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white">Request Fee</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-white">${{ $order['order_price'] }}</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white">Platform Fee</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-white">${{ $order['order_fee'] }}</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white" style="font-weight: 700;font-size:16px!important">Total</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-main-color" style="font-weight: 700;font-size:16px!important">${{ $order['order_total_price'] }}</p>
                        </div>
                    </div>
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