@extends('layouts/user')

@section('title','Главная')

@section('content')
    <div class="container">
        <h1 class="user-h1">Добро пожаловать, <span class="color-1">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</span></h1>
    </div>
    <usermain></usermain>
@endsection