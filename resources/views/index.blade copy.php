@extends('layouts.front')

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
    <div class="block-1" style="background:url({{ asset('assets/images/landing/bg-1.png') }})  no-repeat center center;">
        <div class="text-center" style="padding-top: 160px">
            <h1 class="font-weight-bold" style="font-size: 50px"><span class="text-white">Le Tool des joueurs de</span> <span class="main-color">Lost Centuria</span></h1>
            <img src="{{ asset('assets/images/landing/arrow.png') }}" class="arrow">
            <h5 class="text-white" style="font-size: 20px">Monstres, compos, guides, runes, caractéristiques...<br>Tout est là.</h5>
            <img src="{{ asset('assets/images/landing/down-arrow.png') }}" style="margin-top: 30px">
        </div>    
    </div>  
    <div class="block-2">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6">
                <img class="full-width" style="margin-top: -60px" src="{{ asset('assets/images/landing/bg-2.png') }}">
            </div>
            <div class="col-6 col-sm-6 col-md-6">
                <div class="">
                    <h4 class="text-white">Une création communautaire</h4>
                    <div class="under-line"></div>
                    <p class="text-color">Retrouvez les compositions et sets de runes créés par les membres de la communauté grâce à nos outils intégrés.</p>
                    <p class="text-color">Pensés spécialement pour vos monstres Summoners War: Lost Centuria, les compos et sets de runes des autres joueurs peuvent vous permettre de progresser rapidement en utilisant de nouvelles idées.</p>
                    <p class="text-color">Réalisez vos propres compos et sets de runes et partagez-les !</p>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-custom">Builder de compo</button>
                </div>
            </div>
        </div>
    </div>
    <div class="block-3 mt-80">
        <div class="row">
            <div class="col-6 col-sm-6 col-md-6">
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
            <div class="col-6 col-sm-6 col-md-6">
                <img class="full-width" style="margin-top: -30px" src="{{ asset('assets/images/landing/bg-3.png') }}">
            </div>
        </div>
    </div>
    <div class="block-4">
    </div>
    <div class="block-5">
    </div>
</div>
@endsection

@section('scripts')
@endsection
