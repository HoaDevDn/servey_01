<div class="title-question row question{{ $number }}" question="{{ $number }}" temp-qs="0">
    <div class="col-md-1"></div>
    <div class="col-md-8 row">
        <div class="text-question col-md-10">
            {!! Form::text("txt-question[question][$number]", '',
                ['placeholder' => trans('home.enter_question_here'), 'required' => true ])
            !!}
        </div>
        <div class="col-md-2 row">
            <div class="col-md-1">
                <a class="glyphicon glyphicon-picture"></a>
            </div>
            <div class="col-md-1">
                <a class="glyphicon glyphicon-trash col-md-6" id-question="{{ $number }}"></a>
            </div>
        </div>
    </div>
    <div class="clear clear-as{{ $number }}0"></div>
    <div class="div-content-answer qs-as{{ $number }}0" >
        <div class="col-md-1"></div>
        <div class="col-md-6">
            <div class="div-text-answer">
                {!! Form::text("txt-question[answers][$number][][1]", '',
                    ['placeholder' => trans('home.enter_answer_here'), 'required' => true ]) !!}
            </div>
            <div class="div-radio">
                {!! Form::radio('radio', '', false, ['disabled' => true]) !!}
            </div>
        </div>
        <div class="remove-answer col-md-1">
            <a class="glyphicon glyphicon-remove" id-as="{{ $number }}0"></a>
        </div>
    </div>
    <div class="clear temp-other{{ $number }}"></div>
    <div class="choose-action row">
        <div class="col-md-1"></div>
        <div class="col-md-7">
            {!! Form::button(trans('home.add_option'), [
                'class' => 'add-radio',
                'id-as' => $number,
                'url' => action('User\SurveyController@radioAnswer'),
                'typeId' => 1
            ]) !!}
            {!! Form::button(trans('home.add_other'), [
                'class' => 'add-radio-other other' . $number,
                'url' => action('User\SurveyController@otherRadio'),
                'typeId' => 5
            ]) !!}
        </div>
    </div>
</div>
