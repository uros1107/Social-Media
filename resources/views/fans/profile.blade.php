@extends('layouts.idol')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.custom-col {
    padding-left: 10px;
    padding-right: 10px;
}
</style>
@endsection

@section('content')
<div class="row discover-favourite mb-4">
    <div class="col-12 col-sm-12 col-md-12 d-flex user-profile" style="height:198px;background:#2b2b2b">
        <div class="profile-img">
            <img src="{{ asset('assets/images/profile.png') }}" class="img-circle">
        </div>
        <div class="profile-info">
            <h4 class="text-white">John Doe</h4>
            <h5>@JohnDoe</h5>
            <p>I’m dance studio teacher with millions of<br>views on TikTok. 50% of fees will go to dog charities</p>
        </div>
        <div class="profile-action">
            <div class="grey-btn">
                <button class="btn custom-btn">Change Password</button>
                <button class="btn custom-btn">Edit Profile</button>
            </div>
            <div class="fandom">
                <button class="btn custom-btn">My Fandom<span>2</span></button>
            </div>
        </div>
    </div>
</div>
<div class="row featured mb-4">
    <div class="col-12 col-sm-12 col-md-12">
        <div class="title-part">
            <h2 class="text-white">Followed Idols</h2>
            <p class="text-grey">List your favourite idols</p>
            <div class="divider mb-4 desktop"></div>
        </div>
        <div class="image-part">
            <div class="row m-0 mb-4">
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
@endsection