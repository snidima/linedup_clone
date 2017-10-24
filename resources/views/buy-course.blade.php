@extends('layouts/default')

@section('html')
    <div class="top-full-screen">
        @include('partials/header')
        <section class="main-center main-center_gray">
            <div class="container">


                        <div class="course-thumb course-thumb_buy">
                            <div class="course-thumb__block course-thumb-block">
                                <div class="course-thumb-block__header course-thumb-block-header">
                                    <div class="course-thumb-block-header__title">Adobe After Effect. Расширенный</div>
                                    <div class="course-thumb-block-header__info course-thumb-block-header-info">
                                        <div class="course-thumb-block-header-info__item">18 октября 2017 г. - 23 октября 2017 г.</div>
                                        <div class="course-thumb-block-header-info__item">Продолжительность: 64 дня</div>
                                        <div class="course-thumb-block-header-info__item">10 уроков</div>
                                    </div>
                                </div>
                                <div class="course-thumb-block__content course-thumb-block-content">
                                    <div class="course-thumb-block-content__title">
                                        Описание курса
                                    </div>
                                    <div class="course-thumb-block-content__text">
                                        Lorem Ipsum - это текст-"рыба", часто используемый в печати и вэб-дизайне.
                                        Lorem Ipsum является стандартной "рыбой" для текстов на латинице с начала XVI века.
                                        В то время некий безымянный печатник создал большую коллекцию размеров и форм шрифтов,
                                        используя Lorem Ipsum для распечатки образцов.
                                    </div>



                                </div>
                                <div class="buy-course">

                                    <div class="buy-course-top">
                                        <div class="buy-course-title">
                                            Шаг <span class="active">1</span> из 2
                                        </div>
                                        <div class="buy-course-reg-method-btn">
                                            <span class="active"><i class="fa fa-unlock" ></i> Регистрация</span> / <span><i class="fa fa-sign-in"></i> Войти</span>
                                        </div>
                                    </div>
                                    <Register theme="white"></Register>

                                </div>
                            </div>
                        </div>


            </div>
        </section>
    </div>
@endsection




@include('partials/footer')
