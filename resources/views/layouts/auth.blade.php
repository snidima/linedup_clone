@extends('layouts/default')

@section('html')
    <div class="top-full-screen">
        @include('partials/header')
        <section class="main-center">
            @yield('full-screen-block')
        </section>
    </div>
    @yield('content')
@endsection

