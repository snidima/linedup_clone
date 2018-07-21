@extends('layouts/user')

@section('title','Главная')

@section('content')
    <div class="container">
        <h1 class="h1 mb">Adobe After Effects - Базовый курс</h1>

        <div class="user-course">
            <div class="user-course__aside">
                @include('partials/user-aside')
            </div>
            <div class="user-course__content">
                <div class="user-course-content">

                    <div class="course-nav">
                        <div class="course-nav__prev course-nav-prev">
                            <div class="course-nav-prev__texts course-nav-prev-texts">
                                <div class="course-nav-prev-texts__time">
                                    Прошел 7 дней назад
                                </div>
                                <div class="course-nav-prev-texts__title">
                                    Урок №4. Зеленый фон
                                </div>
                            </div>
                            <div class="course-nav-prev__icon">
                                <svg version="1.1"  xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 31.5 22.1" style="enable-background:new 0 0 31.5 22.1;" xml:space="preserve">
                                    <path class="st0" d="M10.3,0.3c0.4-0.4,1.1-0.4,1.6,0c0.4,0.4,0.4,1.1,0,1.6l-8,8h26.6c0.6,0,1.1,0.5,1.1,1.1s-0.5,1.1-1.1,1.1H3.8
                                    l8,8c0.4,0.4,0.4,1.2,0,1.6c-0.4,0.4-1.1,0.4-1.6,0l-10-10c-0.4-0.4-0.4-1.1,0-1.6L10.3,0.3z"/>
                                </svg>
                            </div>
                        </div>

                        <div class="course-nav__current">
                            Урок №5. Анимация
                        </div>
                        <div class="course-nav__next course-nav-next">

                            <div class="course-nav-next__icon">
                                <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                     viewBox="0 0 31.5 22.1" style="enable-background:new 0 0 31.5 22.1;" xml:space="preserve">

                                    <path class="st0" d="M21.2,21.8c-0.4,0.4-1.1,0.4-1.6,0c-0.4-0.4-0.4-1.1,0-1.6l8-8H1.1c-0.6,0-1.1-0.5-1.1-1.1S0.5,10,1.1,10h26.6
                                    l-8-8c-0.4-0.4-0.4-1.2,0-1.6c0.4-0.4,1.1-0.4,1.6,0l10,10c0.4,0.4,0.4,1.1,0,1.6L21.2,21.8z"/>
                                </svg>
                            </div>


                            <div class="course-nav-next__texts course-nav-next-texts">
                                <div class="course-nav-next-texts__time">
                                    Прошел 7 дней назад
                                </div>
                                <div class="course-nav-next-texts__title">
                                    Урок №4. Зеленый фон
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>




@endsection