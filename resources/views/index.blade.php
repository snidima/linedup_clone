@extends('layouts/main')
@section('title','Главная')

@section('content')
    @include('index/section-1')
    @include('index/section-2')
    @include('index/section-3')


    <div id="menu-content" style="display: none;">
        <div class="menu-wrapper">
            <div class="menu">
                <a href="#section-3" class="menu__item">Главная</a>
                <a href="#" class="menu__item">Для кого этот курс</a>
                <a href="#" class="menu__item">Цены</a>
                <a href="#" class="menu__item menu__item_user">Цены</a>
            </div>
        </div>
    </div>

    <div class="menu2">
        <div class="menu-wrapper">
            <div class="menu">
                <a href="#section-3" class="menu__item">Главная</a>
                <a href="#" class="menu__item">Для кого этот курс</a>
                <a href="#" class="menu__item">Цены</a>
                <a href="#" class="menu__item menu__item_user">Цены</a>
            </div>
            <div id="rjnownge">qwqwgf</div>
        </div>

    </div>
@endsection