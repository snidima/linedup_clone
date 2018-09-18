@extends('layouts.admin.manager')

@section('app')
    <div class="container">
        <h1 class="mb">Платежи</h1>

        <td><a href="{{route('admin.manager.billing.add')}}" class="btn btn-sm btn-success">Добавить платеж</a></td>
        <hr>

        <table class="table table-striped ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Пользователь</th>
                <th scope="col">Курс</th>
                <th scope="col">Сумма</th>
                <th scope="col">Детали платежа</th>
                <th scope="col">Подробности</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $billings as $billing )
                <tr>
                    <th scope="row">{{$billing->id}}</th>
                    <td>{{$billing->user->name}}<br>{{$billing->user->email}} ( {{$billing->user->id}} )</td>
                    <td>{{\Carbon\Carbon::parse($billing->regular->date_start)->format('d F')}} ( {{$billing->regular->id}} )</td>
                    <td>{{$billing->amount}}</td>
                    <td>{{dump($billing->InformationJSON)}}</td>
                    <td><a href="{{route('admin.manager.billing', ['id' => $billing->id])}}" class="btn btn-sm btn-primary">Подробности</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div style="display: flex; justify-content: flex-end">
            {{$billings->links()}}
        </div>

    </div>



@endsection