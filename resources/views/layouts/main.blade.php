@extends('layouts/default')
@section('title','Школа видеомонтажа - личный кабинет')

@section('html')
    @if( \Illuminate\Support\Facades\Auth::check() )
        @if( array_intersect(\Illuminate\Support\Facades\Auth::user()->roles->pluck('slug')->toArray(), ['administrator']) )
            <div class="container" style="padding: 10px 0;">
                <a href="/administrator#/lessons">Настройки курса</a> |
                <a href="/manager/clients">Клиенты</a> |
                <a href="/teacher/homeworks">Домашние задания</a>
            </div>
        @endif
    @endif
    @include('partials/header')
    @yield('content')
@endsection

@section('assets')
    @parent
@endsection