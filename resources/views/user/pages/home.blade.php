@extends('user.master')
@section('content')
    <div class="list container" style="background: url('/user/image/bg-sv.png'); color: white;">
        <div>
            <h1>{{ trans('home.list_survey') }}</h1>
        </div>
        <div class="content-table">
             @forelse ($surveys as  $key => $survey)
                 <div class="row row-table row-tb{{ $survey->id }}">
                    <div class="col-md-6">
                        <span class="glyphicon glyphicon-list"></span>
                        <a href="{{ action('User\SurveyController@answerSurvey', $survey->id) }}">
                            {{ $survey->title }}
                        </a>
                    </div>
                    <div class="col-md-2">
                        <span class="glyphicon glyphicon-user"></span>
                        me
                    </div>
                    <div class="col-md-2">
                        <span class="glyphicon glyphicon-calendar"></span>
                        12/11/2017
                    </div>
                    <div class="col-md-2">
                        <span class="glyphicon glyphicon-remove-sign"></span>
                        <a class="delete-survey" id-survey="{{ $survey->id }}">
                            {{ trans('home.delete') }}
                        </a>
                    </div>
                </div>
            @empty
                <div>You don't have any survey</div>
            @endforelse
            <input type="hidden" name="" class="input-hide">
        </div>
    </div>
@endsection
