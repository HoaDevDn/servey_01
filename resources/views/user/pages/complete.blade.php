@extends('user.master')
@section('content')
    <div id="survey_container" class="div-complete survey_container animated slideInDown wizard" novalidate="novalidate">
        <div class="top-wizard-complete">
            <strong class="tag-complete tag-wizard-top">
                {{ trans('info.success') }}
            </strong>
        </div>
        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
            <div class="step row wizard-step">
                <div class="row">
                    <div class="col-md-4 complete-info">
                        <h3>{{ trans('info.thank_you') }}, {{ Auth::user()->name }}</h3>
                        <h4>{{ trans('info.survey_created') }}</h4>
                        <p>{{ trans('info.link_send') }}</p>
                        <a href="{{ action((!$feature)
                            ? 'AnswerController@answerPrivate'
                            : 'AnswerController@answerPublic', $token) }}">
                            {{ action((!$feature)
                            ? 'AnswerController@answerPrivate'
                            : 'AnswerController@answerPublic', $token) }}
                        </a>
                    </div>
                    <div class="complete-image col-md-8 animated">
                        {!! Html::image(config('settings.image_system') . 'congra.png', '') !!}
                    </div>
                </div>
            </div>
        </div>
        <div class="bot-wizard-complete">
        </div>
    </div>
@endsection
