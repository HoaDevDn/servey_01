<div class="inner">
    <header>
        <h1>{{ trans('temp.title') }}</h1>
        <p>{{ trans('temp.describe') }}</p>
    </header>
    {{ Form::open() }}
        <div class="div-search">
            <div>
                {!! Form::text('txt-search', '', [
                    'placeholder' => trans('home.search_survey'),
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
        </div>
    @endif
    <section class="tiles">
        @forelse ($surveys as  $key => $survey)
            <article class="style{{ ++$key }}">
                <span class="image">
                    {{ Html::image("demo/images/pic0$key.jpg") }}
                </span>
                <a href="{{ action('SurveyController@show', $survey->token) }}">
                    <h2>{{ $survey->title }}{{ $key }}</h2>
                    <div class="content">
                        <p>{{ $survey->user->name }}</p>
                    </div>
                </a>
            </article>
            <div class="remove-survey" data-key="{{ $key }}" id-survey="{{ $survey->id }}" url="{{ action('SurveyController@delete') }}">
                <span class="glyphicon glyphicon-trash"></span>
            </div>
            <div class="send-mail row">
                <div class="col-md-2">
                    <span class=" glyphicon glyphicon-envelope"></span>
                </div>
                <div class="col-md-9">Send mails</div>
            </div>

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
