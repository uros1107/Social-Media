@extends('layouts.fans')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>

</style>
@endsection

@section('content')
<div class="row discover-favourite mb-4">
    <div class="col-12 col-sm-12 col-md-12 mb-4 tab-btn">
        <button class="btn custom-btn mr-3" type="button">Discover</button>
        <button class="btn custom-btn deactive" type="button">My Favourite</button>
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
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
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
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="image-item mb-4">
                        <img src="{{ asset('assets/images/idol1.png') }}" class="w-100"> 
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>  
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('assets/images/idol2.png') }}" class="w-100">   
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="image-item mb-4">
                        <img src="{{ asset('assets/images/idol3.png') }}" class="w-100">  
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('assets/images/idol4.png') }}" class="w-100">   
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="image-item mb-4">
                        <img src="{{ asset('assets/images/idol5.png') }}" class="w-100">   
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('assets/images/idol6.png') }}" class="w-100">   
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-sm-4 col-md-3">
                    <div class="image-item mb-4">
                        <img src="{{ asset('assets/images/idol7.png') }}" class="w-100">  
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div>
                    </div>
                    <div class="image-item">
                        <img src="{{ asset('assets/images/idol8.png') }}" class="w-100">  
                        <div>
                            <h4 class="text-white">Actors</h4>
                        </div> 
                    </div>
                </div>
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
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
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
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-sm-3 col-md-3 custom-col">
                    <div class="image-item">
                        <img src="{{ asset('assets/images/actor.png') }}" class="w-100">    
                        <div class="gradient"></div>
                        <div class="image-profile">
                            <h5 class="text-white">John Doe</h5>
                            <p class="text-white mb-0">Dancer, TikTok</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $(document).ready(function() {
        $('.custom-col').on('click', function() {
            location.href = "{{ route('follow-idol') }}";
        })
    })
</script>
@endsection