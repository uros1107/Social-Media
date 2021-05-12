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
<div class="container">
    <div class="block-1">
        <div class="text-center" style="padding-top: 160px">
            <h1 class="font-weight-bold" style="font-size: 50px"><span class="text-white">Le Tool des joueurs de</span> <span class="main-color">Lost Centuria</span></h1>
            <img src="{{ asset('assets/images/landing/arrow.png') }}" class="arrow">
            <h5 class="text-white" style="font-size: 20px">Monstres, compos, guides, runes, caractéristiques...<br>Tout est là.</h5>
            <img src="{{ asset('assets/images/landing/down-arrow.png') }}" style="margin-top: 30px">
        </div>    
    </div>  
    <div class="block-2">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="">
                    <h4 class="text-white">Une création communautaire</h4>
                    <div class="under-line"></div>
                    <p class="text-white">Retrouvez les compositions et sets de runes créés par les membres de la communauté grâce à nos outils intégrés.</p>
                    <p class="text-white">Pensés spécialement pour vos monstres Summoners War: Lost Centuria, les compos et sets de runes des autres joueurs peuvent vous permettre de progresser rapidement en utilisant de nouvelles idées.</p>
                    <p class="text-white">Réalisez vos propres compos et sets de runes et partagez-les !</p>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-custom">Builder de compo</button>
                </div>
            </div>
        </div>
    </div>
    <div class="block-3 mt-80">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12">
                <div class="text-right">
                    <h4 class="text-white">Des guides approfondis</h4>
                    <div class="under-line" style="display: inline-flex"></div>
                    <p class="text-color">Tous les monstres de Summoners War: Lost Centuria sont  présents sur notre DB avec leurs caractéristiques de base, leurs pierres de compétence et toutes leurs infos essentielles.</p>
                    <p class="text-color">Mais ce n'est pas tout ! Sur chaque page de monstre, vous pouvez aussi retrouver les sets de runes et les compositions créées par la communauté.</p>
                    <p class="text-color">Notre site partenaire JeuMobi propose également des guides et astuces sur les mécaniques du jeu et sur les stratégies PvP de SWLC en général.</p>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-custom">Builder de compo</button>
                </div>
            </div>
        </div>
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
@endsection

@section('scripts')
@endsection