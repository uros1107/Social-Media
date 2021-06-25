@extends('layouts.fans')

@section('title', 'Welcome to MILLIONK')

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
    padding: 0px 45px;
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
    background: #2B2B2B;
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
<div class="row featured mb-5 m-0 mt-3">
    @php
        $idol_info = DB::table('idol_info')->where('idol_user_id', $idol_id)->first();
        $request_video = DB::table('video_request')->where('request_idol_id', $idol_info->idol_id)->first();
    @endphp
    <div class="col-12 col-sm-8 col-md-8 featured-video">
        <div class="title-part">
            <h2 class="text-white">Payment Info</h2>
        </div>
        <div class="who-is w-100 mb-2 mt-4">
            <div class="d-flex">
                <h4 class="text-white w-50">Your card</h4>
                <div class="w-50 text-right mb-2">
                    <button type="button" class="btn custom-btn add-card"><i class='fa fa-plus text-main-color mr-2'
                            style='font-size:14px'></i>Add new card</button>
                </div>
            </div>
            <div class="divider mb-2"></div>
            <div class="row m-0 occasion card-item">
                @if(Auth::user()->master_card_token)
                <div class="col-12 col-md-6">
                    <div class="occasion-item" data-id="2">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/master-card.png') }}">
                        <span class="text-white">Mastercard</span>
                        <img class="mr-2 ml-1 delete" src="{{ asset('assets/images/icons/delete.png') }}">
                        <div class="card-number mt-2 ml-2">
                            <span class="text-white">***1234</span>
                        </div>
                    </div>
                </div>
                @endif
                @if(Auth::user()->visa_card_token)
                <div class="col-12 col-md-6">
                    <div class="occasion-item" data-id="1">
                        <span class="text-white">VISA</span>
                        <img class="mr-2 ml-1 delete" src="{{ asset('assets/images/icons/delete.png') }}">
                        <div class="card-number mt-2 ml-2">
                            <span class="text-white">***1234</span>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 col-md-4 featured-video">
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
                            <h5 class="text-white">${{ $request_video->request_video_price * 0.05 }}</h5>
                        </div>
                    </div>
                    <div class="divider mb-3 ml-0" style="width:100%!important"></div>
                    <div class="d-flex mb-2 total">
                        <h5 class="text-white">Total</h5>
                        <h5 class="text-main-color">${{ $request_video->request_video_price + $request_video->request_video_price * 0.05 }}</h5>
                    </div>
                    <div class="divider mb-3"></div>
                    <form action="{{ route('order-summary') }}" method="post" id="order-summary">
                        {{ csrf_field() }}
                        <input type="hidden" name="order_payment_method" id="payment_method" value="">
                        <input type="hidden" name="order_total_price" value="{{ $request_video->request_video_price + $request_video->request_video_price * 0.05 }}">
                        <input type="hidden" name="order_price"value="{{ $request_video->request_video_price }}">
                        <input type="hidden" name="order_fee" value="{{ $request_video->request_video_price * 0.05 }}">
                        <div class="submit">
                            <button type="button" class="btn custom-btn w-100" id="book_now" style="font-size: 14px">Submit Request</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="standard-delivery">
                <span>Standard delivery from 3-7 days</span>
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
                    <form id="card" method="POST" data-stripe-publishable-key="{{ env('STRIPE_KEY') }}">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-12">
                                <div class="well">
                                    <div class="card-wrapper mt-3" style="border-width: 0px">
                                    </div>
                                    <br />
                                    <div class="row-fluid">
                                        <div class="col-sm-12">
                                            <h5 class="text-white" style="font-size: 12px">Fill card data</h5>
                                        </div>
                                        <div class="col-sm-12">
                                            <h4 class="text-white" style="font-size: 16px">Your new debit/credit card</h4>
                                        </div>
                                    </div>
                                    <div class="row-fluid">
                                        <div class="col-sm-12">
                                            <label class="pure-material-textfield-outlined w-100">
                                                <input type="text" name="name" id="name" placeholder="" value="">
                                                <span>Name</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-12">
                                            <label class="pure-material-textfield-outlined w-100">
                                                <input type="text" name="number" id="number" placeholder="" value="">
                                                <span>Credit Card Number</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="row" style="margin-left: 0px;margin-right:0px">
                                        <div class="col-sm-6">
                                            <label class="pure-material-textfield-outlined w-100">
                                                <input type="text" name="expiry" id="expiry" placeholder="" value="">
                                                <span>Expiration</span>
                                            </label>
                                        </div>
                                        <div class="col-sm-6">
                                            <label class="pure-material-textfield-outlined w-100">
                                                <input type="text" name="cvc" id="cvc" placeholder="" value="">
                                                <span>CVC</span>
                                            </label>
                                        </div>
                                        <div class="col-12 col-md-12 col-sm-12">
                                            <div class="alert error d-none alert-unsuccess" role="alert">
                                                {{ Session::get('unsuccess') }}
                                            </div>
                                        </div>
                                    </div>
                                    <input type="hidden" name="card_type" id="card_type" value="">
                                    <div class="row-fluid mb-3">
                                        <div class="col-sm-12 text-right">
                                            <button type="submit" class="btn custom-btn w-100 save-card" style="border-radius: 15px!important">Save Card</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script src="{{ asset('assets/js/card.js') }}"></script>

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

    $(document).on('click', '#book_now', function() {
        if(!$('#payment_method').val()) {
            toastr.error('Please choose your card!');
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