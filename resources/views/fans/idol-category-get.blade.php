@extends('layouts.fans')

@section('title', 'Personalized Videos & Fan Service from your Korean Wave Idols')

@section('styles')
<style>
.footer .container-fluid {
    padding: 0px!important;
}
.category-sort{
    position: absolute;
    right: 15px;
}
.category-sort select {
    border-radius: 25px;
    color: #5c6873;
    background-color: #2b2b2b;
    border-color: #2b2b2b;
    outline: 0;
    box-shadow: 0 0 0 0.2rem rgb(119 119 119 / 25%);
}
.custom-col {
    margin-bottom: 20px; 
}
@media (max-width: 574px) {
    .container-fluid {
        padding: 10px!important;
    }
    .featured .image-part .row {
        flex-wrap: wrap;
    }
    .featured .image-item > img {
        min-height: 120px;
    }
    .custom-col {
        margin-bottom: 10px; 
    }
}
</style>
@endsection

@section('content')
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <div class="d-flex">
                <h2 class="text-white">{{ $cat->cat_name }}</h2>
                <div class="category-sort my-auto form-group">
                    <select class="form-control text-white sort">
                        <option value="1">Newest</option>
                        <option value="2">Name(A-Z)</option>
                        <option value="3">Name(Z-A)</option>
                        <option value="4">Price(Low to High)</option>
                        <option value="5">Price(High to Low)</option>
                    </select>
                </div>
            </div>
            <div class="divider mb-4"></div>
        </div>
        <div class="image-part">
            <div class="row m-0" id="cat_idol_list">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" id="custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
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

        // $('.custom-col').on('click', function() {
        $(document).on('click', '.custom-col' ,function() {
            var url = $(this).data('url');
            location.href = url;
        })
        
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

        $('.sort').on('change', function() {
            var cat_id = "{{ $cat->cat_id }}";
            var sort = $(this).val();

            $.ajax({
                url: "{{ route('get-sort-idol') }}",
                method: 'get',
                data: { 
                    cat_id: cat_id,
                    sort: sort
                },
                success: function (res) {
                    $('#cat_idol_list').html(res);
                    $('.custom-col').each(function() {
                        $(this).height($(this).width() * 1.6);
                    })
                }
            });
        });
    })
</script>
@endsection