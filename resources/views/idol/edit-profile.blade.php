@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.container-fluid {
    padding: 0px!important;
}

</style>
@endsection

@section('content')
<div class="row m-0 edit-profile">
    <div class="col-12 col-sm-3 col-md-3">
        <div class="text-center block left">
            <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="img-circle mb-3 mt-4">
            <button class="btn custom-btn mb-3">Change Photo Profile</button>
            <button class="btn custom-btn mb-3">Change Password</button>
            <h3 class="text-white mb-3">{{ $idol_info->idol_full_name }}<h3>
            <h4 class="mb-3">{{ '@'.$idol_info->idol_user_name }}</h4>
            <div class="rating mb-3">
                <span class="mr-2">Rating</span>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
            </div>
            <div class="likes mb-4">
                <img src="{{ asset('assets/images/icons/heart-dot.png') }}" class="mr-2">
                <span>{{ $idol_info->idol_rating }} Likes</span>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-9 col-md-9">
        
    </div>
</div>
@endsection

@section('scripts')
<script>

</script>
@endsection