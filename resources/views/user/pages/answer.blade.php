@extends('user.master')
@section('content')
    <div class="content-question container">
        <div>
            <h1>THU THAP Y KIEN NGUOI DUNG( tu csdl )</h1>
        </div>
        <div class="row-radio">
            <div>
                <h2>cau 1: ban dang lam gi vay?( tu csdl )</h2>
            </div>
            <div class="put-answer">
                <div>
                    {{ Form::radio('name-radio', '') }}
                    <span>Caaa</span>
                </div>
                <div>
                    {{ Form::radio('name-radio', '') }}
                    <span>Caaa</span>
                </div>
                <div>
                    {{ Form::radio('name-radio', '') }}
                    <span>Caaa</span>
                </div>
            </div>
        </div>

        <div class="row-checkbox">
            <div>
                <h2>cau 2: ban dang lam gi vay?( tu csdl )</h2>
            </div>
            <div class="put-answer">
                <div>
                    {{ Form::checkbox('name-checkbox', '') }}
                    <span>aaa( tu csdl )</span>
                </div>
                <div>
                    {{ Form::checkbox('name-checkbox', '') }}
                    <span>aaa( tu csdl )</span>
                </div>
            </div>
        </div>


        <div class="row-short row">

        </div>
        <div class="row-long row">

        </div>
        <div class="hide"></div>
    </div>
@endsection
