<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Welcome to Milliok</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/buttons/1.2.4/css/buttons.dataTables.min.css" rel="stylesheet" />
    <link href="https://cdn.datatables.net/select/1.3.0/css/select.dataTables.min.css" rel="stylesheet" />
    <link href="https://unpkg.com/@coreui/coreui@2.1.16/dist/css/coreui.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/css/select2.min.css" rel="stylesheet" />
    <link
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css"
        rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.css" rel="stylesheet" />
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
                <input type="text" class="form-control" placeholder="Search">
            </div>
        </div>

        <div class="header-right d-flex">
            <div class="m-auto">
                <a href="#">
                    <img src="{{ asset('assets/images/icons/notification.png') }}" style="width: 24px">
                </a>
            </div>
            <div class="my-auto" style="margin-left: 20px;margin-right: 20px">
                <button class="btn custom-btn deactive" style="width:125px;font-size:16px">Login</button>
            </div>
            <div class="m-auto">
                <button class="btn custom-btn" style="width:125px;font-size:16px">Sign Up</button>
            </div>
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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <script src="https://unpkg.com/@coreui/coreui@2.1.16/dist/js/coreui.min.js"></script>
    <script src="//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/dataTables.buttons.min.js"></script>
    <script src="//cdn.datatables.net/buttons/1.2.4/js/buttons.flash.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.2.4/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/pdfmake.min.js"></script>
    <script src="https://cdn.rawgit.com/bpampuch/pdfmake/0.1.18/build/vfs_fonts.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jszip/2.5.0/jszip.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.3.0/js/dataTables.select.min.js"></script>
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
    <script
        src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.5/js/select2.full.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/min/dropzone.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }}"></script>
    
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
        })
    </script>
    @yield('scripts')
</body>

</html>