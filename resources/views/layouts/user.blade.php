@extends('layouts/default')
@section('title','Школа видеомонтажа - личный кабинет')

@section('html')
    @include('partials/header')
    @include('partials/user-header')
    @include('partials/broadcrumbs')
    @yield('content')
@endsection

@section('assets')
    @parent
@endsection