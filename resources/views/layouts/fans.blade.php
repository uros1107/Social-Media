<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome to MILLIONK</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" integrity="sha512-oe8OpYjBaDWPt2VmSFR+qYOdnTjeV9QPLJUeqZyprDEQvQLJ9C5PCFclxwNuvb/GQgQngdCXzKSFltuHD3eCxA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.9.0/themes/base/jquery-ui.min.css" integrity="sha512-lE0QNAJLkgJOpwIyd/QjUtOPpASCh63P8GMoWXoP/uINWjM/w33Me0ypq8tntHFZqxo20+qfjvOFFZfi4uSCsA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="{{ asset('assets/css/idol-custom.css') }}" rel="stylesheet" />
    @yield('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed pace-done sidebar-lg-show">
    <header class="app-header navbar desktop" style="height:100px;background: #171717;padding-left:280px;border-bottom: 0px solid #c8ced3;">
        <!-- <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" style="right:0px;position:absolute" type="button" data-toggle="sidebar-show">
            <span class="navbar-toggler-icon"></span>
        </button> -->

        <div class="search" style="margin-left: 30px">
              <!-- Actual search box -->
            <div class="form-group has-search mb-0" style="position:relative">
                <!-- <span class="fa fa-search form-control-feedback"></span> -->
                <img src="{{ asset('assets/images/icons/search.png') }}" class="search-icon">
                <input type="text" class="form-control text-white" id="search" placeholder="Search">
            </div>
        </div>

        <div class="header-right d-flex">
            <div class="m-auto">
                <a href="#">
                    <img src="{{ asset('assets/images/icons/notification.png') }}" style="width: 24px">
                </a>
            </div>
            @if(!Auth::check() || Auth::user()->role != 2)
            <div class="my-auto" style="margin-left: 20px;margin-right: 20px">
                <button class="btn custom-btn deactive login-btn" style="width:125px;font-size:16px">Login</button>
            </div>
            <div class="m-auto">
                <button class="btn custom-btn signup-btn" style="width:125px;font-size:16px">Sign Up</button>
            </div>
            @else
            <div class="my-auto" style="position:relative">
                @if(!Auth::user()->photo)
                <img src="{{ asset('assets/images/no-image.jpg') }}" class="img-circle ml-5 mr-3" style="width: 50px;height:50px">
                @else
                <img src="{{ asset('assets/images/img/'.Auth::user()->photo) }}" class="img-circle ml-5 mr-3" style="width: 50px;height:50px;object-fit: cover;">
                @endif
                <span class="text-white" style="font-size:16px">{{ Auth::user()->name }}</span>
                <img src="{{ asset('assets/images/icons/down-arrow.png') }}" class="img-circle ml-3" id="sub-menu" style="width: 20px;height:20px">
                <div class="sub-menu d-none">
                    <div class="mb-2">
                        <a href="{{ route('fans-profile') }}" class="text-white"><i class='fas fa-angle-double-left mr-3' style='font-size:12px'></i>Profile</a>
                    </div>
                    <div class="mb-2">
                        <a href="{{ route('fans-activity') }}" class="text-white"><i class='fas fa-angle-double-left mr-3' style='font-size:12px'></i>Requests</a>
                    </div>
                    <div>
                        <a href="{{ route('logout') }}" class="text-white"><i class='fas fa-angle-double-left mr-3' style='font-size:12px'></i>Logout</a>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <ul class="nav navbar-nav ml-auto">
            @if(count(config('panel.available_languages', [])) > 1)
            <li class="nav-item dropdown d-md-down-none">
                <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
                    aria-expanded="false">
                    {{ strtoupper(app()->getLocale()) }}
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    @foreach(config('panel.available_languages') as $langLocale => $langName)
                    <a class="dropdown-item"
                        href="{{ url()->current() }}?change_language={{ $langLocale }}">{{ strtoupper($langLocale) }}
                        ({{ $langName }})</a>
                    @endforeach
                </div>
            </li>
            @endif
        </ul>
    </header>

    <div class="m-top mobile" style="z-index:999">
        <div class="top-bar">
            <img class="logo-img" src="{{ asset('assets/images/top-left-img.png') }}">
            <div class="right-side-icons">
                <i class="fa fa-search" style="color: #FF335C"></i>
                <i class="fa fa-bell-o text-white"></i>
                <a class="sidebar-toggler d-lg-none mr-auto" type="button">
                    <i class="fa fa-navicon text-white"></i>
                </a>
            </div>
        </div>
    </div>

    <div class="app-body mt-0">
        @include('partials.fans-menu')
        <main class="main" style="">

            <div style="padding: 30px" class="container-fluid">

                @yield('content')

            </div>

            @include('partials.footer')
        </main>
        <form id="logoutform" action="{{ route('logout') }}" method="POST" style="display: none;">
            {{ csrf_field() }}
        </form>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js" integrity="sha512-leN1LJ2B5s9cBINeKL5bbT3cQvOebXsezoYGyuMq9oaytpFJgJ1uBOU86lJZObKTFLbMHqP0zFXR/1N6Nnlskw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js" integrity="sha512-lbwH47l/tPXJYG9AcFNoJaTMhGvYWhVM9YI43CT+uteTRRaiLCui8snIgyAN8XWgNjNhCqlAUdzZptso6OCoFQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    
    <script>
        $(document).ready(function() {
            var sidebar_flag = true;
            $('.sidebar-toggler').on('click', function() {
                if(sidebar_flag) {
                    $('.sidebar').removeClass('m-sidebar');
                    $('.sidebar').addClass('show-sidebar');
                    sidebar_flag = false;
                } else {
                    $('.sidebar').addClass('m-sidebar');
                    $('.sidebar').removeClass('show-sidebar');
                    sidebar_flag = true;
                }
                
            })
            $('.login-btn').on('click', function() {
                location.href = "{{ route('fans-signin') }}";
            })
            $('.signup-btn').on('click', function() {
                location.href = "{{ route('fans-signup') }}";
            })
            $('#sub-menu').on('click', function() {
                if($('.sub-menu').hasClass('d-none')) {
                    $('.sub-menu').removeClass('d-none')
                } else {
                    $('.sub-menu').addClass('d-none')
                }
            })
            $('#all-cat-btn').on('click', function(){
                $(this).addClass('d-none');
                $('.more').removeClass('d-none');
            });

            var idol_names;
            $.ajax({
                type: "GET",
                url: "{{ route('get-idol-list') }}",
                success:function(data){
                    idol_names = data;
                },
                async: false
            });
            $('#search').autocomplete({
                source: idol_names,
                select: function( event , ui ) {
                    var idol_name = ui.item.label;
                    location.href = "{{ route('fans-search') }}" + '?search=' + idol_name;
                }
            });

            $('#search').on('change', function() {
                location.href = "{{ route('fans-search') }}" + '?search=' + $(this).val();
            });
        })
    </script>
    @yield('scripts')
</body>

</html>