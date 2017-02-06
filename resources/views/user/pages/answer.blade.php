@extends('user.master')
@section('content')
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            <div class="menu-wizard col-md-5 active-answer active-menu">
                {{ trans('result.answer') }}
            </div>
            <div class="menu-wizard col-md-5 active-result col-md-offset-1">
                {{ trans('result.result') }}
            </div>
        </div>
    </div>
    <div class="container-list-answer">
        {!! Form::open([
            'id' => 'wrapped',
            'class' => 'wizard-form',
            'novalidate' => 'novalidate',
            'action' => ['User\ResultController@result', $surveys->token],
            'method' => 'POST',
        ]) !!}
            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                <div class="get-title-survey">
                    {{ $surveys->title }}
                </div>
                <div class="description-survey">
                    <h4>
                        {{ $surveys->description }}
                    </h4>
                </div>
                <div class="step row wizard-step ">
                    @foreach($surveys->questions as $key => $question)
                        <div>
                            <h4 class="tag-question">
                                {{ ++$key }}. {{ $question->content }}
                                <span>{{ ($question->required) ? '(*)' : '' }}</span>
                            </h4>
                            <ul class="data-list">
                                @foreach($question->answers as $temp => $answer)
                                     <li class="{{ ($question->required) ?  'required': '' }}">
                                        @switch($answer->type)
                                            @case(config('survey.type_radio'))
                                                {{ Form::radio("answer[$question->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'option-choose input-radio',
                                                    'temp-as' => $answer->id,
                                                    'temp-qs' => $question->id,
                                                ]) }}
                                                {{ Form::label($key.$temp, $answer->content, [
                                                    'class' => 'label-radio',
                                                ]) }}
                                                @breakswitch
                                            @case(config('survey.type_checkbox'))
                                                {{ Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'input-checkbox',
                                                ]) }}
                                                {{ Form::label($key.$temp, $answer->content, [
                                                    'class' => 'label-checkbox'
                                                ]) }}
                                                @breakswitch
                                            @case(config('survey.type_text'))
                                                 {!! Form::textarea("answer[$question->id][$answer->id]", '', [
                                                    'class' => 'form-control',
                                                    'id' => "answer[$question->id][$answer->id]",
                                                ]) !!}
                                                @breakswitch
                                            @case(config('survey.type_time'))
                                                {!! Form::text("answer[$question->id][$answer->id]", '', [
                                                    'class' => 'frm-time form-control ',
                                                    'id' => "answer[$question->id]",
                                                ]) !!}
                                                @breakswitch
                                            @case(config('survey.type_date'))
                                                {!! Form::text("answer[$question->id][$answer->id]", '', [
                                                    'class' => 'form-control frm-date-2',
                                                    'id' => "answer[$question->id]",
                                                ]) !!}
                                                @breakswitch
                                            @case(config('survey.type_other_radio'))
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        {{ Form::radio("answer[$question->id]", $answer->id, '', [
                                                            'id' => "$key$temp",
                                                            'class' => 'input-radio option-add',
                                                            'temp-as' => $answer->id,
                                                            'temp-qs' => $question->id,
                                                            'url' => action('SurveyController@addTemp', config('temp.text_other')),
                                                        ]) }}
                                                        {{ Form::label($key.$temp, trans('home.other'), [
                                                            'class' => 'label-radio'
                                                        ]) }}
                                                    </div>
                                                    <div class="append-input col-md-8 append-as{{ $question->id }}">
                                                    </div>
                                                </div>
                                                @breakswitch
                                            @case(config('survey.type_other_checkbox'))
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        {{ Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                                            'id' => "$key$temp",
                                                            'class' => 'input-checkbox option-add',
                                                            'temp-as' => $answer->id,
                                                            'temp-qs' => $question->id,
                                                            'url' => action('SurveyController@addTemp', config('temp.text_other')),
                                                        ]) }}
                                                        {{ Form::label($key.$temp, trans('home.other'), [
                                                            'class' => 'label-checkbox'
                                                        ]) }}
                                                    </div>
                                                    <div class="col-md-8 append-input-checkbox append-as{{ $question->id }}"></div>
                                                </div>
                                            @breakswitch
                                        @endswitch
                                    </li>
                                @endforeach
                            </ul>
                            @if ($errors->has('answer.' . $question->id))
                                <div class="alert alert-danger alert-message">
                                    {{ $errors->first('answer.' . $question->id) }}
                                </div>
                            @endif
                            @if ($errors->has('answer.' . $question->id . '.' . $question->answers[0]->id))
                                <div class="alert alert-danger alert-message">
                                    {{ $errors->first('answer.' . $question->id . '.' . $question->answers[0]->id) }}
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
            <div id="bottom-wizard">
                {!! Form::submit(trans('home.finish'), [
                    'class' => 'submit-answer btn btn-info',
                ]) !!}
            </div>
        {!! Form::close() !!}
    </div>
    @include('user.pages.result')
</div>
@endsection

