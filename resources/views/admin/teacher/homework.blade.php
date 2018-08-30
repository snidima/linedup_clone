@extends('layouts.admin.teacher')

@section('app')
    <div class="container-fluid">



        <div class="container">
            <h1 class="display-4 mb">Домашние задания №{{$homework->id}}</h1>
            
        <form action="{{route('admin.homework.post', ['id' =>$homework->id ])}}" method="POST">
            {{csrf_field()}}

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Имя</b></label>
                <div class="col-sm-10">
                    {{$homework->user->name}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>E-mail</b></label>
                <div class="col-sm-10">
                    {{$homework->user->email}}
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Курс</b></label>
                <div class="col-sm-10">
                    {{$homework->regular->course->title}} ({{$homework->regular->date_start}})
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label"><b>Урок</b></label>
                <div class="col-sm-10">
                    {{$homework->lesson->id}}
                </div>
            </div>



            <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"><b>Видео</b></label>
                <div class="col-sm-10">

                        <a href="{{$homework->youtube_link}}" target="_blank">Ссылка</a>

                </div>
            </div>

            <div class="form-group row">
                <label for="comment" class="col-sm-2 col-form-label"><b>Комментарий</b></label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="comment" id="comment" rows="5">{{$homework->comment}}</textarea>
                </div>
            </div>

            <div class="form-group row">
                <label for="rate" class="col-sm-2 col-form-label"><b>Оценка</b></label>
                <div class="col-sm-10">
                    <input class="form-control" name="rate" id="rate" type="number" value="{{$homework->rate}}">
                </div>
            </div>

            <div class="form-group row ">
                <label for="check" class="col-sm-2 col-form-label"><b>Проверено</b></label>
                <div class="col-sm-10">
                    @if( $homework->check )
                        <input id="check" type="checkbox" name="check" value="1" checked>
                    @else
                        <input id="check" type="checkbox" name="check" value="1">
                    @endif
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
        </form>
        </div>

    </div>
@endsection