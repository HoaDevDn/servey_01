@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('admin.dashboard') }}
                </div>

                <div class="panel-body">
                    {{ trans('generate.example') }}
                </div>
                @if (!$status)
                    <dir class="alert alert-info">
                        <p>123123</p>
                    </dir>
                @else
                <div class="ct-data" data-number="{{ count($dataShow) }}" data-content="{{ $charts }}">
                    @foreach($dataShow as $key => $value)
                        <div id="container{{ $key }}"></div>
                        @if (!is_string($value['chart'][0]['answer']))
                        {{ $value['question']->content }}
                            <dir>
                                @foreach ($value['chart'][0]['answer'] as $key => $collection)
                                <p>
                                  {{ $collection->content }}
                                </p>
                                @endforeach
                            </dir>
                        @endif
                    @endforeach
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
