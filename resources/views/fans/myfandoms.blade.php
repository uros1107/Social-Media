@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.footer .container-fluid {
    padding: 0px!important;
}
.featured .image-part .row {
    flex-wrap: inherit;
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
}
</style>
@endsection

@section('content')
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">My Fandoms</h2>
            <p class="text-grey">Save your favourites here by following them</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if($fans->fandom_lists)
                @foreach(json_decode($fans->fandom_lists) as $idol)
                    @php
                        $idol = DB::table('idol_info')->where('idol_user_id', $idol)->first();
                    @endphp
                    @if(!$idol->idol_del_flag)
                    <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol->idol_user_name) }}">
                        <div class="image-item">
                            <img src="{{ asset('assets/images/img/'.$idol->idol_photo) }}" class="w-100">    
                            <div class="gradient"></div>
                            <div class="image-profile">
                                <h5 class="text-white">{{ $idol->idol_full_name }}</h5>
                                <div class="d-flex" style="flex-wrap: wrap">
                                    <p class="text-white mr-3 mb-0">{{ $idol->idol_head_bio }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @endforeach
                @else
                <div class="col-12 col-md-12 col-sm-12 d-flex" style="height: 200px">
                    <p class="text-white mb-0 text-center m-auto">No idols yet</p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
window.addEventListener("resize", function(e) {
    $('.custom-col').each(function() {
        $(this).height($(this).width() * 1.7);
    })
});
$(document).ready(function() {
    $('.custom-col').each(function() {
            $(this).height($(this).width() * 1.7);
    })
    
    $('.custom-col').on('click', function() {
        var url = $(this).data('url');
        location.href = url;
    })
});
</script>
@endsection