@extends('layouts/default')

@section('html')
    @yield('content')
@endsection


@section('assets')
    <link rel="stylesheet" href="//fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="{{ mix('/css/admin.css') }}">

    <script src="{{ mix('/js/manifest.js') }}"></script>
    <script src="{{ mix('/js/vendor.js') }}"></script>
    <script src="{{ mix('/js/admin.js') }}"></script>
@endsection

@include('partials/footer')
