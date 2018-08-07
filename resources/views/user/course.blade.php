@extends('layouts/user')

@section('title','Личный кабинет -'.$regular->course->title.' - '.$lesson->title)

@section('content')
    <div class="container">
        <h1 class="h1 with-line">{{$regular->course->title}}</h1>

        @if( \Carbon\Carbon::now() < $lesson->date_start && !$regular->course->isDemo)
            <div class="lesson-access-deny">
                Урок начнется: <br>
                {{$lesson->date_start}} (МСК)
                @if( $prevLesson )
                    <br>
                    <a href="{{route('user.lesson',['course' => $courseID, 'lesson' => $lessonID-1])}}">Вернуться к прошлому уроку</a>
                @endif
            </div>
        @else
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
        @endif



    </div>




@endsection