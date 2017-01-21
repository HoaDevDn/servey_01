@extends('user.master')
@section('content')
    <div class="content-question container">
        <div class="title-survey">
            <h1>{{ $surveys->title }}</h1>
        </div>
        {{ Form::open(['action' => 'User\SurveyController@result']) }}
            @foreach($surveys->questions as $key => $question)
                <div class="row-container-answer">
                    <div>
                        <h2>{{ ++$key }}. {{ $question->content }}</h2>
                    </div>
                    <div class="put-answer">
                        @foreach($question->answers as $answer)
                            @if ($answer->type == 1)
                                <div>
                                    {{ Form::radio("check[radio][$question->id]", $answer->id) }}
                                    <span>{{ $answer->content }}</span>
                                </div>
                            @elseif ($answer->type == 2)
                                <div>
                                    {{ Form::checkbox("check[checkbox][$question->id]", $answer->id) }}
                                    <span>{{ $answer->content }}</span>
                                </div>
                            @elseif ($answer->type == 3)
                                <div class="put-answer">
                                    {!! Form::text("txt-answer[short][$question->id]", '', ['class' => 'short-text', 'required' => true]) !!}
                                </div>
                            @elseif ($answer->type == 4)
                                <div class="put-answer">
                                    {!! Form::textarea("txt-answer[long][$question->id]", '', ['class' => 'long-text', 'required' => true]) !!}
                                </div>
                            @elseif ($answer->type == 5)
                                <div class="container-other row">
                                    <div>
                                        {{ Form::radio("check[radio][$question->id]", '') }}
                                    </div>
                                    <div>
                                        <div>
                                            {!! Form::text("txt-answer[radio][$question->id]",'', ['class' => 'input-radio', 'required' => true]) !!}
                                        </div>
                                        <div><span>{{ trans('home.other') }}</span></div>
                                    </div>
                                </div>
                            @else
                                <div class="container-other row">
                                    <div>
                                        {{ Form::checkbox("check[checkbox][$question->id]", $answer->id) }}
                                    </div>
                                    <div>
                                        <div>
                                            {!! Form::text('txt-answer[checkbox][$question->id]', '', ['class' => 'input-checkbox']) !!}
                                        </div>
                                        <div><span>{{ trans('home.other') }}</span></div>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            @endforeach
            <div class="div-submit">
                {{ Form::submit(trans('home.submit')) }}
            </div>
        {{ Form::close() }}
    </div>
@endsection
