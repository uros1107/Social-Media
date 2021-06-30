<div class="sidebar m-sidebar" style="">
    <nav class="sidebar-nav ps" style="width: 280px!important;overflow-y: auto!important;">
        <div class="logo" style="margin:30px 0px;text-align:center">
            <a href="{{ route('index') }}"><img src="{{ asset('assets/images/logo.png') }}"></a>
        </div>
        <ul class="nav" style="width: 280px!important">
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('fans-index') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/home.png') }}" class="mr-3" style="width:20px">
                    Home
                </a>
            </li>
            @if(Auth::check() && Auth::user()->role == 2)
            <!-- <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('fans-activity') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/notification.png') }}" class="mr-3" style="width:20px">
                    My Activity
                </a>
            </li> -->
            <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('myfandom') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/heart.png') }}" class="mr-3" style="width:20px">
                    My Fandoms
                </a>
            </li>
            <!-- <li class="nav-item" style="padding: 10px 20px!important;">
                <a href="{{ route('order-list') }}" class="nav-link">
                    <img src="{{ asset('assets/images/icons/swap.png') }}" class="mr-3" style="width:20px">
                    My Orders
                </a>
            </li> -->
            @endif

            <div style="padding: 15px 20px">
                <h5>Browse categories</h5>
            </div>
            @php
                $cats = DB::table('categories')->get()->take(8)->toArray();
            @endphp
            @for($i = 0; $i < count($cats); $i = $i+1)
                <li class="nav-item" style="padding: 10px 20px!important;">
                    <a href="{{ route('idol-category-get', $cats[$i]->cat_name) }}" class="nav-link person-link">
                        <img src="{{ asset('assets/images/person/'.$cats[$i]->cat_img) }}" class="mr-3 person-img" style="width:20px">
                        {{ $cats[$i]->cat_name }}
                    </a>
                </li>
            @endfor
            @php
                $cats = DB::table('categories')->where('cat_id', '>', 8)->get()->toArray();
            @endphp
            @for($i = 0; $i < count($cats); $i = $i+1)
                <li class="nav-item d-none more" style="padding: 10px 20px!important;">
                    <a href="{{ route('idol-category-get', $cats[$i]->cat_name) }}" class="nav-link person-link">
                        <img src="{{ asset('assets/images/person/'.$cats[$i]->cat_img) }}" class="mr-3 person-img" style="width:20px">
                        {{ $cats[$i]->cat_name }}
                    </a>
                </li>
            @endfor
            <li class="nav-item" id="all-cat-btn" style="padding: 10px 20px!important;">
                <a href="#" class="nav-link person-link">
                    <img src="{{ asset('assets/images/person/person3.png') }}" class="mr-3 person-img" style="width:20px">
                    All Categories
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