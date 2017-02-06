@extends('user.master')
@section('content')
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            <div class="menu-wizard col-md-10 active-answer active-menu">
                {{ trans('home.detail_survey') }}
            </div>
        </div>
    </div>
    <div class="container-list-answer">
    <div class="middel-content-detail wizard-branch wizard-wrapper">
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
       <div class="tab-bootstrap">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <span class="glyphicon glyphicon-asterisk"></span>
                        Detail survey
                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu1">
                        <span class="glyphicon glyphicon-stats"></span>
                        Result
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="detail-survey">
                        <div class="row">
                            <p class="tag-detail-survey">
                                {{ $survey->title }}
                            </p>
                            <div class="col-md-6">
                                <ul class="data-list">
                                    <li>
                                        <div class="container-infor">
                                            {!! Html::image(config('settings.image_system') . 'title1.png', '') !!}
                                            {!! Form::text('title', $survey->title, [
                                                'placeholder' => trans('info.title'),
                                                'id' => 'title',
                                                'class' => 'required form-control',
                                            ]) !!}
                                        </div>
                                    </li>
                                    {!! Form::text('website', '', [
                                        'id' => 'website',
                                    ]) !!}
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="data-list">
                                    <li>
                                        <div class="container-infor">
                                            {!! Html::image(config('settings.image_system') . 'date.png', '') !!}
                                            {!! Form::text('deadline', '', [
                                                'placeholder' =>  ($survey->dealine) ?: trans('info.duration'),
                                                'id' => 'deadline',
                                                'class' => 'frm-deadline datetimepicker form-control',
                                            ]) !!}
                                            {!! Form::label('deadline', trans('info.date_invalid'), [
                                                'class' => 'wizard-hidden validate-time error',
                                            ]) !!}
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="row">
                            <div class="frm-textarea container-infor">
                                {!! Html::image(config('settings.image_system') . 'description.png', '') !!}
                                {!! Form::textarea('description', '', [
                                    'class' => 'form-control',
                                    'placeholder' => trans('info.description'),
                                ]) !!}
                            </div>
                        </div>
                        <div class="note-detail-survey">
                            Link:
                            <a href="">
                                {{ action('SurveyController@showDetail', $survey->token) }}
                            </a>
                        </div>
                        <div class="note-detail-survey">
                            Date create:
                            {{ $survey->created_at->format('M d Y') }}
                        </div>
                        <div class="container-btn-detail row">
                            <div class="col-md-3 col-md-offset-3">
                               {!! Form::submit('save',  [
                                    'class' => 'btn-save-survey  btn-action',
                                ]) !!}
                            </div>
                            <div class="col-md-3">
                               {!! Form::button('Delete',  [
                                    'data-url' => action('SurveyController@delete'),
                                    'id-survey' => $survey->id,
                                    'redirect' => action('SurveyController@listSurveyUser'),
                                    'class' => 'btn-remove-survey btn-action',
                                ]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <div id="menu1" class="tab-pane fade">
                    dsfsdfsdfsd
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>

</div>
@endsection

