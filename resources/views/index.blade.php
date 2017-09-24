@extends('layouts/main')
@section('title','Главная')

@section('full-screen-block')
    @include('index/section-1')
@endsection

@section('content')
    @include('index/section-2')
    @include('index/section-3')
    @include('index/section-4')
    @include('index/section-5')
    @include('index/section-6')
@endsection