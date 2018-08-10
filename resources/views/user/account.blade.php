@extends('layouts/user')

@section('title','Личный кабинет - настройка аккаунта')

@section('content')

    <div class="container">
        <h1 class="h1 with-line">Настройки аккаунта:</h1>




        <div class="account">



            <form action="{{route('user.change-password')}}" method="POST">
                {{csrf_field()}}
                <h4>Изменение пароля</h4>

                <div class="field">
                    <label for="">Текущий пароль</label>
                    <input type="text" class="gray" name="current_password"/>
                    @if ($errors->get('current_password'))
                        <ul class="errors">
                            @foreach ($errors->get('current_password') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="field">
                    <label for="">Новый пароль</label>
                    <input type="text" class="gray" name="new_password"/>
                    @if ($errors->get('new_password'))
                        <ul class="errors">
                            @foreach ($errors->get('new_password') as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>

                <div class="field submit">
                    <input type="submit" value="Сохранить" class="btn btn-medium btn-type-2">
                </div>

            </form>




        </div>

    </div>

@endsection