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
        <div class="tab-class">
            <section class="tabs">
                <input id="tab-1" type="radio" name="radio-set" value="1" class="tab-choose tab-selector-1" checked="checked" />
                <label for="tab-1" class="label tab-label-1">{{ trans('survey.information') }}</label>

                <input id="tab-2" type="radio" name="radio-set" value="2" class="tab-choose tab-selector-2" />
                <label for="tab-2" class="label tab-label-2">{{ trans('survey.setting') }}</label>

                <input id="tab-3" type="radio" name="radio-set" value="3" class="tab-choose tab-selector-3" />
                <label for="tab-3" class="label tab-label-3">{{ trans('survey.result') }}</label>

                <input id="tab-4" type="radio" name="radio-set" value="4" class="tab-choose tab-selector-4" />
                <label for="tab-4" class="label tab-label-4">Contact us</label>

                <div class="clear-shadow"></div>

                <div class="content">
                    <div class="content-1">
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
                                {{ trans('survey.link') }}:
                                <a href="{{ action(($survey->feature)
                                    ? 'AnswerController@answerPublic'
                                    : 'AnswerController@answerPrivate', [
                                        'token' => $survey->token,
                                ]) }}">
                                    {{ action(($survey->feature)
                                        ? 'AnswerController@answerPublic'
                                        : 'AnswerController@answerPrivate', [
                                            'token' => $survey->token,
                                    ]) }}
                                </a>
                            </div>
                            <div class="note-detail-survey">
                                Date create:
                                {{ $survey->created_at->format('M d Y') }}
                            </div>
                            <div class="container-btn-detail row">
                                <div class="col-md-3 col-md-offset-3">
                                   {!! Form::submit(trans('survey.save'),  [
                                        'class' => 'btn-save-survey  btn-action',
                                    ]) !!}
                                </div>
                                <div class="col-md-3">
                                   {!! Form::button(trans('survey.delete'),  [
                                        'data-url' => action('SurveyController@delete'),
                                        'id-survey' => $survey->id,
                                        'redirect' => action('SurveyController@listSurveyUser'),
                                        'class' => 'btn-remove-survey btn-action',
                                    ]) !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-2 div-hidden">
                        <div class="detail-survey">
                            <div class="container-setting">
                                <div class="label-title-setting">
                                    {{ trans('survey.setting_survey') }}
                                </div>
                                <div class="content-setting">
                                    <div class="setting-label">
                                        {{ trans('Survey.Required_answer') }}
                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                {{ Form::checkbox('requirement-answer', config('settings.survey.feature'), '', [
                                                    'id' => 'requirement-answer',
                                                ]) }}
                                                {{ Form::label('requirement-answer', ' ') }}
                                            </div>
                                        </div>
                                        <div class="setting-requirement col-md-10 row div-hidden">
                                            <div class="col-md-2">
                                                {{ Form::radio('set-require-email', '', '', [
                                                    'id' => 'option-choose-email',
                                                    'class' => 'option-choose input-radio',
                                                ]) }}
                                                {{ Form::label('option-choose-email', 'Email', [
                                                    'class' => 'label-radio',
                                                ]) }}
                                            </div>
                                            <div class="col-md-2">
                                                {{ Form::radio('set-require-name', '', '', [
                                                    'id' => 'option-choose-name',
                                                    'class' => 'option-choose input-radio',
                                                ]) }}
                                                {{ Form::label('option-choose-name', 'Name', [
                                                    'class' => 'label-radio',
                                                ]) }}
                                            </div>
                                            <div class="col-md-6">
                                                {{ Form::radio('set-require-both', '', '', [
                                                    'id' => 'option-choose-both',
                                                    'class' => 'option-choose input-radio',
                                                ]) }}
                                                {{ Form::label('option-choose-both', 'email and name', [
                                                    'class' => 'label-radio',
                                                ]) }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="setting-label">
                                        {{ trans('survey.replies_limits') }}
                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                {{ Form::checkbox('limit-answer', config('settings.survey.feature'), '', [
                                                    'id' => 'limit-answer',
                                                ]) }}
                                                {{ Form::label('limit-answer', ' ') }}
                                            </div>
                                        </div>
                                        <div class="setting-limit col-md-4 div-hidden">
                                            <div class="qty-buttons">
                                                <input type="button" value="+" class="qtyplus" name="quantity">
                                                <input type="text" name="quantity" value="" class="quantity-limit qty form-control required" placeholder="none">
                                                <input type="button" value="-" class="qtyminus" name="quantity">
                                                <span>{{ trans('survey.click_here') }}!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="setting-label">
                                        {{ trans('survey.hide_result') }}
                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                {{ Form::checkbox('feature', config('settings.survey.feature'), '', [
                                                    'id' => 'feature',
                                                ]) }}
                                                {{ Form::label('feature', ' ') }}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-3 div-hidden">
                         <div class="div-result-survey">
                            <div class="div-table-list" style="">
                                <div class="row">
                                    <div class="first-col-result col-md-3">
                                        <ul class="nav nav-tabs tabs-left sideways">
                                            <li class=" active">
                                                <a href="#home-v" data-toggle="tab" style="">
                                                    <span class="glyphicon glyphicon-th-list"></span>
                                                    {{  trans('survey.overview') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="#profile-v" data-toggle="tab">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                                    {{  trans('survey.see_detail') }}
                                                </a>
                                            </li>
                                            <li><a href="#messages-v" data-toggle="tab">Messages</a></li>
                                            <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                      <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home-v">
                                                <div >
                                                    <div class="show-chart inner">
                                                       @if (!$status)
                                                            <div class="alert alert-info">
                                                                <p>{{ trans('temp.dont_have_result') }}</p>
                                                            </div>
                                                        @else
                                                            <div class="ct-data" data-number="{{ count($charts) }}" data-content="{{ json_encode($charts) }}">
                                                                @foreach($charts as $key => $value)
                                                                    <div id="container{{ $key }}" class="container-chart"></div>
                                                                    @if (!is_string($value['chart'][0]['answer']))
                                                                        <div class="container-text-question">
                                                                            <div class="question-chart">
                                                                                <h4>{{ $key + 1 }}. {{ $value['question']->content }}</h4>
                                                                            </div>
                                                                            <div class="content-chart">
                                                                                @foreach ($value['chart'][0]['answer'] as $key => $collection)
                                                                                    <div>
                                                                                        <h5> - {{ $collection->content }} </h5>
                                                                                    </div>
                                                                                @endforeach
                                                                            </div>
                                                                        </div>
                                                                    @endif
                                                                @endforeach
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="profile-v">
                                                <div >
                                                    <div>
                                                        <table class="table-result table">
                                                            <thead class="thead-default">
                                                                <tr>
                                                                    <th>
                                                                        {{ trans('survey.index') }}
                                                                    </th>
                                                                    <th>
                                                                        {{ trans('survey.question') }}
                                                                    </th>
                                                                    <th>
                                                                        {{ trans('survey.answerIndex') }}
                                                                    </th>
                                                                    <th>
                                                                        {{ trans('survey.answer') }}
                                                                    </th>
                                                                    <th>
                                                                        {{ trans('survey.quatily') }}
                                                                    </th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @foreach ($survey->questions as $key => $value)
                                                                    <tr>
                                                                        <td>{{++$key}}</td>
                                                                        <td>{{ $value->content }}</td>
                                                                        <td>&nbsp</td>
                                                                        <td>&nbsp</td>
                                                                        <td>&nbsp</td>
                                                                    </tr>
                                                                    @foreach ($value->answers as $k => $answer)
                                                                        @if ($answer->type == config('survey.type_radio')
                                                                            || $answer->type == config('survey.type_checkbox')
                                                                            )
                                                                            <tr>
                                                                                <td>&nbsp</td>
                                                                                <td>&nbsp</td>
                                                                                <td>{{ $key . '.' . ++$k }}</td>
                                                                                <td>{{ $answer->content }}</td>
                                                                                <td>{{ count($answer->results) }}</td>
                                                                            </tr>
                                                                        @else
                                                                            @if ($answer->type == config('survey.type_other_radio')
                                                                                || $answer->type == config('survey.type_other_checkbox'))
                                                                                <tr>
                                                                                    <td>&nbsp</td>
                                                                                    <td>&nbsp</td>
                                                                                    <td> {{ $key . '.' . ++$k }} </td>
                                                                                    <td>{{ $answer->content }}</td>
                                                                                    <td>{{ count($answer->results) }}</td>
                                                                                </tr>
                                                                            @endif
                                                                            @foreach ($answer->results as $r => $result)
                                                                                <tr>
                                                                                    <td>&nbsp</td>
                                                                                    <td>&nbsp</td>
                                                                                    <td> - </td>
                                                                                    <td>{{ $result->content }}</td>
                                                                                    <td>&nbsp</td>
                                                                                </tr>
                                                                            @endforeach
                                                                        @endif
                                                                    @endforeach
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="messages-v">
                                                Messages Tab.
                                            </div>
                                            <div class="tab-pane" id="settings-v">
                                                Settings Tab.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-4 div-hidden">
                        <p>Some contedồn hết về 1 nt 4</p>
                        <p>Some content 4</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>

</div>
@endsection

