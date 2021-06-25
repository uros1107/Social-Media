@extends('layouts.idol')

@section('title', 'Welcome to MILLIONK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}
</style>
@endsection

@section('content')
<div class="row wizard m-0 mb-3">
    <div class="col-12 col-sm-12 col-md-12 d-flex title">
       <h3 class="text-white">Complete your information to start</h3>
       <p class="text-white mb-0">Status:<span class="font-weight-bold">Active</span></p>
    </div>
</div>
<div class="row wizard payment-completed m-0 mb-4">
    <div class="col-12 col-sm-12 col-md-12 wizard-block">
        <div class="row m-0">
            <div class="col-12 col-sm-12 col-md-12 success text-center">
                <img class="mb-3" src="{{ asset('assets/images/tick.png') }}">
                <h4 class="text-white">Your Setup is Completed</h4>
                <p class="text-white">Your fans can now request personalized videos from you</p>
                <button class="btn custom-btn back_dashboard" style="width: 300px">Back to Dashboard</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
$(document).ready(function(){
    $(document).on('click', '.back_dashboard', function() {
        location.href = "{{ route('idol-index') }}";
    });
})
</script>
@endsection