@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

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
</style>
@endsection

@section('content')
<div class="row featured mb-5 m-0 mt-3">
    <div class="col-12 col-sm-8 col-md-8 featured-video">
        <div class="title-part">
            <h2 class="text-white">Payment Info</h2>
            <p class="text-grey">Tell your idol what is your idea to make request video</p>
            <div class="divider mt-2 mb-4"></div>
        </div>
        <div class="who-is w-100 mb-3">
            <h4 class="text-white w-100">Method Payment</h4>
            <div class="d-flex payment-method">
                <div class="col-12 col-sm-12 col-md-12 user-block d-flex">
                    <div class="first-block mr-2">
                        <div>
                            <span class="text-white">Credit Card / Debit Card</span>
                        </div>
                    </div>
                    <div class="first-block deactive">
                        <div>
                            <span class="text-white">Paypal</span>
                        </div>
                    </div>
                </div>
            </div>
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
                <div class="col-12 col-md-6">
                    <div class="occasion-item">
                        <img class="mr-2 ml-1" src="{{ asset('assets/images/master-card.png') }}">
                        <span class="text-white">Mastercard</span>
                        <img class="mr-2 ml-1 delete" src="{{ asset('assets/images/icons/delete.png') }}">
                        <div class="card-number mt-2 ml-2">
                            <span class="text-white">***1234</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="occasion-item active">
                        <span class="text-white">VISA</span>
                        <img class="mr-2 ml-1 delete" src="{{ asset('assets/images/icons/delete.png') }}">
                        <div class="card-number mt-2 ml-2">
                            <span class="text-white">***1234</span>
                        </div>
                    </div>
                </div>
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
                            <h5 class="text-white">$190</h5>
                        </div>
                        <div class="d-flex" style="position: relative">
                            <h5 class="text-white">Platform Fee(5%)</h5>
                            <h5 class="text-white">$9,5</h5>
                        </div>
                    </div>
                    <div class="divider mb-3 ml-0" style="width:100%!important"></div>
                    <div class="d-flex mb-2 total">
                        <h5 class="text-white">Total</h5>
                        <h5 class="text-main-color">$190</h5>
                    </div>
                    <div class="divider mb-3"></div>
                    <div class="submit">
                        <button type="button" class="btn custom-btn w-100" id="book_now" style="font-size: 14px">Book Now -
                            $46</button>
                    </div>
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
                    <form action="#">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="well">
                                        <div class="card" style="border-width: 0px">
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
                                                <div class="form-group">
                                                    <label class="text-white">Name</label>
                                                    <input type="text" name="name" class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <label class="text-white">Credit Card Number </label>
                                                    <input type="text" name="number" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-left: 0px;margin-right:0px">
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-white">Expiration</label>
                                                    <input type="text" placeholder="MM/YY" name="expiry"
                                                        class="form-control" />
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group">
                                                    <label class="text-white">CVV </label>
                                                    <input type="text" name="cvv" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row-fluid mb-3">
                                            <div class="col-sm-12 text-right">
                                                <button type="button" class="btn custom-btn w-100" style="border-radius: 15px!important">Save Card</button>
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/card/1.3.1/js/card.min.js"></script>

<script>
$(document).ready(function() {
    $(document).on('click', '.occasion-item', function() {
        if (!$(this).hasClass('active')) {
            $(this).addClass('active');

            $('.occasion-item').not(this).each(function() {
                $(this).removeClass('active');
            });
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

    $(document).on('click', '.delete', function() {
        $(this).parent().hide();
    });

    $(document).on('click', '.add-card', function() {
        $('#myModal').modal('toggle');
    })

    $(document).on('click', '#book_now', function() {
        location.href = "{{ route('payment-success') }}";
    })

    new Card({
        form: 'form',
        container: '.card',
        formSelectors: {
            numberInput: 'input[name=number]',
            expiryInput: 'input[name=expiry]',
            cvcInput: 'input[name=cvv]',
            nameInput: 'input[name=name]'
        },

        width: 390, // optional — default 350px
        formatting: true,

        placeholders: {
            number: '•••• •••• •••• ••••',
            name: 'Full Name',
            expiry: '••/••',
            cvc: '•••'
        }
    })
});
</script>
@endsection