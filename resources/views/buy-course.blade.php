@extends('layouts/default')

@section('html')
    <div class="top-full-screen">
        <section class="main-center main-center_gray">
            <div class="container">



                <div class="course-thumb course-thumb_buy">

                    <div class="course-thumb-title-wrapper">
                        <a href="{{route('main')}}">Вернуться на сайт</a>
                        <h1 class="course-thumb-title-top">Купить курс <b></b>"Adobe After Effect. Расширенный"</h1>
                    </div>

                    <div class="course-thumb__block course-thumb-block">
                        <div class="course-thumb-block__price">
                            @if( $regular->course->newPriceF )
                                <span class="course-thumb-block__price_sale">{{$regular->course->priceF}} руб.</span>
                                <br>
                                <span>{{ $regular->newPriceF  }} руб.</span>
                            @else
                                <span>{{ $regular->priceF  }} руб.</span>
                            @endif
                        </div>
                        <div class="course-thumb-block__header course-thumb-block-header">
                            <div class="course-thumb-block-header__title">{{$regular->course->title}}</div>
                            <div class="course-thumb-block-header__info course-thumb-block-header-info">
                                <div class="course-thumb-block-header-info__item">
                                    Даты проведения:
                                    {{$regular->course->regular->dateStartF->toDateString()}}
                                    -
                                    {{$regular->course->dateEnd->toDateString()}}
                                </div>
                                <div class="course-thumb-block-header-info__item">Продолжительность (дней): {{$regular->course->duration}} </div>
                                <div class="course-thumb-block-header-info__item">Уроков: {{count($regular->course->lessons)}}</div>
                            </div>
                        </div>
                        <div class="course-thumb-block__content course-thumb-block-content">
                            <div class="course-thumb-block-content__title">
                                Описание курса
                            </div>
                            <div class="course-thumb-block-content__text">
                                {!! $regular->course->description !!}
                            </div>
                        </div>
                        <buyswitcher price="{{$regular->finalPrice}}" course="{{$regular->course->id}}"></buyswitcher>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection