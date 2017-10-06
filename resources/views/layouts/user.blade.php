@extends('layouts/default')
@section('title','Школа видеомонтажа - личный кабинет')

@section('html')
    @include('partials/header')
    @yield('content')
@endsection

@section('assets')
    @parent
@endsection