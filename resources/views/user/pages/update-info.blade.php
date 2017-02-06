@extends('user.master')
@section('content')
    {{ Form::open() }}
        <div class="info-update">
            <div>
                <h2>{{ trans('info.update_user_info') }}</h2>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.name') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('phone', Auth::user()->name, [
                                'placeholder' => trans('info.name'),
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.image') }}
                        </div>
                        <div class="col-md-4 col-image">
                            <input type="file" name="">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.gender') }}
                        </div>
                        <div class="col-md-4 col-radio">
                            <div>
                                {{ Form::radio('gender','', '', [
                                    'id' => 'male',
                                ]) }}
                                <label for="male">
                                    {{ trans('info.male') }}
                                </label>
                            </div>
                            <div class="col-female">
                                {{ Form::radio('gender','', '', [
                                    'id' => 'female',
                                    ]) }}
                                <label for="female">
                                   {{ trans('info.female') }}
                                </label>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.phone') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('phone', Auth::user()->phone, [
                                'placeholder' => trans('info.phone'),
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.address') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('phone', Auth::user()->address, [
                                'placeholder' => trans('info.address'),
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="info-last ct-info row">
                        <div class="col-md-4 col-md-offset-1">
                            <input type="submit" name="" value="update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    {{ Form::close() }}
@endsection
@section('content-bot')
    <div class="inner">
        <h2>{{ trans('home.wellcome') }}, {{ Auth::user()->name }}</h1>
    </div>
@endsection
