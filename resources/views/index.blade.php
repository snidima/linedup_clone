@extends('layouts/user')

@section('title','Главная')

@section('content')
    @include('index/section-1')
    @include('index/section-2')
    @include('index/section-3')
    @include('index/section-4')
    {{--@include('index/section-5')--}}
    {{--@include('index/section-6')--}}
@endsection