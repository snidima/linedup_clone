@extends('layouts.admin.manager')

@section('app')
    <div class="container-fluid">



        <div class="container">
            <h1 class="display-4 mb">Создание платежа</h1>

            <form action="{{route('admin.manager.billing.add.post')}}" method="POST">
                {{csrf_field()}}

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Имя</b></label>
                    <div class="col-sm-10">
                        <select name="user_id" id="regular" class="form-control">
                        @foreach($users as $user)
                            @if($user->activated)
                                <option value="{{$user->id}}">{{$user->name}} - {{$user->email}} ({{$user->id}})</option>
                            @endif
                        @endforeach
                        </select>
                    </div>
                </div>




                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="regular"><b>Курс</b></label>
                    <div class="col-sm-10">
                        <select name="course_id" id="regular" class="form-control">
                            @foreach($regulars as $regular)
                                @if(!$regular->course->isDemo)
                                    <option value="{{$regular->id}}">{{\Carbon\Carbon::parse($regular->date_start)->format('d F')}} ( {{$regular->id}} )</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Сумма</b></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="0" name="amount">
                    </div>
                </div>




                <button type="submit" class="btn btn-success">Создать</button>
            </form>
        </div>

    </div>
@endsection