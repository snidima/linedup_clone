@extends('layouts.admin.manager')

@section('app')
    <div class="container-fluid">



        <div class="container">
            <h1 class="display-4 mb">Платеж №{{$billing->id}}</h1>

            <form action="{{route('admin.manager.billing.post', ['id' =>$billing->id ])}}" method="POST">
                {{csrf_field()}}

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Имя</b></label>
                    <div class="col-sm-10">
                        {{$billing->user->name}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Email</b></label>
                    <div class="col-sm-10">
                        {{$billing->user->email}}
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Дата создания</b></label>
                    <div class="col-sm-10">
                        {{$billing->created_at->format('d F, H:m')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Дата изменения</b></label>
                    <div class="col-sm-10">
                        {{$billing->updated_at->format('d F, H:m')}}
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Сумма</b></label>
                    <div class="col-sm-10">
                        <input type="number" class="form-control" value="{{$billing->amount}}" name="amount">
                    </div>
                </div>



                <div class="form-group row">
                    <label class="col-sm-2 col-form-label" for="regular"><b>Курс</b></label>
                    <div class="col-sm-10">
                        <select name="regular" id="regular" class="form-control">
                            @foreach($regulars as $regular)
                                @if(!$regular->course->isDemo)

                                    @if( $regular->id == $billing->course_id )
                                        <option value="{{$regular->id}}" selected="selected">{{\Carbon\Carbon::parse($regular->date_start)->format('d F')}} ( {{$regular->id}} )</option>
                                    @else
                                        <option value="{{$regular->id}}">{{\Carbon\Carbon::parse($regular->date_start)->format('d F')}} ( {{$regular->id}} )</option>
                                    @endif

                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>


                <div class="form-group row">
                    <label class="col-sm-2 col-form-label"><b>Информация</b></label>
                    <div class="col-sm-10">
                        @if( $billing->InformationJSON == 'Manual pay' )
                            Платеж создан вручную
                        @else
                            {{dump($billing->InformationJSON)}}
                        @endif

                    </div>
                </div>



                <button type="submit" class="btn btn-primary">Сохранить</button>
                <input type="reset" class="btn btn-secondary" value="Отменить">
            </form>
        </div>

    </div>
@endsection