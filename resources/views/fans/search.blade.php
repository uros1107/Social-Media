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
    .featured .image-item > img {
        min-height: 120px;
    }
}
</style>
@endsection

@section('content')
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">{{ "'".$search."'" }} Results</h2>
            <p class="text-grey">Influencer recommendation for you.</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idol_infos))
                @foreach($idol_infos as $idol_info)
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <div class="d-flex" style="flex-wrap: wrap">
                                <p class="text-white mr-3 mb-0">{{ $idol_info->idol_head_bio }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @else
                <div class="col-12 col-sm-12 col-md-12 d-flex" style="height: 200px">
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
        $(this).height($(this).width() * 1.6);
    })
});
    $(document).ready(function() {
        $('.show').hide();

        $('.custom-col').each(function() {
            $(this).height($(this).width() * 1.6);
        })

        $('.custom-col').on('click', function() {
            var url = $(this).data('url');
            location.href = url;
        })
        // $(document).on('click', '.custom-btn', function() {
        //     if($(this).hasClass('deactive')) {
        //         $(this).removeClass('deactive');
        //         $('.custom-btn').not(this).each(function(){
        //             $(this).addClass('deactive');
        //         });
        //     }
        // });

        $('.favourite-btn').on('click', function() {
            $(this).removeClass('deactive');
            $('.discover-btn').addClass('deactive');
            $('.hide').hide();
            $('.show').show();
        });

        $('.discover-btn').on('click', function() {
            $(this).removeClass('deactive');
            $('.favourite-btn').addClass('deactive');
            $('.hide').show();
            $('.show').hide();
        });
    })
</script>
@endsection