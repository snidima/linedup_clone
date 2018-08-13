@extends('layouts.admin.administrator')

@section('app')
    <div id="admin-app">

        <div class="admin-menu">
            <md-button class="md-raised" @click="$router.push({name: 'lessons'})">Уроки</md-button>
            <md-button class="md-raised" @click="$router.push({name: 'courses'})">Курсы</md-button>
            <md-button class="md-raised" @click="$router.push({name: 'courses.composition'})">Состав курса</md-button>
        </div>

        <router-view></router-view>

    </div>
@endsection