@extends('user.master')
@section('content')
    <div class="list container">
        <div>
            <h1>{{ trans('home.list_survey') }}</h1>
        </div>
        <div class = "alert-message">
            @if (Session::get('message'))
                <div class= "alert alert-warning">
                    <span>
                        <p>
                            {{ Session::get('message') }}
                        </p>
                    </span>
                </div>
            @endif
        </div>
        <div class="content-table">
            <div class="">
                <h2>{{ trans('home.table') }}</h2>
                <p></p>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>{{ trans('home.no') }}.</th>
                            <th>
                                <span class="glyphicon glyphicon-list"></span>
                                {{ trans('home.survey') }}
                            </th>
                            <th>
                                <span class="glyphicon glyphicon-user"></span>
                                {{ trans('home.owned_by') }}
                            </th>
                            <th>
                                <span class="glyphicon glyphicon-calendar"></span>
                                {{ trans('home.date') }}
                            </th>
                            <th>
                                <span class="glyphicon glyphicon-remove-sign"></span>
                                {{ trans('home.delete') }}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($surveys as  $key => $survey)
                            <tr class="row-tr{{ $survey->id }}">
                                <td>{{ ++$key }}</td>
                                <td>
                                    <a href="{{ action('User\SurveyController@answerSurvey', $survey->id) }}">
                                        {{ $survey->title }}
                                    </a>
                                </td>
                                <td>
                                    @if ($survey->feature && $survey->user_id != auth()->id)
                                        {{ $survey->user->name }}
                                    @else
                                        {{ trans('home.me') }}
                                    @endif
                                </td>
                                <td>{{ trans('home.date') }}</td>
                                <td>
                                    <a class="delete-survey" id-survey="{{ $survey->id }}">
                                        {{ trans('home.remove') }}
                                    </a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">{{ trans('survey.dont_have') }}</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
        {{ $surveys->render() }}
    </div>
@endsection
