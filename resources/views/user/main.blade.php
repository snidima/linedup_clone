@extends('layouts/user')

@section('title','Личный кабинет - доступные курсы')

@section('content')

    <div class="container">
        <h1 class="h1 with-line">Доступные курсы:</h1>
        <div class="courses-thumb-wrapper">
            @foreach($courses as $course)
                @include('partials/course-thumb', ['course' => $course])
            @endforeach
        </div>
            <br>


    </div>

@endsection