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
                    @include('partials/course-nav')
                    @include('partials/lesson-description')
                </div>
            </div>
        </div>



    </div>




@endsection