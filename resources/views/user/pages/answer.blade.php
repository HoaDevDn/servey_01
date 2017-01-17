@extends('user.master')
@section('content')
    <div class="content-question container">
        <div class="title-survey">
            <h1>THU THAP Y KIEN NGUOI DUNG( tu csdl )</h1>
        </div>
        @foreach($surveys->questions as $key => $question)
            <div class="row-container-answer">
                <div>
                    <h2>Câu {{ ++$key }}:  {{ $question->content }}</h2>
                </div>
                <div class="put-answer">
                    @foreach($question->answers as $answer)
                        @if ($answer->type == 1)
                            <div>
                                {{ Form::radio('name-radio' . $question->id, '') }}
                                <span>{{ $answer->content }}</span>
                            </div>
                        @elseif ($answer->type == 2)
                            <div>
                                {{ Form::checkbox('name-checkbox' . $question->id, '') }}
                                <span>{{ $answer->content }}</span>
                            </div>
                        @elseif ($answer->type == 3)
                            <div class="put-answer">
                                <input type="text" name="" class="short-text">
                            </div>
                        @elseif ($answer->type == 4)
                            <div class="put-answer">
                                <textarea class="long-text"></textarea>
                            </div>
                        @elseif ($answer->type == 5)
                            <div class="container-other row">
                                <div>
                                    {{ Form::radio('name-radio' . $question->id, '') }}
                                </div>
                                <div>
                                    <div><input type="text" name="" class="input-radio"></div>
                                    <div><span>Other:</span></div>
                                </div>
                            </div>
                        @else
                            <div class="container-other row">
                                <div>
                                    {{ Form::checkbox('name-checkbox' . $question->id, '') }}
                                </div>
                                <div>
                                    <div><input type="text" name="" class="input-checkbox"></div>
                                    <div><span>Other:</span></div>
                                </div>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
@endsection
