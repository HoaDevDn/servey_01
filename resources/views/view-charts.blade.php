@extends('user.master')
@section('content')
    <div class="show-chart inner">
        <div class="title-result">
            <h2>Result</h2>
        </div>
       @if (!$status)
            <div class="alert alert-info">
                <p>{{ trans('temp.dont_have_result') }}</p>
            </div>
        @else
            <div class="ct-data" data-number="{{ count($dataShow) }}" data-content="{{ $charts }}">
                @foreach($dataShow as $key => $value)
                    <div id="container{{ $key }}" class="container-chart"></div>
                    @if (!is_string($value['chart'][0]['answer']))
                        <div class="question-chart">
                            <h3>{{ $value['question']->content }}</h3>
                        </div>
                        <div class="content-chart">
                            <?php $i = 1; ?>
                            @foreach ($value['chart'][0]['answer'] as $key => $collection)
                                <div>
                                    <h5>{{ $i }} .{{ $collection->content }}</h5>
                                </div>
                                <?php $i++; ?>
                            @endforeach
                        </div>
                    @endif
                @endforeach
            </div>
        @endif
    </div>
@endsection
@section('content-bot')
     <div class="inner">
        @if (Auth::check())
            <h2>{{ trans('home.wellcome') }},{{ Auth::user()->name }}</h1>
         @endif
    </div>
@endsection
