@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<link href="https://cdn.jsdelivr.net/npm/semantic-ui@2.2.13/dist/semantic.min.css" rel="stylesheet" />
<style>
.block-3 {
    background: #171717;
    padding-bottom: 50px;
    padding-top: 20px;
}
.block-3-text {
    margin-bottom: 40px;
}
.block-title {
    font-size: 40px;
    letter-spacing: 6px;
    margin-bottom: 20px;
}
.horizontal-red-bar {
    width: 100px;
    height: 3px;
    background-color: #FF335C;
    margin: auto;
    margin-bottom: 20px;
}
.text-color {
    color: #fcfcfc!important;
}
.font-16 {
    font-size: 16px;
}

@media screen and (max-width:475px) {
    .block-3-text {
        margin-bottom: 30px;
    }
    .block-title {
        font-size: 30px!important;
        letter-spacing: 4px;
        margin-bottom: 0px;
    }
    .horizontal-red-bar {
        margin-bottom: 20px;
        margin-top: 20px;
    }
    p, h5 {
        font-size: 14px!important;
    }
    a {
        font-size: 14px;
    }
    .container-fluid {
        padding: 0px!important;
    }
}
</style>
@endsection

@section('content')
<div class="content">
    <div class="container-fluid p-0" style="background-color: #171717;">
        <div class="block-3">
            <div class="text-center block-3-text">
                <h1 class="text-white block-title">Contact Us</h1>
                <div class="horizontal-red-bar"></div>
                <h3 class="text-white block-sub-title">We would love to hear from you!</h3>
                @if(Session::get('success'))
                <h2 class="text-white block-sub-title">{{ Session::get('success') }}</h2>
                @endif
            </div>
            <div class="container mb-5">
                <form class="custom-form" action="{{ route('contact') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row m-0">
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">Email</label>
                                <input type="email" name="email" placeholder="Email" class="custom-input" required>
                                <img class="input-icon" src="{{ asset('assets/images/icons/mail.png') }}" style="top: 31px;">
                            </div>
                            @if ($errors->has('email'))
                                <span class="help-block pl-3 mb-2 d-block" style="color:#d61919;margin-top: -10px;">
                                    <p class="mb-0">{{ $errors->first('email') }}</p>
                                </span>
                            @endif
                        </div>
                        <div class="col-12 col-sm-12 col-md-12">
                            <div class="inputWithIcon">
                                <label class="input-label">What is your question?</label>
                                <textarea class="custom-textarea" name="question" style="height:120px!important" placeholder="Let us know how can we help you." required></textarea>
                            </div>
                            <p class="text-main-color text-right mb-0 limit-message d-none" style="font-size: 14px">You can input maximum 200 characters!</p>
                            <p class="text-white text-right mb-0 mr-2 word-count d-none" style="font-size: 12px">Characters: <span>200</span></p>
                        </div>
                        <div class="col-12 mt-3">
                            <button class="btn custom-btn w-100 register-btn" type="submit">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
            
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>

</script>
@endsection