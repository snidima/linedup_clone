@extends('layouts/admin')

@section('content')
    <div id="admin-app">



        <md-button class="md-raised md-primary" @click="$router.push({name: 'lessons'})">Уроки</md-button>
        <md-button class="md-raised md-primary" >Курсы</md-button>


        <router-view></router-view>

    </div>
@endsection