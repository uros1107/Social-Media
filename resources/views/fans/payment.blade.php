@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    padding: 0px !important;
}
.modal-dialog {
    max-width: 450px;
    min-width: 320px;
    margin: 30px auto;
}
.modal-body {
    position: relative;
    padding: 0px;
}
.close {
    position: absolute;
    right: -30px;
    top: 0;
    z-index: 999;
    font-size: 2rem;
    font-weight: normal;
    color: #fff;
    opacity: 1;
}
.featured .featured-video {
    padding: 0px 25px;
}
#myModal {
    top: 10%;
    padding-left: 0px!important;
}
.modal-backdrop {
    background-color: #FF335C;
}
.modal-content, .embed-responsive-16by9 {
    border-radius: 10px;
}
.embed-responsive-16by9::before {
    padding-top: 0px;
}
.card, .well {
    background: #000;
    padding: 15px;
    margin-bottom: 0px!important;
}
.jp-card.jp-card-visa.jp-card-identified .jp-card-front:before, 
.jp-card.jp-card-visa.jp-card-identified .jp-card-back:before,
.jp-card .jp-card-front {
    background-color: #898989!important;
}
.alert-unsuccess {
    color: #FF335C;
    background-color: #424242;
    border-color: #424242;
}
.featured-video .payment-method {
    background: #171717;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
    .featured .featured-video {
        padding: 0px;
    }
}
</style>
@endsection

@section('content')
<div class="row featured mb-5 m-0 mt-3">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', $idol_id)->first();
        $request_video = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
    @endphp
    <div class="col-12 col-sm-12 col-md-12 featured-video payment-success">
        <div class="custom-breadcrumb mb-2">
            <a href="{{ route('new-request').'?id='.$idol_id }}" class="text-white" style="font-weight: 700">New Request / </a>
            <a href="#" class="text-white" style="font-weight: 700">Payment</a>
        </div>
        <div class="title-part">
            <div class="w-100">
                <h2 class="text-white">Order Confirmation</h2>
                <p class="text-grey">Please check your order</p>
                <div class="divider"></div>
            </div>
            <div class="row mx-0 mb-1">
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
                                <p class="text-main-color mb-0">Both(English and Korean)</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- <div class="title-part d-flex">
            <div>
                <h2 class="text-white">Your personalized video request detail</h2>
                <p class="text-grey">This is your detail request</p>
            </div>
            <div class="m-auto" style="margin-right: 0px!important">
                <p class="mb-0" style="font-size: 16px;color:#898989">27 May 2021</p>
            </div>
        </div> -->
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
        <div class="title-part mt-3">
            <h2 class="text-white">Payment Info</h2>
            <div class="divider mb-2"></div>
        </div>
        <div class="pb-0">
            <div class="row m-0 mt-4" style="justify-content: center">
                <div class="col-12 how-content" style="max-width: 750px;">
                    <div class="payment-info mb-2">
                        <div class="d-flex" style="position: relative">
                            <h5 class="text-white">Request Fee</h5>
                            <h5 class="text-white">${{ $request_video->request_video_price }}</h5>
                        </div>
                        <div class="d-flex" style="position: relative">
                            <h5 class="text-white">Platform Fee(5%)</h5>
                            <h5 class="text-white">${{ number_format($request_video->request_video_price * 0.05, 2) }}</h5>
                        </div>
                    </div>
                    <div class="d-flex mb-2 total">
                        <h5 class="text-white">Total</h5>
                        <h5 class="text-main-color">${{ number_format($request_video->request_video_price + $request_video->request_video_price * 0.05, 2) }}</h5>
                    </div>
                    <form action="{{ route('order-summary') }}" class="d-none" method="post" id="order-summary">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_payment_method" id="payment_method" value="">
                        <input type="hidden" name="order_total_price" id="order_total_price" value="{{ $request_video->request_video_price + $request_video->request_video_price * 0.05 }}">
                        <input type="hidden" name="order_price"value="{{ $request_video->request_video_price }}">
                        <input type="hidden" name="order_fee" value="{{ $request_video->request_video_price * 0.05 }}">
                        <div class="submit">
                            <button type="button" class="btn custom-btn w-100" id="book_now" style="font-size: 16px">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="who-is w-100 mb-3">
            <div class="d-flex payment-method">
                <div class="col-12 col-sm-12 col-md-12 user-block d-flex">
                    <div id="paypal-button-container" class="w-100 p-4 text-center"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="col-12 col-sm-4 col-md-4 featured-video">
        <div class="lang-preference pb-0">
            <div class="row m-0 mb-3">
                <div class="col-12 title">
                    <div class="d-flex">
                        <h4 class="text-white">Summary</h4>
                    </div>
                    <p class="mb-0">Your detail payment</p>
                </div>
                <div class="col-12 how-content">
                    <div class="divider mb-3"></div>
                    <div class="payment-info mb-2">
                        <div class="d-flex" style="position: relative">
                            <h5 class="text-white">Request Fee</h5>
                            <h5 class="text-white">${{ $request_video->request_video_price }}</h5>
                        </div>
                        <div class="d-flex" style="position: relative">
                            <h5 class="text-white">Platform Fee(5%)</h5>
                            <h5 class="text-white">${{ number_format($request_video->request_video_price * 0.05, 2) }}</h5>
                        </div>
                    </div>
                    <div class="divider mb-3 ml-0" style="width:100%!important"></div>
                    <div class="d-flex mb-2 total">
                        <h5 class="text-white">Total</h5>
                        <h5 class="text-main-color">${{ number_format($request_video->request_video_price + $request_video->request_video_price * 0.05, 2) }}</h5>
                    </div>
                    <div class="divider mb-3"></div>
                    <form action="{{ route('order-summary') }}" method="post" id="order-summary">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_payment_method" id="payment_method" value="">
                        <input type="hidden" name="order_total_price" id="order_total_price" value="{{ $request_video->request_video_price + $request_video->request_video_price * 0.05 }}">
                        <input type="hidden" name="order_price"value="{{ $request_video->request_video_price }}">
                        <input type="hidden" name="order_fee" value="{{ $request_video->request_video_price * 0.05 }}">
                        <div class="submit">
                            <button type="button" class="btn custom-btn w-100" id="book_now" style="font-size: 16px">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="standard-delivery">
                <span>Standard delivery from 3-7 days</span>
            </div>
        </div>
    </div> -->
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('assets/js/card.js') }}"></script>
<script
    src="https://www.paypal.com/sdk/js?client-id=AebDV6DljLVnoJwImUC4fxxsppb_7_LFupktKrw37RcUnMyJLdzgytpd6LA6CKdXiVS9ToqMUr62wovp"> // Required. Replace YOUR_CLIENT_ID with your sandbox client ID.
