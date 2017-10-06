@extends('layouts/default')

@section('html')

    @yield('content')
@endsection


@section('assets')
    @parent
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
@endsection

@include('partials/footer')
