@extends('user.master')
@section('content')
    {!! Form::open(['class' => 'form-horizontal', 'action ' => 'User\SurveyController@demo']) !!}
        <div class="content-question container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <input type="text" value="{{ trans('home.name_survey') }}">
                </div>
            </div>
            <div class="add-question col-md-1">
                <a class="glyphicon glyphicon-plus-sign">
                    <ul>
                        <li>
                            {!! Form::button(trans('home.choices'), ['id' => 'radio-button']) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.checkboxes'), ['id' => 'checkbox-button', 'typeId' => 2]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.short_answer'), ['id' => 'short-button']) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.passage'), ['id' => 'long-button']) !!}
                        </li>
                    </ul>
                </a>
            </div>
            <div class="hide"></div>
            {!! Form::submit('oke',['class'=>'bt-oke']) !!}
        </div>
    {!! Form::close() !!}
@endsection
