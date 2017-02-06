<div class="title-question animated zoomIn row question{{ $number }}"
    question="{{ $number }}"
    temp-qs="{{ config('temp.temp_radio') }}"
    trash="{{ config('temp.trash_question_radio') }}"
>
    <div class="row">
        <div class="text-question col-md-10">
            {!! Form::text("txt-question[question][$number]", '', [
                'placeholder' => trans('home.enter_question_here'),
                'required' => true,
            ]) !!}
        </div>
        <div class="col-md-2">
            <div class="img-trash">
                <a class="glyphicon glyphicon-picture"></a>
                <a class="glyphicon glyphicon-trash col-md-6" id-question="{{ $number }}"></a>
            </div>
        </div>
    </div>
    <div class="clear clear-as{{ $number }}0"></div>
    <div class="div-content-answer qs-as{{ $number }}0">
        <div class="col-md-1 div-radius"></div>
        <div class="col-md-9">
            <div class="div-text-answer">
                {!! Form::text("txt-question[answers][$number][][" . config('survey.type_radio') . "]", '', [
                    'placeholder' => trans('home.enter_answer_here'),
                    'required' => true,
                ]) !!}
            </div>
        </div>
        <div class="remove-answer col-md-1">
            <a class="glyphicon glyphicon-remove" id-as="{{ $number }}0" num="{{ $number }}"></a>
        </div>
    </div>
    <div class="clear clear-as{{ $number }}1"></div>
    <div class="div-content-answer qs-as{{ $number }}1">
        <div class="col-md-1 div-radius"></div>
        <div class="col-md-9">
            <div class="div-text-answer">
                {!! Form::text("txt-question[answers][$number][][" . config('survey.type_radio') . "]", '', [
                    'placeholder' => trans('home.enter_answer_here'),
                    'required' => true,
                ]) !!}
            </div>
        </div>
        <div class="remove-answer col-md-1">
            <a class="glyphicon glyphicon-remove" id-as="{{ $number }}1" num="{{ $number }}"></a>
        </div>
    </div>
    <div class="clear temp-other{{ $number }}"></div>
    <div class="choose-action row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            {!! Form::button(trans('home.add_option'), [
                'class' => 'add-radio',
                'id-as' => $number,
                'typeId' => config('survey.type_radio'),
                'url' => action('SurveyController@addTemp', config('temp.radio_answer')),
            ]) !!}
        </div>
        <div class="col-md-3">
            {!! Form::button(trans('home.add_other'), [
                'class' => 'add-radio-other other' . $number,
                'typeId' => config('survey.type_other_radio'),
                'url' => action('SurveyController@addTemp', config('temp.other_radio')),
            ]) !!}
        </div>
        <div class="col-md-3" class="div-require">
            <ul class="data-list">
                <li>
                <div class="row">
                    <div class="col-md-3 label-require">
                        <strong><a>{{ trans('temp.require') }}?</a></strong>
                    </div>
                    <div class="col-md-5 button-require">
                        <div class="class-option-require slideThree">
                            {{ Form::checkbox("checkboxRequired[question][$number]", $number, '', [
                                'id' => 'radio' . $number,
                            ]) }}
                            {{ Form::label('radio' . $number, ' ') }}
                        </div>
                    </div>
                </div>
                </li>
            </ul>
        </div>
    </div>
</div>
