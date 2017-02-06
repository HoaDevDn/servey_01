@extends('user.master')
@section('content')
    {{ Form::open([
        'action' => 'User\UserController@update',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ]) }}
        @if (Session::has('message'))
            <div class="alert alert-info alert-message">
                {{ Session::get('message') }}
            </div>
        @endif
        <div class="info-update">
            <div>
                <h2>{{ trans('info.update_user_info') }}</h2>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.email') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::email('email', $user->email, [
                                'placeholder' => trans('generate.email'),
                            ]) !!}
                        </div>
                        @if ($errors->has('email'))
                            <div class="alert alert-warning">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.name') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('name', $user->name, [
                                'placeholder' => trans('info.name'),
                            ]) !!}
                        </div>
                        @if ($errors->has('name'))
                            <div class="alert alert-warning">
                                {{ $errors->first('name') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.image') }}
                        </div>
                        <div class="col-md-4 col-image">
                           {!! Form::file('image') !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.birthday') }}
                        </div>
                        <div class="col-md-4 col-image">
                            {!! Form::date('birthday', $user->birthday,[
                                'class' => 'inputtext',
                                'placeholder' => trans('info.datetime'),
                                'id' => 'frm-birthday'
                            ]) !!}
                        </div>
                        @if ($errors->has('birthday'))
                            <div class="alert alert-warning">
                                {{ $errors->first('birthday') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.gender') }}
                        </div>
                        <div class="col-md-4 col-radio">
                            {!! Form::select('gender', [
                                '0' => trans('generate.gender.male'),
                                '1' => trans('generate.gender.female')
                            ],
                            $user->gender, [
                                'id' => 'gender'
                            ]
                        ) !!}
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
                        @if ($errors->has('phone'))
                            <div class="alert alert-warning">
                                {{ $errors->first('phone') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.address') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::text('address', $user->address, [
                                'placeholder' => trans('info.address'),
                            ]) !!}
                        </div>
                        @if ($errors->has('address'))
                            <div class="alert alert-warning">
                                {{ $errors->first('address') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.new_password') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::password('password', [
                                'id' => 'password',
                                'placeholder' =>  trans('info.new_password'),
                            ]) !!}
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <div class="alert alert-warning">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('login.repassword') }}
                        </div>
                        <div class="col-md-4">
                             {!! Form::password('password_confirmation', [
                                'id' => 'password-confirm',
                                'placeholder' => trans('login.repassword'),
                            ]) !!}
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            {{ trans('info.old_password') }}
                        </div>
                        <div class="col-md-4">
                            {!! Form::password('old-password', [
                                'id' => 'old-password',
                                'placeholder' => trans('info.old_password'),
                            ]) !!}
                        </div>
                        @if ($errors->has('old-password'))
                            <div class="alert alert-warning">
                                {{ $errors->first('old-password') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div>
                    <div class="info-last row">
                        <div class="col-md-2 col-md-offset-1">
                            <input type="submit" name="" value="update">
                        </div>
                        <div class="col-md-1">
                            <input type="button" name="" value="Cancel">
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
