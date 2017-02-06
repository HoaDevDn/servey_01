<div class="inner">
    <header>
        <h1>{{ trans('temp.title') }}</h1>
        <p>{{ trans('temp.describe') }}</p>
    </header>
    {{ Form::open(['action' => 'SurveyController@search']) }}
        <div class="div-search">
            <div>
                {!! Form::text('txt-search', '', [
                    'placeholder' => trans('home.search_survey'),
                    'class' => 'typeahead form-control',
                ]) !!}
            </div>
            {{ Form::submit(trans('home.search')) }}
            <div class="clear"></div>
        </div>
    {{ Form::close() }}
    @if (Auth::check())
        <div class="choose-link">
            <a href="{{ action('SurveyController@getHome') }}">
                {{ trans('home.public') }}
            </a>
            <a href="{{ action('SurveyController@listSurveyUser') }}">
                {{ trans('home.me') }}
            </a>
            <a href="{{ action('SurveyController@getInviteSurvey') }}">
                ({{ $count }}){{ trans('home.invited') }}
            </a>
        </div>
    @endif
    @if (Session::has('message'))
        <div class="alert alert-info alert-message">
              {{ Session::get('message') }}
        </div>
    @endif
    <section class="tiles">
        @forelse ($surveys as  $key => $survey)
            <article class="art-container style{{ ++$key }}">
                <span class="image">
                    {{ Html::image("user/images/pic0$key.jpg") }}
                </span>
                <a href="{{ action('SurveyController@show', $survey->token) }}">
                    <h2>{{ $survey->title }}</h2>
                    <div class="content">
                        <p>{{ $survey->user->name }}</p>
                    </div>
                </a>
                <div class="row div-option">
                    @if ($survey->user_id == auth()->id())
                        <div class="col-md-2 remove-survey" data-key="{{ $key }}"
                            id-survey="{{ $survey->id }}"
                            url="{{ action('SurveyController@delete') }}" >
                            <span class="glyphicon glyphicon-trash"></span>
                        </div>
                        <div class="col-md-1 mark-survey" data-url="{{ action('User\LikeController@markLike') }}">
                            @if (!$survey->is_liked)
                                <span class="bt-like glyphicon glyphicon-star-empty" data-value="1"></span>
                            @else
                                <span class="bt-like glyphicon glyphicon-star" data-value="0"></span>
                            @endif
                        </div>
                        <div class="col-md-4 send-mail row" data-id-survey="{{ $survey->id }}">
                            <div class="col-md-2">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <div class="col-md-9">
                                {{ trans('temp.send_mail') }}
                            </div>
                        </div>
                @endif
                    <div class="col-md-4 view-result" data-url="{{ action('SurveyController@viewChart', $survey->token) }}">
                         <div class="col-md-2">
                            <span class="glyphicon glyphicon-adjust"></span>
                        </div>
                        <div class="col-md-9">
                            {{ trans('temp.view_result') }}
                        </div>
                    </div>
                </div>
            </article>
        @empty
            <article class="style1">
                {{ trans('home.dont_have') }}
            </article>
        @endforelse
    </section>
    <div class="render">
        {{ $surveys->render() }}
    </div>
</div>
