

<section class="section-2 section">
    <div class="container">
        <h3 class="h3" id="lessons">Краткое содержание онлайн курса<br>Adobe After Effect - Базовый</h3>


        <div class="steps">

            @foreach( $lessons as $lesson )
            <div class="steps__step step">
                <div class="step__info step-info">
                    <div class="step-info-text">
                        <div class="step-info-text__title">
                            {{$lesson->title}}
                        </div>
                        <div class="step-info-text__info">
                            {!! $lesson->short_description !!}
                        </div>
                        {{--<div class="step-info-text__btn">--}}
                            {{--<div class="btn btn-small btn-type-2">--}}
                                {{--Смотреть демо--}}
                            {{--</div>--}}
                        {{--</div>--}}
                    </div>
                </div>
                <div class="step__time step-time">
                    <div class="step-time-text">
                        <div class="step-time-text__icon">
                            <svg viewBox="0 0 60 60">
                                <path d="M30,0C13.5,0,0,13.5,0,30s13.5,30,30,30s30-13.5,30-30S46.5,0,30,0z M30,58C14.6,58,2,45.4,2,30S14.6,2,30,2s28,12.6,28,28
                                S45.4,58,30,58z M31,26V15.9c0-0.6-0.4-1-1-1s-1,0.4-1,1V26c-1.4,0.4-2.5,1.5-2.9,2.9H19c-0.6,0-1,0.4-1,1s0.4,1,1,1h7.1
                                c0.4,1.7,2,3,3.9,3c2.2,0,4-1.8,4-4C34,28,32.7,26.5,31,26z M30,31.9c-1.1,0-2-0.9-2-2s0.9-2,2-2s2,0.9,2,2S31.1,31.9,30,31.9z
                                 M30,9.9c0.6,0,1-0.4,1-1v-1c0-0.6-0.4-1-1-1s-1,0.4-1,1v1C29,9.4,29.4,9.9,30,9.9z M30,49.9c-0.6,0-1,0.4-1,1v1c0,0.6,0.4,1,1,1
                                s1-0.4,1-1v-1C31,50.3,30.6,49.9,30,49.9z M52,28.9h-1c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c0.6,0,1-0.4,1-1S52.6,28.9,52,28.9z M9,28.9H8
                                c-0.6,0-1,0.4-1,1s0.4,1,1,1h1c0.6,0,1-0.4,1-1S9.6,28.9,9,28.9z M44.8,13.6l-0.7,0.7c-0.4,0.4-0.4,1,0,1.4c0.2,0.2,0.5,0.3,0.7,0.3
                                s0.5-0.1,0.7-0.3l0.7-0.7c0.4-0.4,0.4-1,0-1.4S45.2,13.2,44.8,13.6z M14.4,44l-0.7,0.7c-0.4,0.4-0.4,1,0,1.4
                                c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3l0.7-0.7c0.4-0.4,0.4-1,0-1.4S14.8,43.6,14.4,44z M45.6,44c-0.4-0.4-1-0.4-1.4,0
                                s-0.4,1,0,1.4l0.7,0.7c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L45.6,44z M15.2,13.6c-0.4-0.4-1-0.4-1.4,0
                                s-0.4,1,0,1.4l0.7,0.7c0.2,0.2,0.5,0.3,0.7,0.3s0.5-0.1,0.7-0.3c0.4-0.4,0.4-1,0-1.4L15.2,13.6z"/>
                            </svg>
                        </div>
                        <div class="step-time-text__text">
                            Дней: {{$lesson->duration}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>


    </div>
</section>

