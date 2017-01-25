<div class="clear temp-other<?php echo e($number); ?>"></div>
<div class="div-content-answer answer-other<?php echo e($number); ?>">
    <div class="col-md-1 div-radius"></div>
    <div class="col-md-9">
        <div class="div-text-answer">
            <?php echo Form::text("txt-question[answers][$number][][" . config('survey.type_other_radio') . "]", '', [
                'readonly' => 'true',
                'placeholder' => trans('home.other')
            ]); ?>

        </div>
    </div>
    <div class="remove-answer col-md-1">
        <a class="glyphicon glyphicon-remove remove-other" id-qs="<?php echo e($number); ?>" num="<?php echo e($number); ?>"></a>
    </div>
</div>
