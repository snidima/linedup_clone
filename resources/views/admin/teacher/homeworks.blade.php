@extends('layouts.admin.teacher')

@section('app')
    <div class="container-fluid">

        <h1 class="display-4 mb">Домашние задания</h1>

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">Имя</th>
                <th scope="col">Курс</th>
                <th scope="col">Урок</th>
                <th scope="col">Дата</th>
                <th scope="col">Перейти</th>
            </tr>
            </thead>
            <tbody>
            @foreach($homeworks as $homework)
                <tr>
                    <td>{{$homework->user->name}}</td>
                    <td>{{$homework->regular->course->title}}</td>
                    <td>{{$homework->lesson->title}}</td>
                    <td>{{$homework->created_at}}</td>
                    <td><a href="{{route('admin.homework.get',['id' => $homework->id])}}" class="btn btn-primary btn-sm active" role="button" aria-pressed="true">Редактировать</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>


    </div>
@endsection