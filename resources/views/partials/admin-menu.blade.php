<div class="sidebar m-sidebar" style="">
    <nav class="sidebar-nav ps" style="width: 280px!important;overflow-y: auto!important;">
        <div class="logo" style="margin:30px 0px;text-align:center">
            <img src="{{ asset('assets/images/logo.png') }}">
        </div>
        <ul class="nav" style="width: 280px!important">
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('admin-dashboard') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/category.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Dashboard
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('admin-order') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/dark-order.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Orders
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('admin-idol') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/dark-star.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Idols List
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('admin-fans') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/dark-user3.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Fans List
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-concierge') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/dark-swap.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Transfer
                </a>
            </li>
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('idol-concierge') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/dark-wallet.png') }}" class="ml-2 mr-3 mb-1" style="width:20px">
                    Settings
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