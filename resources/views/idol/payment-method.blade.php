@extends('layouts.idol')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.title h4 {
    font-size: 24px;
}
.title p {
    font-size: 15px;
    color: #898989!important;
}
.divider {
    width: 100%;
    height: 1px;
    background: #2b2b2b;
}
.set-up-btn,
.set-up-btn:hover,
.set-up-btn:focus {
    width: 140px!important;
    height: 45px;
    border-radius: 8px!important;
    font-size: 14px;
}
.description {
    max-width: 450px;
}
.description > h4 {
    font-size: 20px!important;
}
.description span {
    color: #898989;
}
ul {
    padding-left: 30px;
}
.set-up {
    position: absolute;
    right: 25px;
}
.modal-content {
    background: #2b2b2b!important;
}
.modal-body {
    padding: 2rem 1rem;
}
.close {
    margin-top: -22px;
}
.alert-success {
    color: #45f10c;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
}
.alert-unsuccess {
    color: #FF335C;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
}
@media (max-width: 574px) {
    .success {
        align-items: center;
        display: block !important;
    }
    .success > div:first-child {
        text-align: center;
    }
    .success > div {
        margin: 0px!important;
    }
    .description > h4 {
        text-align: center;
    }
    .set-up {
        position: initial;
    }
    .set-up-btn {
        width: 100%!important;
    }
}
</style>
@endsection

@section('content')
<div class="row m-0 mb-3">
    <div class="col-12 col-sm-12 col-md-12 title">
       <h4 class="text-white">Payment Method</h4>
       <p class="">You can only select 1 withdrawal method </p>
       <div class="divider"></div>
    </div>
</div>
<div class="row payment-completed m-0 mb-4">
    @if(Session::has('success'))
    <div class="col-12 col-md-12 col-sm-12">
        <div class="alert alert-success" role="alert">
            <strong>Success!</strong> {{ Session::get('success') }}
        </div>
    </div>
    @elseif(Session::has('unsuccess'))
    <div class="col-12 col-md-12 col-sm-12">
        <div class="alert alert-unsuccess" role="alert">
            <strong>Unsuccess!</strong> {{ Session::get('unsuccess') }}
        </div>
    </div>
    @endif
    <div class="col-12 col-sm-12 col-md-12">
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 success text-center">
                <div id="paypal-button-container" class="w-100"></div>
                <form id="setup_payment" action="{{ route('idol-setup-payment') }}" method="POST" class="d-none">
                    {{ csrf_field() }}
                    <input type="hidden" name="idol_paypal_id" id="idol_paypal_id">
                    <div class="my-auto set-up">
                        <button type="submit" class="btn custom-btn set-up-btn my-auto setup-payment">Set Up Payment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <form id="setup_payment" action="{{ route('idol-setup-payment') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="well">
                                <div class="row-fluid">
                                    <div class="col-sm-12">
                                        <h4 class="text-white mb-4" style="font-size: 16px">Please input your stripe account id.</h4>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="col-sm-12">
                                        <label class="pure-material-textfield-outlined w-100 mb-4">
                                            <input type="text" name="idol_stripe_account_id" id="stripe_account_id" placeholder="" value="" required>
                                            <span>Account Id</span>
                                        </label>
                                    </div>
                                </div>
                                <div class="row-fluid">
                                    <div class="col-sm-12 text-right">
                                        <button type="submit" class="btn custom-btn w-100 save-card" style="border-radius: 15px!important;font-size: 16px">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> -->
@endsection

@section('scripts')
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
            value: 0.1
          }
        }]
      });
    },
    onApprove: function(data, actions) {
      // This function captures the funds from the transaction.
      return actions.order.capture().then(function(details) {
        // This function shows a transaction success message to your buyer.
        toastr.success('Payment method verified!');
        $('#idol_paypal_id').val(1);
        $('#setup_payment').removeClass('d-none');
      });
    },
    onError: function (err) {
        // For example, redirect to a specific error page
        toastr.error(err);
    }
  }).render('#paypal-button-container');
$(document).on('click', '.setup-payment', function() {
    $('#myModal').modal('toggle');
});
</script>
@endsection