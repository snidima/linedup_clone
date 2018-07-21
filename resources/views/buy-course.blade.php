@extends('layouts/default')

@section('html')
    <div class="top-full-screen">
        <section class="main-center main-center_gray">
            <div class="container">
                <div class="course-buy-thumb course-buy-thumb_buy">

                    <div class="course-buy-thumb-title-wrapper">
                        <a href="{{route('main')}}">Вернуться на сайт</a>
                    </div>

                    <div class="course-buy-thumb__block course-buy-thumb-block">
                        <div class="course-buy-thumb-block__price">
                            @if( $regular->course->newPriceF )
                                <span class="course-buy-thumb-block__price_sale">{{$regular->course->priceF}} руб.</span>
                                <br>
                                <span>{{ $regular->newPriceF  }} руб.</span>
                            @else
                                <span>{{ $regular->priceF  }} руб.</span>
                            @endif
                        </div>
                        <div class="course-buy-thumb-block__header course-buy-thumb-block-header">
                            <div class="course-buy-thumb-block-header__title">Купить курс<br>"{{$regular->course->title}}"</div>
                            <div class="course-buy-thumb-block-header__info course-buy-thumb-block-header-info">
                                <div class="course-buy-thumb-block-header-info__item">
                                    Даты проведения:
                                    {{$regular->dateStartF->toDateString()}}
                                    -
                                    {{$regular->dateEnd->toDateString()}}
                                </div>
                                <div class="course-buy-thumb-block-header-info__item">Продолжительность (дней): {{$regular->course->lessons->sum('duration')}} </div>
                                <div class="course-buy-thumb-block-header-info__item">Уроков: {{count($regular->course->lessons)}}</div>
                            </div>
                        </div>
                        <div class="course-buy-thumb-block__content course-buy-thumb-block-content">
                            <div class="course-buy-thumb-block-content__title">
                                Описание курса
                            </div>
                            <div class="course-buy-thumb-block-content__text">
                                {!! $regular->course->description !!}
                            </div>
                        </div>
                        <buyswitcher price="{{$regular->finalPrice}}" course="{{$regular->id}}"></buyswitcher>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection