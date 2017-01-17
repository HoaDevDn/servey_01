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
                            {!! Form::button(trans('home.choices'), [
                                'url' => action('User\SurveyController@radioQuestion'),
                                'id' => 'radio-button',
                                'typeId' => 1
                                ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.checkboxes'), [
                                'url' => action('User\SurveyController@checkboxQuestion'),
                                'id' => 'checkbox-button',
                                'typeId' => 2
                                ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.short_answer'), [
                                'url' => action('User\SurveyController@shortQuestion'),
                                'id' => 'short-button',
                                'typeId' => 3
                                ]) !!}
                        </li>
                        <li>
                            {!! Form::button(trans('home.passage'), [
                                'url' => action('User\SurveyController@longQuestion'),
                                'id' => 'long-button',
                                'typeId' => 4
                                ]) !!}
                        </li>
                    </ul>
                </a>
            </div>
            <div class="hide"></div>
            {!! Form::submit('Finish', ['class'=>'bt-finish']) !!}
            {!! Form::hidden('', '', ['class'=>'input-hide']) !!}
        </div>
    {!! Form::close() !!}
@endsection
