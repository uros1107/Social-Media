<div class="sidebar m-sidebar" style="">
    <nav class="sidebar-nav ps" style="width: 280px!important;overflow-y: auto!important;">
        <div class="logo" style="margin:30px 0px;text-align:center">
            <img src="{{ asset('assets/images/logo.png') }}">
        </div>
        <ul class="nav" style="width: 280px!important">
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route("fans-index") }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/home.png') }}" class="mr-3" style="width:20px">
                    Home
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route("fans-activity") }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/camera.png') }}" class="mr-3" style="width:20px">
                    Request
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route("follow-idol") }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/earning.png') }}" class="mr-3" style="width:20px">
                    Earnings
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route("order-list") }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/white-wallet.png') }}" class="mr-3" style="width:20px">
                    Payment Method
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route("order-list") }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/user-3.png') }}" class="mr-3" style="width:20px">
                    Concierge
                </a>
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