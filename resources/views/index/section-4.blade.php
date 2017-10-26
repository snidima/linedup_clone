<section class="section">
    <div class="container">
        <h3 class="h3">Курс стартует через:</h3>
        <div class="course-clock-wrapper">
            <div id="course-clock" data-seconds="{{$seconds}}"></div>
        </div>
    </div>
</section>

<section class="section-4 section_price section" id="section-3">
    <div class="container">
        <h3 class="h3">Цены на видеокурс</h3>

        <div class="course-thumbs">
            @foreach( $courses as $course )
            <div class="course-thumbs__item course-thumb">
                <div class="course-thumb__block course-thumb-block">
                    <div class="course-thumb-block__price">
                        @if( $course->newPriceF )
                        <span class="course-thumb-block__price_sale">{{$course->priceF}} руб.</span>
                        <br>
                        <span>{{ $course->newPriceF  }} руб.</span>
                        @else
                            <span>{{ $course->priceF  }} руб.</span>
                        @endif
                    </div>
                    <div class="course-thumb-block__header course-thumb-block-header">
                        <div class="course-thumb-block-header__title">{{$course->title}}</div>
                        <div class="course-thumb-block-header__info course-thumb-block-header-info">
                            <div class="course-thumb-block-header-info__item">
                                {{$course->regular->dateStartF->toDateString()}}
                                -
                                {{$course->dateEnd->toDateString()}}
                            </div>
                            <div class="course-thumb-block-header-info__item">Продолжительность: {{$course->duration}} дня</div>
                            <div class="course-thumb-block-header-info__item">{{count($course->lessons)}} уроков</div>
                        </div>
                    </div>
                    <div class="course-thumb-block__content course-thumb-block-content">
                        <div class="course-thumb-block-content__title">
                            Описание курса
                        </div>
                        <div class="course-thumb-block-content__text">
                            {{$course->description}}
                        </div>
                    </div>
                </div>
                <div class="course-thumb__btn">
                    <a href="{{route('buy',['id' => $course->regular->id])}}" class="btn btn-big btn-type-1"><i class="fa fa-check-square-o" aria-hidden="true"></i>Записаться</a>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
