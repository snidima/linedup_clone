@extends('layouts/admin')

@section('content')
    <div id="admin-app">


        <div class="admin-menu">
            <md-button class="md-raised md-primary" @click="$router.push({name: 'lessons'})">Уроки</md-button>
            <md-button class="md-raised md-primary" @click="$router.push({name: 'courses'})">Курсы</md-button>
            <md-button class="md-raised md-primary" @click="$router.push({name: 'courses.composition'})">Состав курса</md-button>
            <md-button class="md-raised md-primary" @click="$router.push({name: 'chats'})">Чаты</md-button>
        </div>


            <router-view></router-view>

    </div>
@endsection