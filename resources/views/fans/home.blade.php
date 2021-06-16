@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.footer .container-fluid {
    padding: 0px!important;
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
    <div class="col-12 col-sm-12 col-md-12 mb-4 tab-btn">
        <button class="btn custom-btn mr-3" type="button">Discover</button>
        @if(Auth::check() && Auth::user()->role == 2)
        <button class="btn custom-btn deactive" type="button">My Favourite</button>
        @endif
    </div>
    <div class="col-12 col-sm-12 col-md-12" style="display:table">
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
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Featured</h2>
            <p class="text-grey">Influencer recommendation for you.</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-id="{{ $idol->id }}">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
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
<div class="row featured mb-4">
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
                    <a href="#1">
                        <div class="image-item mb-4" style="height: unset">
                            <img src="{{ asset('assets/images/idol1.png') }}" class="w-100"> 
                            <div>
                                <h4 class="text-white mb-0">{{ $cats[$i]->cat_name }}</h4>
                            </div>  
                        </div>
                    </a>
                    <a href="#2">
                        <div class="image-item" style="height: unset">
                            <img src="{{ asset('assets/images/idol2.png') }}" class="w-100">   
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
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Trending</h2>
            <p class="text-grey">Top list trending</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-id="{{ $idol->id }}">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
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
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">New Idols</h2>
            <p class="text-grey">New idols who join to meet you</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0">
                @if(count($idols))
                @foreach($idols as $idol)
                @php
                    $idol_info = DB::table('idol_info')->where('idol_user_id', $idol->id)->first();
                @endphp
                <div class="col-4 col-sm-3 col-md-3 custom-col" data-id="{{ $idol->id }}">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/img/'.$idol_info->idol_photo) }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">{{ $idol_info->idol_full_name }}</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
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
        $('.custom-col').on('click', function() {
            var id = $(this).data('id');
            location.href = "{{ route('follow-idol')}}" + '?id=' + id;
        })
    })
</script>
@endsection