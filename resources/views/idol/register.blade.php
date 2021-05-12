@extends('layouts.front')

@section('title', 'Welcome to MillionK')

@section('styles')
<style>
.block-1 {
    -moz-background-size: cover;
    background-size: cover;
    -o-background-size: cover;
    height: 600px;
}
.arrow {
    margin-top: 10px;
    margin-bottom: 15px;
}
.mt-80 {
    margin-top: 80px;
}
.under-line {
    height: 2px;
    background: #D9BC84;
    width: 120px;
    margin-bottom: 15px;
    margin-top: 12px;
}
</style>
@endsection

@section('content')
<div class="content">
    <div>
        <img src="{{ asset('assets/images/bg.png') }}" class="w-100">
    </div>
    <div class="container">
        <div class="block-1">  
        </div>  
        <div class="block-2">
        </div>
        <div class="block-3 mt-80">
        </div>
        <div class="block-4">
        </div>
        <div class="block-5">
        </div>
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
</div>

@endsection

@section('scripts')
@endsection