<div class="sidebar m-sidebar" style="">
    <nav class="sidebar-nav ps" style="width: 280px!important;overflow-y: auto!important;">
        <div class="logo" style="margin:30px 0px;text-align:center">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo.png') }}"></a>
        </div>
        <ul class="nav" style="width: 280px!important">
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-index') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/home.png') }}" class="mr-3" style="width:20px">
                    Home
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-video-request') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/camera.png') }}" class="mr-3" style="width:20px">
                    Request
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-earning') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/earning.png') }}" class="mr-3" style="width:20px">
                    Earnings
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-payment-method') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/white-wallet.png') }}" class="mr-3" style="width:20px">
                    Payment Method
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-concierge') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/user-3.png') }}" class="mr-3" style="width:20px">
                    Concierge
                </a>
            </li>
            <li class="d-flex" style="padding: 10px 20px!important;">
                <div class="mx-auto mobile mt-5">
                    <a href="{{ route('logout') }}" class="text-white m-auto" style="font-size: 16px">
                        Logout
                    </a>
                </div>
            </li>
        </ul>
        <div class="ps__rail-x" style="left: 0px; bottom: 0px;">
            <div class="ps__thumb-x" tabindex="0" style="left: 0px; width: 0px;"></div>
        </div>
        <div class="ps__rail-y" style="top: 0px; height: 869px; right: 0px;">
            <div class="ps__thumb-y" tabindex="0" style="top: 0px; height: 415px;"></div>
        </div>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button"></button>
</div>