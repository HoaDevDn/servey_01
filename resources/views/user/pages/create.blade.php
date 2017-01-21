@extends('user.master')
@section('content')
    {!! Form::open(['class' => 'form-horizontal', 'action ' => 'User\SurveyController@demo']) !!}
        <div class="content-question container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    {!! Form::text('survey-name', 'surver name',
                        ['placeholder' => trans('home.name_survey'), 'required' => true])
                    !!}
                </div>
            </div>
            <div class="add-question col-md-1">
                <a class="glyphicon glyphicon-plus-sign">
                    <ul>
                        <li>
                            {!! Form::button(trans('home.choices'), ['id' => 'radio-button', 'typeId' => 1]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.checkboxes'), ['id' => 'checkbox-button', 'typeId' => 2]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.short_answer'), ['id' => 'short-button', 'typeId' => 3]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.passage'), ['id' => 'long-button', 'typeId' => 4]) !!}
                        </li>
                    </ul>
                </a>
            </div>
            <div class="hide"></div>
            {!! Form::submit('Finish', ['class'=>'bt-finish']) !!}
        </div>
    {!! Form::close() !!}
@endsection
