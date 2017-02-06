@extends('user.master')
@section('content')
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            <div class="menu-wizard col-md-10 active-answer active-menu">
                {{ trans('home.list_survey') }}
            </div>
        </div>
    </div>
    <div class="container-list-answer">
        <div class="middle-content-detail wizard-branch wizard-wrapper">
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
        <div class="div-table-list">
            <div class="table-list-row row">
                <div class="col-md-2">
                    <ul class="nav nav-tabs tabs-left sideways">
                        <li class=" active">
                            <a href="#home-v" data-toggle="tab">
                                <span class="glyphicon glyphicon-th-list"></span>
                                Your survey
                            </a>
                        </li>
                        <li>
                            <a href="#profile-v" data-toggle="tab">
                            <span class="glyphicon glyphicon-envelope"></span>
                                Survey invited
                            </a>
                        </li>
                        <li><a href="#messages-v" data-toggle="tab">Messages</a></li>
                        <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
                    </ul>
                </div>
                <div class="col-md-10">
                  <!-- Tab panes -->
                    <div class="tab-content">
                        <div class="tab-pane active" id="home-v">
                            <div >
                                <table class="table-list-survey table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date created</th>
                                            <th>Send mail</th>
                                            <th>Setting</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($surveys as $key => $survey)
                                            <tr>
                                                <td>
                                                    {{ ++$key }}.
                                                    <a href="{{ action(($survey->feature)
                                                            ? 'AnswerController@answerPrivate'
                                                            : 'AnswerController@answerPublic', [
                                                                'token' => $survey->token,
                                                        ]) }}">
                                                        {{ $survey->title }}
                                                    </a>
                                                </td>
                                                <td>
                                                    {{ $survey->created_at->format('M d Y') }}
                                                </td>
                                                <td>
                                                    <a class="tag-send-email"
                                                        data-url="{{ action('SurveyController@inviteUser', [
                                                            'id' => $survey->id,
                                                            'type' => config('settings.return.view'),
                                                        ]) }}"
                                                    >
                                                        <span class="glyphicon glyphicon-send"></span>
                                                        Send to
                                                    </a>
                                                </td>
                                                <td>
                                                    <a href="{{ action('SurveyController@showDetail', $survey->token) }}" class="glyphicon glyphicon-cog"></a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                {{ $surveys->render() }}
                            </div>
                        </div>
                        <div class="tab-pane" id="profile-v">
                            <div >
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Reciever date</th>
                                            <th>Sender</th>
                                            <th>Status</th>
                                            <th>Go to survey</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($invites as $key => $invite)
                                            <tr>
                                                <td>
                                                    <a href="{{ action(($invite->survey->feature)
                                                            ? 'AnswerController@answerPrivate'
                                                            : 'AnswerController@answerPublic', [
                                                                'token' => $invite->survey->token,
                                                        ]) }}">
                                                        {{ $invite->survey->title }}
                                                    </a>
                                                </td>
                                                <td>{{ $invite->created_at }}</td>
                                                <td>{{ ($invite->sender) ? $invite->sender->email : $invite->email }}</td>
                                                <td>{{ ($invite->status) ? 'Not yet' : 'Answerd' }}</td>
                                                <td>
                                                    <a href="{{ action(($invite->survey->feature)
                                                            ? 'AnswerController@answerPrivate'
                                                            : 'AnswerController@answerPublic', [
                                                                'token' => $invite->survey->token,
                                                        ]) }}">
                                                        Link
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="tab-pane" id="messages-v">Messages Tab.</div>
                        <div class="tab-pane" id="settings-v">Settings Tab.</div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div id="bottom-wizard bottom-wizard-anwser"></div>
    </div>
</div>
@endsection

