@extends('layouts/user')

@section('title','Главная')

@section('content')

    <div class="container">
        <h1 class="h1 mb">Оплаченные курсы</h1>


        <div class="courses-thumb-wrapper">
            @foreach($courses as $course)
                @include('partials/course-thumb', ['course' => $course])
            @endforeach
        </div>
            <br>


    </div>

@endsection