@extends('layouts.admin.manager')

@section('app')
    <div class="container">
        <h1 class="mb">Пользователь №{{$user->id}} {{$user->name}} - {{$user->email}}</h1>

        <h3 class="mb" style="text-align: right">Оплаченные платежи</h3>
        <table class="table table-striped ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Курс</th>
                <th scope="col">Сумма</th>
                <th scope="col">Промокод</th>
                <th scope="col">Информация о платеже</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $billings as $billing )
                <tr>
                    <td>{{$billing->regular->course->title}} №{{$billing->regular->id}} (от {{\Carbon\Carbon::parse($billing->regular->date_start)->toDateString('Y-m-d')}})</td>
                    <td>{{$billing->amount}}</td>
                    <td>
                        @if( $billing->promo )
                            $billing->promo
                        @else
                            Нет
                        @endif
                    </td>
                    <td>{{$billing->information}}</td>
                    <td>{{$billing->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <h3 class="mb" style="text-align: right">Созданные платежи</h3>
        <table class="table table-striped ">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Курс</th>
                <th scope="col">Сумма</th>
                <th scope="col">Промокод</th>
                <th scope="col">Информация о платеже</th>
                <th scope="col">Дата</th>
            </tr>
            </thead>
            <tbody>

            @foreach( $billingsTmp as $billing )
                <tr>
                    <td>{{$billing->regular->course->title}} №{{$billing->regular->id}} (от {{\Carbon\Carbon::parse($billing->regular->date_start)->toDateString('Y-m-d')}})</td>
                    <td>{{$billing->amount}}</td>
                    <td>
                        @if( $billing->promo )
                            $billing->promo
                        @else
                            Нет
                        @endif
                    </td>
                    <td>{{$billing->information}}</td>
                    <td>{{$billing->created_at}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

    </div>

@endsection