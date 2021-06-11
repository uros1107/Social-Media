@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
.block {
    background: #2b2b2b;
    border-radius: 15px; 
    padding: 40px 20px;
}
.title h4 {
    font-size: 16px;
}
.title p {
    font-weight: 500;
    font-size: 20px;
    line-height: 25px;
    max-width: 600px;
}
.sub-title > h4 {
    font-size: 16px;
}
.sub-title > p {
    font-size: 16px;
    color: #898989;
}
.sub-content > h4 {
    font-size: 14px;
    font-weight: normal;
}
.sub-content p {
    font-size: 14px;
}
.divider {
    width: 100%;
    height: 1px;
    background: #121212;
    margin: 10px 0px;
}
.v-divider {
    height: 294px;
    width: 1px;
    background: #121212;
}
.send-msg {
    border-radius: 15px!important;
    font-size: 14px;
}
.alert-success {
    color: #45f10c;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
    border-radius: 10px;
}

@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .footer .container-fluid {
        padding: 0px!important;
    }
    .w-50 {
        width: 100%!important;
    }
    .sub-title,
    .sub-content .d-flex {
        display: block !important;
    }
    .block {
        padding: 20px;
        margin: 0px!important;
    }
    .block .col-12 {
        padding: 0px;
    }
    .service {
        font-size: 14px;
        margin-top: 20px;
    }
    .title {
        padding: 0px;
    }
    .title h4 {
        font-size: 16px;
    }
    .title p {
        font-size: 12px;
        line-height: 20px;
    }
}
</style>
@endsection

@section('content')
<div class="row m-0 mb-3">
    <div class="col-12 col-sm-12 col-md-12 title">
       <h4 class="text-main-color">Concierge</h4>
       <p class="mb-0 text-white">Facing an issue with requests, billing or your account? Reach out to our friendly VIP service officers and we will be in touch with you shortly</p>
       <div class="divider"></div>
    </div>
    @if(Session::has('success'))
        <div class="col-12 col-md-12 col-sm-12">
            <div class="alert alert-success mb-0" role="alert">
                <strong>Success!</strong> {{ Session::get('success') }}
            </div>
        </div>
    @endif
</div>
<div class="row m-3 mb-4 block">
    <div class="col-12 col-sm-8 col-md-8">
        <div class="row m-0">
            <div class="col-12 col-md-12 col-sm-12">
                <div class="sub-title d-flex w-100 mb-4">
                    <h4 class="text-white w-50">Help Categories</h4>
                    <p class="mb-0 w-50">Have other issues? Ask our VIP service officers</p>
                </div>
                <div class="sub-content w-100">
                    <h4 class="text-white">Payments</h4>
                    <div class="d-flex">
                        <p class="mb-0 w-50 text-main-color">Manage how I get paid</p>
                        <p class="mb-0 w-50 text-main-color">Why I can’t Get Paid Directly?</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="sub-content w-100">
                    <h4 class="text-white">Payment Options</h4>
                    <div class="d-flex">
                        <p class="mb-0 w-50 text-main-color">Paypal</p>
                        <p class="mb-0 w-50 text-main-color">Stripe</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="sub-content w-100">
                    <h4 class="text-white">Report & Earnings</h4>
                    <div class="d-flex">
                        <p class="mb-0 w-50 text-main-color">Payment report</p>
                        <p class="mb-0 w-50 text-main-color">My funds not received</p>
                    </div>
                </div>
                <div class="divider"></div>
                <div class="sub-content w-100">
                    <h4 class="text-white">My Account</h4>
                    <div class="d-flex">
                        <p class="mb-0 w-50 text-main-color">Someone trying to login with my account</p>
                        <p class="mb-0 w-50 text-main-color">How to closed my account?</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="v-divider"></div> -->
    <div class="col-12 col-sm-4 col-md-4">
        <form action="{{ route('idol-send-concierge') }}" method="POST">
            {{ csrf_field() }}
            <h4 class="text-white service mb-3">Send Message To Our Customer Services</h4>
            @php
                $idol_info = DB::table('idol_info')->where('idol_user_id', Auth::user()->id)->first();
            @endphp
            <div class="w-100 mb-3">
                <div class="select">
                    <select class="select-text" name="issue_type">
                        <option value="1">Payment Issue</option>
                    </select>
                    <label class="select-label">Issue Type</label>
                </div>
            </div>
            <div class="w-100">
                <label class="pure-material-textfield-outlined w-100">
                    <input placeholder="" name="email" value="{{ $idol_info->idol_email }}">
                    <span>Email</span>
                </label>
            </div>
            <div class="w-100">
                <label class="pure-material-textfield-outlined w-100 mb-0">
                    <textarea placeholder="" name="message" rows="5" style="height:100px" required></textarea>
                    <span>Your messages</span>
                </label>
            </div>
            <div class="w-100">
                <button type="submit" class="btn custom-btn w-100 send-msg">Send Message</button>
            </div>
        </form>
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection