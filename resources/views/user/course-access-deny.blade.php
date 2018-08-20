@extends('layouts/user')

@section('title','Личный кабинет - Доступ закрыт')

@section('content')
    <div class="container">
        <h1 class="h1 with-line">Доступ к уроку закрыт</h1>
        <p>
            Пожалуйста, перейдите на <a href="{{route('buy',['course'=>$regular->id])}}">страницу оплаты</a> и завершите платеж
        </p>
    </div>
@endsection