@extends('admin.master')
@section('content')
<div class="row">
    <div class="hide" data-route="{!! url('/') !!}"></div>
    <div class="col-md-12">
    {!! Form::open(['action' => 'Admin\UserController@blockUser']) !!}
        <div class="card">
            <div class="header">
                <h4 class="title">{{ trans('generate.list') }} {{ trans('generate.user') }}</h4>
                <p class="category">{{ trans('generate.exampe') }}</p>
            </div>
            <div class="content table-responsive table-full-width" id="table">
                <table class="table table-hover table-striped">
                    <thead>
                        <th>{{ trans('generate.avatar') }}</th>
                        <th>{{ trans('generate.id') }}</th>
                        <th>{{ trans('generate.name') }}</th>
                        <th>{{ trans('generate.email') }}</th>
                        <th>{{ trans('generate.birthday')}}</th>
                        <th>{{ trans('generate.address') }}</th>
                        <th>{{ trans('generate.phone') }}</th>
                        <th>{{ trans('generate.gender') }}</th>
                        <th>{{ trans('generate.status.generate') }}</th>
                    </thead>
                    @foreach($userActive as $user)
                    <tbody>
                        <tr>
                            <td>{!! Html::image($user->image, 'userAvatar', ['class' => 'avatar border-gray']) !!}</td>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ action('Admin\UserController@show', [$user->id]) }}">{{ $user->name }}</a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\UserController@show', [$user->id]) }}">{{ $user->email }}</a>
                            </td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ trans('generate.status.active') }}</td>
                            <td>
                                {!! Form::checkbox('checkbox-user-block[]', $user->id, '', [
                                    'data-toggle' => 'checkbox',
                                    "id-user[]" => $user->id,
                                    'class' => 'bt-form'
                                ]) !!}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {!! Form::button(trans('admin.block'),['class' => 'btn btn-primary', 'id' => 'blockButton', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title">{{ trans('generate.list') }} {{ trans('generate.user') }}</h4>
                <p class="category">{{ trans('generate.exampe') }}</p>
            </div>
            {!! Form::open(['action' => 'Admin\UserController@activeUser']) !!}
            <div class="content table-responsive table-full-width" id="table">
                <table class="table table-hover">
                    <thead>
                        <th>{{ trans('generate.avatar') }}</th>
                        <th>{{ trans('generate.id') }}</th>
                        <th>{{ trans('generate.name') }}</th>
                        <th>{{ trans('generate.email') }}</th>
                        <th>{{ trans('generate.birthday')}}</th>
                        <th>{{ trans('generate.address') }}</th>
                        <th>{{ trans('generate.phone') }}</th>
                        <th>{{ trans('generate.gender') }}</th>
                        <th>{{ trans('generate.status.generate') }}</th>
                    </thead>
                    @foreach($userBlock as $user)
                    <tbody>
                        <tr>
                            <td>{!! Html::image($user->image, 'userAvatar', ['class' => 'avatar border-gray']) !!}</td>
                            <td>{{ $user->id }}</td>
                            <td>
                                <a href="{{ action('Admin\UserController@show', [$user->id]) }}">{{ $user->name }}</a>
                            </td>
                            <td>
                                <a href="{{ action('Admin\UserController@show', [$user->id]) }}">{{ $user->email }}</a>
                            </td>
                            <td>{{ $user->birthday }}</td>
                            <td>{{ $user->address }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>{{ trans('generate.status.block') }}</td>
                            <td>
                                {!! Form::checkbox('checkbox-user-active[]', $user->id, '', ['data-toggle' => 'checkbox']) !!}
                            </td>
                        </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>
        </div>
        {!! Form::button(trans('admin.active'),['class' => 'btn btn-primary', 'id' => 'activeButton', 'type' => 'submit']) !!}
        {!! Form::close() !!}
    </div>
    <div class="row">
        <div class="col-md-12 offset-6">
        {{ $users->render() }}
        </div>
    </div>
</div>
@endsection
