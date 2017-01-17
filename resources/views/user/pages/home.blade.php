@extends('user.master')
@section('content')
    <div class="list container">
        <div>
            <h1>{{ trans('home.list_survey') }}</h1>
        </div>
        <div class="content-table">
            <div class="row row-table">
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-list"></span>
                    <a href="">This is my survey</a>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-user"></span>
                    me
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-calendar"></span>
                    12/11/2017
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                    <a href="">{{ trans('home.delete') }}</a>
                </div>
            </div>

            <div class="row row-table">
                <div class="col-md-6">
                    <span class="glyphicon glyphicon-list"></span>
                    <a href="">This is my survey</a>
                </div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-user"></span>
                    me
                </div>
                <div class="col-md-2">
                <span class="glyphicon glyphicon-calendar"></span>
                    12/11/2017</div>
                <div class="col-md-2">
                    <span class="glyphicon glyphicon-remove-sign"></span>
                    <a href="">{{ trans('home.delete') }}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
