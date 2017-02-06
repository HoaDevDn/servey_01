<div class="title-question animated zoomIn row question<?php echo e($number); ?>" question="<?php echo e($number); ?>">
    <div>
        <div class="row">
            <div class="text-question col-md-10">
                <?php echo Form::text("txt-question[question][$number]", '', [
                    'placeholder' => trans('home.enter_question_here'),
                    'required' => true,
                ]); ?>

            </div>
            <div class="col-md-2">
                <div class="img-trash">
                    <a class="glyphicon glyphicon-picture"></a>
                    <?php echo Form::file("image[question][$number]", [
                        'class' => 'hidden-image fileImg' . $number,
                    ]); ?>

                    <a class="glyphicon glyphicon-trash col-md-6" id-question="<?php echo e($number); ?>"></a>
                </div>
            </div>
        </div>
    </div>
    <div class="content-image-question<?php echo e($number); ?> div-image-question animated slideInDown">
        <?php echo Html::image('', '',[
            'class' => 'set-image image-question' . $number,
        ]); ?>

        <span class="remove-image-question glyphicon glyphicon-remove" id-question="<?php echo e($number); ?>"></span>
    </div>
    <div class="clear"></div>
    <div class="div-content-answer">
        <div class="col-md-1 text-icon" >
            <span class="glyphicon glyphicon-time"></span>
        </div>
        <div class="col-md-8">
            <div class="text-empty">
                <?php echo Form::text("txt-question[answers][$number][][" . config('survey.type_time') . "]", '',[
                    'placeholder' => trans('temp.time_text'),
                    'readonly' => true,
                ]); ?>

            </div>
        </div>
    </div>
    <div class="choose-action row">
        <div class="offset-label col-md-6"></div>
        <div class="col-md-3" class="div-require">
            <ul class="data-require data-list">
                <li>
                    <div class="row">
                        <div class="col-md-6 time-text label-require">
                            <strong><a><?php echo e(trans('temp.require')); ?>?</a></strong>
                        </div>
                        <div class="col-md-5 button-require">
                           <div class="slideThree">
                                <?php echo e(Form::checkbox("checkboxRequired[question][$number]", $number, '', [
                                    'id' => 'time' . $number,
                                ])); ?>

                                <?php echo e(Form::label('time' . $number, ' ')); ?>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
