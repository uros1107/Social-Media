@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

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
                <p class="text-white" style="font-size: 16px">Hi, John</p><br>
                <p class="text-white" style="font-size: 16px">Please make video for Melissa, Encourage her for her exam next month.</p>
                <p class="text-white" style="font-size: 16px">Thank you so much.</p><br>
                <p class="text-white" style="font-size: 16px">Regards</p>
                <p class="text-white" style="font-size: 16px">John Doe</p>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 payment-next">
        <div class="lang-preference mb-3">
            <div class="row m-0">
                <div class="col-12 title mb-2">
                    <div class="d-flex">
                        <h4 class="text-white">What doex next?</h4>
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
                            <p class="mb-0 text-white desc">John Doe has up to 7 days to complete your request</p>
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
                            <p class="mb-0 text-white desc">If John Doe is unable to complete the request, the $200 hold on your card will be removed between the next 5-7 Days</p>
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
                            <p class="mb-0">@johndoe</p>
                            <p class="text-main-color mb-0">John Doe</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0">Rating</p>
                            <p class="text-main-color mb-0">4.5/5</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0">Email</p>
                            <p class="text-main-color mb-0">johndoe@gmail.com</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0">Fans</p>
                            <p class="text-main-color mb-0">9.2k/Fans</p>
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
                        <h4 class="text-white">Transantion Detail</h4>
                    </div>
                </div>
                <div class="col-12 mb-2">
                    <div style="border: 1px solid #fff;border-radius: 10px;padding: 15px">
                        <h5 class="text-white">Method Payment</h5>
                        <div class="d-flex">
                            <img src="{{ asset('assets/images/master-card.png') }}">
                            <p class="text-main-color mb-0 ml-2">Mastercard</p>
                            <p class="ml-2 mb-0">***2423</p>
                        </div>
                    </div>
                </div>
                <div class="col-12 how-content transaction">
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white">Request Fee</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-white">$190</p>
                        </div>
                    </div>
                    <div class="content-item mb-3">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white">Platform Fee</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-white">$9.5</p>
                        </div>
                    </div>
                    <div class="content-item">
                        <div class="my-auto user-name">
                            <p class="mb-0 text-white" style="font-weight: 700;font-size:16px!important">Total</p>
                        </div>
                        <div class="m-auto user-rating" style="margin-right:0px!important">
                            <p class="mb-0 text-main-color" style="font-weight: 700;font-size:16px!important">$199.5</p>
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