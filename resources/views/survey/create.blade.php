@extends('user.master')
@section('content')
    {!! Form::open([ 'action ' => 'SurveyController@create', 'class' => 'form-horizontal']) !!}
        <div class="content-question container">
            <div class="row">
                <div class="col-md-1"></div>
                    <div class="col-md-6">
                        {!! Form::text('survey-name', 'surver name', [
                            'placeholder' => trans('home.name_survey'),
                            'required' => true,
                        ]) !!}
                    </div>
                    <div class="col-md-5 col-option" >
                        <div class="squaredOne">
                            {{ Form::checkbox('check', 'None', '', [
                                'id' => 'squaredTwo',
                            ]) }}
                            {{ Form::label('squaredOne', ' ') }}


                        </div>
                        <div class="div-public">Public</div>
                        <div class="div-finish" style="display: none;">
                            {!! Form::submit(trans('home.finish'), [
                                'class'=>'bt-finish',
                            ]) !!}
                        </div>
                    </div>
            </div>
            <div class="add-question col-md-1">
                <a class="glyphicon glyphicon-plus-sign">
                    <ul>
                        <li>
                            {!! Form::button(trans('home.choices'), [
                                'url' => action('SurveyController@radioQuestion'),
                                'id' => 'radio-button',
                                'typeId' => config('survey.type_radio'),
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.checkboxes'), [
                                'url' => action('SurveyController@checkboxQuestion'),
                                'id' => 'checkbox-button',
                                'typeId' => config('survey.type_checkbox'),
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.short_answer'), [
                                'url' => action('SurveyController@shortQuestion'),
                                'id' => 'short-button',
                                'typeId' => config('survey.type_short'),
                            ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.passage'), [
                                'url' => action('SurveyController@longQuestion'),
                                'id' => 'long-button',
                                'typeId' => config('survey.type_long'),
                            ]) !!}
                        </li>
                    </ul>
                </a>
            </div>
            <div class="hide"></div>

        </div>
    {!! Form::close() !!}
@endsection
@section('content-bot')
    <div class="inner">
        <h2>{{ trans('home.wellcome') }}, {{ Auth::user()->name }}</h1>
    </div>
@endsection
