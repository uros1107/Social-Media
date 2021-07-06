@extends('layouts.fans')

@section('title', 'Welcome to MILLIONK')

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
<div class="row discover-favourite mb-4">
    <!-- <div class="col-12 col-sm-12 col-md-12 mb-4 tab-btn">
        <button class="btn custom-btn mr-3 discover-btn" type="button">Discover</button>
        @if(Auth::check() && Auth::user()->role == 2)
        <button class="btn custom-btn deactive favourite-btn" type="button">My Favourite</button>
        @endif
    </div> -->
    <div class="col-12 col-sm-12 col-md-12 hide" style="display:table">
        <div class="discover">
            <img src="{{ asset('assets/images/discover.png') }}" class="w-100">
        </div>
        <div class="image-title">
            <h2 class="text-white">FIND YOUR IDOL<br>CELEBRATE WITH THEM</h2>
            <p class="text-white desktop">Personalized fans service videos from your favourite<br>Korean-wave idols.</p>
            <p class="text-white mobile">Personalized fans service videos from<br>your favourite Korean-wave idols.</p>
        </div>
    </div>
</div>
@if(Auth::check())
<div class="row featured mb-4 show">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(Auth::user()->fandom_lists)
                @foreach(json_decode(Auth::user()->fandom_lists) as $idol)
                    @php
                        $idol = DB::table('idol_info')->where('idol_user_id', $idol)->first();
                        $cats = json_decode($idol->idol_cat_id);
                    @endphp
                    <div class="col-4 col-sm-3 col-md-3 custom-col" data-id="{{ $idol->idol_user_id }}">
                        <div class="image-item">
                            <img src="{{ asset('assets/images/img/'.$idol->idol_photo) }}" class="w-100">    
                            <div class="gradient"></div>
                            <div class="image-profile">
                                <h5 class="text-white">{{ $idol->idol_full_name }}</h5>
                                <div class="d-flex" style="flex-wrap: wrap">
                                    @foreach($cats as $cat)
                                    @php
                                        $cat = DB::table('categories')->where('cat_id', $cat)->first();
                                    @endphp
                                    <p class="text-white mr-3 mb-0">{{ $cat->cat_name }}</p>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
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
@endif
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Featured</h2>
            <!-- <p class="text-grey">Influencer recommendation for you.</p> -->
            <div class="divider mb-3"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                    $cats = json_decode($idol_info->idol_cat_id);
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
                    <div class="image-item" style="position: initial">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <div class="d-flex" style="flex-wrap: wrap">
                                @foreach($cats as $cat)
                                @php
                                    $cat = DB::table('categories')->where('cat_id', $cat)->first();
                                @endphp
                                <p class="text-white mr-3 mb-0">{{ $cat->cat_name }}</p>
                                @endforeach
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
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Search your idols by categories</h2>
            <p class="text-grey">Find your idols through their categories</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part idol-search">
            <div class="row m-0">
                @php
                    $cats = DB::table('categories')->get()->toArray();
                @endphp
                @for($i = 0; $i < count($cats); $i = $i+2)
                <div class="col-6 col-sm-4 col-md-3">
                    <a href="{{ route('idol-category-get', $cats[$i]->cat_name) }}">
                        <div class="image-item mb-4 category-tab" style="height: unset">
                            <img src="{{ asset('assets/images/'.'idol'.($i%8 + 1).'.png') }}" class="w-100" style="height: 100%!important"> 
                            <div>
                                <h4 class="text-white mb-0">{{ $cats[$i]->cat_name }}</h4>
                            </div>  
                        </div>
                    </a>
                    <a href="{{ route('idol-category-get', $cats[$i+1]->cat_name) }}">
                        <div class="image-item category-tab" style="height: unset">
                            <img src="{{ asset('assets/images/'.'idol'.($i%8 + 2).'.png') }}" class="w-100" style="height: 100%!important">   
                            <div>
                                <h4 class="text-white mb-0">{{ $cats[$i+1]->cat_name }}</h4>
                            </div>
                        </div>
                    </a>
                </div>
                @endfor
            </div>
        </div>
    </div>
</div>
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Trending</h2>
            <!-- <p class="text-grey">Top list trending</p> -->
            <div class="divider mb-3"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                    $cats = json_decode($idol_info->idol_cat_id);
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
                    <div class="image-item" style="position: initial">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <div class="d-flex" style="flex-wrap: wrap">
                                @foreach($cats as $cat)
                                @php
                                    $cat = DB::table('categories')->where('cat_id', $cat)->first();
                                @endphp
                                <p class="text-white mr-3 mb-0">{{ $cat->cat_name }}</p>
                                @endforeach
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
<div class="row featured mb-4 hide">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">New Idols</h2>
            <!-- <p class="text-grey">New idols who join to meet you</p> -->
            <div class="divider mb-3"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($new_idols))
                @foreach($new_idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                    $cats = json_decode($idol_info->idol_cat_id);
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-url="{{ route('follow-idol', $idol_info->idol_user_name) }}">
                    <div class="image-item" style="position: initial">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <div class="d-flex" style="flex-wrap: wrap">
                                @foreach($cats as $cat)
                                @php
                                    $cat = DB::table('categories')->where('cat_id', $cat)->first();
                                @endphp
                                <p class="text-white mr-3 mb-0">{{ $cat->cat_name }}</p>
                                @endforeach
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
    $(document).ready(function() {
        $('.show').hide();

        $('.custom-col').on('click', function() {
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
    })
</script>
@endsection