@extends('user.master')
@section('content')
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            @if (!in_array(config('settings.key.hideResult'), array_keys($access)) || ($survey->user_id == auth()->id()))
                <div class="menu-wizard col-md-5 active-answer active-menu">
                    {{ trans('result.answer') }}
                </div>
                <div class="menu-wizard col-md-5 active-result col-md-offset-1">
                    {{ trans('result.result') }}
                </div>
            @else
                <div class="menu-wizard col-md-8 col-md-offset-2 active-answer active-menu">
                    {{ trans('result.answer') }}
                </div>
            @endif
        </div>
    </div>
    <div class="container-list-answer">
        {!! Form::open([
            'id' => 'wrapped',
            'class' => 'wizard-form',
            'novalidate' => 'novalidate',
            'action' => ['ResultController@result', $survey->token],
            'method' => 'POST',
        ]) !!}
            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                <div class="get-title-survey">
                    {{ $survey->title }}
                </div>
                <div class="description-survey">
                    <h4>
                        {{ $survey->description }}
                    </h4>
                </div>
                @if (Session::has('message'))
                    <div class="alert alert-info alert-message">
                        {{ Session::get('message') }}
                    </div>
                @endif
                @if (Session::has('message-fail'))
                    <div class="alert alert-danger alert-message">
                        {{ Session::get('message-fail') }}
                    </div>
                @endif
                <div class="step row wizard-step ">
                    @foreach($survey->questions as $key => $question)
                        <div>
                            <h4 class="tag-question">
                                {{ ++$key }}. {{ $question->content }}
                                <span>{{ ($question->required) ? '(*)' : '' }}</span>
                            </h4>
                            @if ($question->image)
                                <img src="{{ $question->image }}" class="show-img-question">
                            @endif
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
                                                @if ($answer->image)
                                                    <div>
                                                        <img src="{{ $answer->image }}" class="show-img-answer">
                                                    </div>
                                                @endif
                                                @breakswitch
                                            @case(config('survey.type_checkbox'))
                                                <div>
                                                    {{ Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'input-checkbox',
                                                ]) }}
                                                {{ Form::label($key.$temp, $answer->content, [
                                                    'class' => 'label-checkbox'
                                                ]) }}
                                                </div>
                                                @if ($answer->image)
                                                    <div>
                                                        <img src="{{ $answer->image }}" class="show-img-answer">
                                                    </div>
                                                @endif
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
                                                            'url' => action('TempController@addTemp', config('temp.text_other')),
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
                                                            'url' => action('TempController@addTemp', config('temp.text_other')),
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
            <div class="required-user">
                <div class="row" >
                    @if (in_array(config('settings.key.requireAnswer'), array_keys($access)))
                        @switch($access[config('settings.key.requireAnswer')])
                            @case(config('settings.require.email'))
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="container-infor">
                                        {!! Html::image(config('settings.image_system') . 'email1.png', '') !!}
                                        {!! Form::email('email-answer', '', [
                                            'id' => 'email',
                                            'class' => 'frm-require-answer form-control',
                                            'placeholder' => trans('login.your_email'),
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('email-answer'))
                                        <div class="alert alert-danger alert-message">
                                            {{ $errors->first('email-answer') }}
                                        </div>
                                    @endif
                                </div>
                                @breakswitch
                            @case(config('settings.require.name'))
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="container-infor">
                                        {!! Html::image(config('settings.image_system') . 'name.png', '') !!}
                                        {!! Form::text('name-answer', '', [
                                            'placeholder' => trans('login.your_name'),
                                            'id' => 'name',
                                            'class' => 'frm-require-answer form-control',
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('name-answer'))
                                        <div class="alert alert-danger alert-message">
                                            {{ $errors->first('name-answer') }}
                                        </div>
                                    @endif
                                </div>
                                @breakswitch
                            @default
                                <div class="col-md-5 col-md-offset-1">
                                    <div class="container-infor">
                                        {!! Html::image(config('settings.image_system') . 'email1.png', '') !!}
                                        {!! Form::email('email-answer', '', [
                                            'id' => 'email',
                                            'class' => 'frm-require-answer form-control',
                                            'placeholder' => trans('login.your_email'),
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('email-answer'))
                                        <div class="alert alert-danger alert-message">
                                            {{ $errors->first('email-answer') }}
                                        </div>
                                    @endif
                                </div>
                                <div class="col-md-5 ">
                                    <div class="container-infor">
                                        {!! Html::image(config('settings.image_system') . 'name.png', '') !!}
                                        {!! Form::text('name-answer', '', [
                                            'placeholder' => trans('login.your_name'),
                                            'id' => 'name',
                                            'class' => 'frm-require-answer form-control',
                                        ]) !!}
                                    </div>
                                    @if ($errors->has('name-answer'))
                                        <div class="alert alert-danger alert-message">
                                            {{ $errors->first('name-answer') }}
                                        </div>
                                    @endif
                                </div>
                                @breakswitch
                        @endswitch
                    @endif
                </div>
            </div>
            <div id="bottom-wizard">
                @if ($survey->status
                    && (Carbon\Carbon::parse($survey->deadline)->gt(Carbon\Carbon::now()) || empty($survey->deadline))
                    && (
                        (in_array(config('settings.key.limitAnswer'), array_keys($access)) && $access[config('settings.key.limitAnswer')] > config('settings.isZero'))
                        || !(in_array(config('settings.key.limitAnswer'), array_keys($access)))
                    )
                )
                    {!! Form::submit(trans('home.finish'), [
                        'class' => 'submit-answer btn btn-info',
                    ]) !!}
                @endif
            </div>
        {!! Form::close() !!}
    </div>
    @include('user.pages.result')
</div>
@endsection

