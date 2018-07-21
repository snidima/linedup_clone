@extends('layouts/user')

@section('title','Главная')

@section('content')
    {{--<div class="container">--}}
        {{--<h1 class="user-h1">Добро пожаловать на курс, <span class="color-1">{{ \Illuminate\Support\Facades\Auth::user()->name  }}!</span></h1>--}}
        {{--hello--}}
    {{--</div>--}}
    <div class="container">
        <h1 class="h1 mb">Мои курсы</h1>

        @include('partials/course-thumb', array(
            'target' => 'user-page'
        ))
        @include('partials/course-thumb', array(
            'target' => 'user-page',
        ))
    </div>

@endsection