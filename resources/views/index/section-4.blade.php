
{{--<section class="section-4 section_price section" id="section-3">--}}
    {{--<div class="container">--}}
        {{--<h3 class="h3">Цены на видеокурс</h3>--}}

        {{--<div class="course-clock-wrapper">--}}
            {{--<div id="course-clock" data-seconds="{{$seconds}}"></div>--}}
        {{--</div>--}}

        {{--<div class="course-thumbs">--}}
            {{--@foreach( $courses as $course )--}}
            {{--<div class="course-thumbs__item course-thumb">--}}
                {{--<div class="course-thumb__block course-thumb-block">--}}
                    {{--<div class="course-thumb-block__price">--}}
                        {{--@if( $course->newPriceF )--}}
                        {{--<span class="course-thumb-block__price_sale">{{$course->regular->priceF}} руб.</span>--}}
                        {{--<br>--}}
                        {{--<span>{{ $course->regular->newPriceF  }} руб.</span>--}}
                        {{--@else--}}
                            {{--<span>{{ $course->regular->priceF  }} руб.</span>--}}
                        {{--@endif--}}
                    {{--</div>--}}
                    {{--<div class="course-thumb-block__header course-thumb-block-header">--}}
                        {{--<div class="course-thumb-block-header__title">{{$course->title}}</div>--}}
                        {{--<div class="course-thumb-block-header__info course-thumb-block-header-info">--}}
                            {{--<div class="course-thumb-block-header-info__item">--}}
                                {{--Дата проведения:--}}
                                {{--{{$course->regular->dateStartF->toDateString()}}--}}
                                {{-----}}
                                {{--{{$course->regular->dateEnd->toDateString()}}--}}
                            {{--</div>--}}
                            {{--<div class="course-thumb-block-header-info__item">Продолжительность (дней): {{$course->lessons->sum('duration')}}</div>--}}
                            {{--<div class="course-thumb-block-header-info__item">Уроков: {{count($course->lessons)}}</div>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    {{--<div class="course-thumb-block__content course-thumb-block-content">--}}
                        {{--<div class="course-thumb-block-content__title">--}}
                            {{--Описание курса--}}
                        {{--</div>--}}
                        {{--<div class="course-thumb-block-content__text">--}}
                            {{--{{$course->description}}--}}
                        {{--</div>--}}
                    {{--</div>--}}
                {{--</div>--}}
                {{--<div class="course-thumb__btn">--}}
                    {{--<a target="_blank" href="{{route('buy',['id' => $course->regular->id])}}" class="btn btn-big btn-type-1"><i class="fa fa-check-square-o" aria-hidden="true"></i>Записаться</a>--}}
                {{--</div>--}}
            {{--</div>--}}
            {{--@endforeach--}}
        {{--</div>--}}

    {{--</div>--}}
{{--</section>--}}

<section class="section">
    <div class="container">
        <h3 class="h3">Цены на видеокурс</h3>

        <div class="courses-thumb-wrapper">
            @include('partials/course-thumb', [
                'classes' => [],
                'isDemo' => false,
                'link' => route('buy', ['id' => 1])
            ])

            @include('partials/course-thumb', [
                'classes' => ['demo'],
                'isDemo' => true,
                'link' => route('user.course', ['id' => 456])
            ])
        </div>
    </div>
</section>