</script>

<script>
  paypal.Buttons({
    createOrder: function(data, actions) {
      // This function sets up the details of the transaction, including the amount and line item details.
      return actions.order.create({
        purchase_units: [{
          amount: {
            value: $('#order_total_price').val()
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        toastr.success('Transaction completed by ' + details.payer.name.given_name);
        $('#payment_method').val(1);
        $('#order-summary').submit();
      });
    },
    onError: function (err) {
        // For example, redirect to a specific error page
        toastr.error(err);
        $('#payment_method').val(0);
        $('#order-summary').submit();
    }
  }).render('#paypal-button-container');
  //This function displays Smart Payment Buttons on your web page.
</script>
<script>
function stripeResponseHandler(status, response) {
    if (response.error) {
        $('.error')
            .removeClass('d-none')
            .text(response.error.message);
        $('.save-card').html("Save Card");
        $('.save-card').prop('disabled', false);
    } else {
        var token = response['id'];
        
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: "{{ route('card-save') }}",
            method: 'POST',
            data: {
                stripe_token: token,
                card_type: $('#card_type').val()
            },
            success: function (res) {
                if(res.success) {
                    toastr.success('Successfully added!');
                    $('.save-card').html("Save Card");
                    $('.save-card').prop('disabled', false);
                    setTimeout(() => {
                        location.reload();
                    }, 1000);
                } else {
                    toastr.error('Server error! Please try again later!');
                    $('.save-card').html("Save Card");
                    $('.save-card').prop('disabled', false);
                }
            },
            error: function (error) {
                toastr.error('Server error');
                $('.save-card').html("Save Card");
                $('.save-card').prop('disabled', false);
            }
        });
    }
}
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');

            $('.occasion-item').not(this).each(function() {
                $(this).removeClass('active');
            });

            $('#payment_method').val($(this).data('id'));
        }
    });

    $(document).on('click', '.first-block', function() {
        if ($(this).hasClass('deactive')) {
            $(this).removeClass('deactive');
            $('.first-block').not(this).each(function() {
                $(this).addClass('deactive');
            });
        }
    });

    $(document).on('submit', '#card', function(e) {
        e.preventDefault();

        if(!$('#name').val() || !$('#number').val() || !$('#name').val() || !$('#expiry').val() || !$('#cvc').val()) {
            toastr.error('You should fill all fields!');
        } else {
            if($('#number').val()[0] == 4) {
                $('#card_type').val(1); // visa
            } else {
                $('#card_type').val(2); // master
            }

            $('.save-card').html("Adding Card...");
            $('.save-card').prop('disabled', true);

            let expiry = $('#expiry').val().split(" / ");
            Stripe.setPublishableKey($(this).data('stripe-publishable-key'));
            Stripe.createToken({
                number: $('#number').val(),
                cvc: $('#cvc').val(),
                exp_month: expiry[0],
                exp_year: expiry[1]
            }, stripeResponseHandler);
        }
    })

    $(document).on('click', '.paypal-btn', function() {
        $('#payModal').modal('toggle');
    });

    $(document).on('click', '#book_now', function() {
        if(!$('#payment_method').val()) {
            toastr.error('Please pay with Paypal!');
        } else {
            $('#order-summary').submit();
        }
    })

    $(document).on('click', '.delete', function() {
        $(this).parent().hide();
    });

    $(document).on('click', '.add-card', function() {
        $('#myModal').modal('toggle');
    })
});
</script>
@endsection