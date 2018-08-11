@extends('layouts/auth')
@section('title','Регистрация')

@section('full-screen-block')
    <a href="https://oauth.vk.com/authorize?client_id=6658848&redirect_uri={{route('user.registerVK')}}">VK</a>
    <Register></Register>
@endsection