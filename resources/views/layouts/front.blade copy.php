<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

        <!-- stylesheet -->
        <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

        <title>Laravel</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        @yield('styles')

    </head>
    <body>
        <div class="header">
            <div class="search-box-form d-flex">
                <div class="form-group has-search">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control search-box" placeholder="Search for a monster...">
                </div>
                <div class="login-form d-flex">
                    <button type="button" class="btn btn-custom">Log In</button>
                    <div style="margin-left:14px">
                        <i class="fa fa-globe language-icon"></i>
                    </div>
                </div>
            </div>
        </div>

        <div class="content">
            @yield('content')
        </div>

        <div class="footer" style="margin-top:50px">
            <footer>
                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <p style="color:#B9BDDC;font-style:italic;font-size:18px;margin-top:5px">Copyright © 2021 LostCenturia.gg. Tous droits réservés. </p>
                        </div>
                        <div class="col-6 text-right">
                            <p style="color:#B9BDDC;font-style:italic;font-size:12px">SW: Lost Centuria est une marque enregistrée par Com2Us. <br>Site fan non officiel et non affilié à Com2Us. </p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        @yield('scripts')
    </body>
</html>