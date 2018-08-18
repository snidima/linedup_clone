@extends('layouts.admin.manager')

@section('app')
    <div class="container">
        <h1 class="mb">Пользователи</h1>

        <table class="table table-striped ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Имя</th>
                <th scope="col">E-mail</th>
                <th scope="col">Активирован</th>
                <th scope="col">Дата регистрации</th>
                <th scope="col">Подробности</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $users as $user )
            <tr>
                <th scope="row">{{$user->id}}</th>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>
                    @if( $user->activated )
                        Да
                    @else
                        Нет
                    @endif
                </td>
                <td>{{$user->created_at}}</td>
                <td><a href="{{route('admin.manager.client', ['id' => $user->id])}}" class="btn btn-sm btn-primary">Подробности</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection