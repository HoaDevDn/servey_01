<div class="wizard-hidden submit step wizard-step" id="complete" disabled="disabled">
    <i class="icon-check"></i>
    <h3>
        {{ trans('home.survey_complete') }}
    </h3>
    {!! Form::button(trans('home.submit_survey'), [
        'type' => 'submit',
        'class' => 'submit',
        'disabled' => 'disabled',
    ]) !!}
</div>
