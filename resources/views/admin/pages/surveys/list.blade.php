@extends('admin.master')
@section('content')
<div class="row" id="survey-list">
    <div class="hide" data-route="{!! url('/') !!}"></div>
    <div class="col-md-12">
    {!! Form::open(['action' => 'Admin\SurveyController@changeFeature']) !!}
        <div class="card">
            <div class="header">
                <h4 class="title">{{ trans('generate.list') }} {{ trans('generate.survey') }}</h4>
                <p class="category">{{ trans('generate.exampe') }}</p>
            </div>
            <div class="content table-responsive table-full-width" id="table">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>{{ trans('generate.id') }}</th>
                        <th>{{ trans('generate.title') }}</th>
                        <th>{{ trans('generate.email') }}</th>
                        <th>{{ trans('generate.status.generate') }}</th>
                        <th>{{ trans('generate.chocies') }}</th>
                        <th>{{ trans('generate.remove') }}</th>
                    </thead>
                    @foreach ($surveyFeature as $key => $survey)
                    <tbody class="sva{{ $survey->id }}">
                        <tr>
                            <td>{{ $survey->id }}</td>
                            <td>{{ $survey->title }}</td>
                            <td>{{ $survey->user->email }}</td>
                            <td>{{ trans('generate.survey.generate') }}</td>
                            <td>
                                {!! Form::checkbox('checkbox-survey-change[]', $survey->id, '', ['data-toggle' => 'checkbox', "id-survey[$key]" => $survey->id, 'class' => 'bt-form']) !!}
                            </td>
                            <td>
                                {!! Form::button('<i class="fa fa-remove"></i>', [
                                    'class' => 'btn btn-info btn-simple btn-xs remove-sva',
                                    'title' => trans('admin.remove'),
                                    'rel' => 'tooltip',
                                    'id-survey' => $survey->id
                                ]) !!}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {!! Form::button(trans('admin.change_feature'), [
            'class' => 'btn btn-primary',
            'id' => 'changeFeature',
            'type' => 'submit'
        ]) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">{{ trans('generate.list') }} {{ trans('generate.survey') }}</h4>
                <p class="category">{{ trans('generate.exampe') }}</p>
            </div>
            {!! Form::open(['action' => 'Admin\SurveyController@updateFeature']) !!}
            <div class="content table-responsive table-full-width" id="table">
                <table class="table table-hover">
                    <thead>
                        <th>{{ trans('generate.id') }}</th>
                        <th>{{ trans('generate.title') }}</th>
                        <th>{{ trans('generate.email') }}</th>
                        <th>{{ trans('generate.status.generate') }}</th>
                        <th>{{ trans('generate.chocies') }}</th>
                        <th>{{ trans('generate.remove') }}</th>
                    </thead>
                    @foreach($surveys as $survey)
                    <tbody class="svb{{ $survey->id }}">
                        <tr>
                            <td>{{ $survey->id }}</td>
                            <td>{{ $survey->title }}</td>
                            <td>{{ $survey->user->email }}</td>
                            <td>{{ trans('generate.survey.generate') }}</td>
                            <td>
                                {!! Form::checkbox('checkbox-survey-update[]', $survey->id, '', ['data-toggle' => 'checkbox', "id-survey[]" => $survey->id, 'class' => 'bt-form']) !!}
                            </td>
                            <td>
                                {!! Form::button('<i class="fa fa-remove"></i>', [
                                    'class' => 'btn btn-info btn-simple btn-xs remove-svb',
                                    'title' => trans('admin.remove'),
                                    'rel' => 'tooltip',
                                    'id-survey' => $survey->id
                                ]) !!}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {!! Form::button(trans('admin.update_feature'), [
            'class' => 'btn btn-primary',
            'id' => 'updateFeature',
            'type' => 'submit',
        ]) !!}
        {!! Form::close() !!}
    </div>
    <div class="row">
        <div class="col-md-12 offset-6">
        {{ $surveyAll->render() }}
        </div>
    </div>
</div>
@endsection
