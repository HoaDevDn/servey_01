@extends('user.master')
@section('content')
    <div class="content-question container">
        <div class="title-survey">
            <h1>{{ $surveys->title }}</h1>
            <?php Session::put('survey', $surveys) ?>
        </div>
        {{ Form::open(['action' => 'User\ResultController@result']) }}
            @foreach($surveys->questions as $key => $question)
                <div class="row-container-answer">
                    <div>
                        <h2>{{ ++$key }}. {{ $question->content }}</h2>
                    </div>
                    <div class="put-answer">
                        @foreach($question->answers as $answer)
                            @if ($answer->type == 1)
                                <div>
                                    {{ Form::radio("answer[$question->id]", $answer->id) }}
                                    <span>{{ $answer->content }}</span>
                                </div>
                            @elseif ($answer->type == 2)
                                <div>
                                    {{ Form::checkbox("answer[$question->id][]", $answer->id) }}
                                    <span>{{ $answer->content }}</span>
                                </div>
                            @elseif ($answer->type == 3)
                                <div class="put-answer">
                                    {!! Form::text("answer[$question->id]", '', ['class' => 'short-text', 'required' => true]) !!}
                                </div>
                            @elseif ($answer->type == 4)
                                <div class="put-answer">
                                    {!! Form::textarea("answer[$question->id]", '', ['class' => 'long-text', 'required' => true]) !!}
                                </div>
                            @elseif ($answer->type == 5)
                                <div class="container-other row">
                                    <div style="display: none;">
                                        <!-- {{ Form::radio("answer[$question->id]", '') }} -->
                                    </div>
                                    <div>
                                        <div>
                                            {!! Form::text("answer[$question->id][$answer->id]",'', ['class' => 'input-radio', 'required' => true]) !!}
                                        </div>
                                        <div><span>{{ trans('home.other') }}</span></div>
                                    </div>
                                </div>
                            @else
                                <div class="container-other row">
                                    <div>
                                       <!--  {{ Form::checkbox("answer[$question->id][]", $answer->id) }} -->
                                    </div>
                                    <div>
                                        <div>
                                            {!! Form::text("answer[$question->id][$answer->id]", '', ['class' => 'input-checkbox']) !!}
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
