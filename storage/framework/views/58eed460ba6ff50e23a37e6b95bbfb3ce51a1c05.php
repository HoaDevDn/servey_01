<div class="clear clear-as<?php echo e($number); ?><?php echo e($num_as); ?>"></div>
    <div class="div-content-answer qs-as<?php echo e($number); ?><?php echo e($num_as); ?> row">
        <div class="row">
            <div class="col-md-1 div-radius"></div>
            <div class="col-md-9">
                <div class="div-text-answer">
                    <?php echo Form::text("txt-question[answers][$number][][" . config('survey.type_radio') . "]", '', [
                        'placeholder' => trans('home.enter_answer_here'),
                        'required' => true,
                    ]); ?>

                </div>
            </div>
            <div class="remove-answer col-md-2">
                <?php echo Html::image(config('settings.image_system') . 'img-answer.png', '',[
                    'class' => 'picture-answer'
                ]); ?>

                <?php echo Form::file("image[answers][$number][]", [
                    'class' => 'hidden-image fileImgAnswer' . $number . $num_as,
                ]); ?>

                <a class="glyphicon glyphicon-remove" id-as="<?php echo e($number); ?><?php echo e($num_as); ?>" num="<?php echo e($number); ?>">
                </a>
            </div>
        </div>
        <div class="content-image-answer<?php echo e($number); ?><?php echo e($num_as); ?> div-image-answer animated slideInDown">
            <?php echo Html::image('', '',[
                'class' => 'set-image-answer image-answer' . $number . $num_as,
            ]); ?>

            <span class="remove-image-answer glyphicon glyphicon-remove" id-answer="<?php echo e($number); ?><?php echo e($num_as); ?>"></span>
        </div>
    </div>
