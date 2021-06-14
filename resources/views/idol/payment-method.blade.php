@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

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
    <div class="col-12 col-sm-12 col-md-12">
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 d-flex success" style="align-items:center">
                <div class="mr-5">
                    <img class="mb-3" src="{{ asset('assets/images/stripe.png') }}">
                </div>
                <div class="description ml-4">
                    <h4 class="text-white">Stripe<span>(Direct to Local Bank)</span></h4>
                    <ul class="text-white">
                        <li>US$3 Per Withdrawal</li>
                        <li>Stripe may charge additional fees for you to withdraw additional funds. Funds withdrawn will be in your local currency.</li>
                    </ul>
                </div>
                <div class="my-auto set-up">
                    <button class="btn custom-btn set-up-btn my-auto">Set Up Payment</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection