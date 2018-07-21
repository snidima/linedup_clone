@extends('layouts/user')

@section('title','Главная')

@section('content')
    {{--<div class="container">--}}
        {{--<h1 class="user-h1">Добро пожаловать на курс, <span class="color-1">{{ \Illuminate\Support\Facades\Auth::user()->name  }}!</span></h1>--}}
        {{--hello--}}
    {{--</div>--}}
    <div class="container">
        <h1 class="h1 mb">Мои курсы</h1>

        <div class="courses-thumb--wrapper">
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

@endsection