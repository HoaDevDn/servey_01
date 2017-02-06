<div class="clear clear-as<?php echo e($number); ?><?php echo e($num_as); ?>"></div>
<div class="div-content-answer qs-as<?php echo e($number); ?><?php echo e($num_as); ?>" >
    <div class="col-md-1 div-square"></div>
    <div class="col-md-9">
        <div class="div-text-answer">
            <?php echo Form::text("txt-question[answers][$number][][". config('survey.type_checkbox')."]", '', [
                'placeholder' => trans('home.enter_answer_here'),
                'required' => true,
            ]); ?>

        </div>
    </div>
    <div class="remove-answer col-md-1">
        <a class="glyphicon glyphicon-remove" id-as="<?php echo e($number); ?><?php echo e($num_as); ?>" num="<?php echo e($number); ?>"></a>
    </div>
</div>
