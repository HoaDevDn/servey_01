<div class="title-question animated zoomIn row question<?php echo e($number); ?>"
    question="<?php echo e($number); ?>"
    temp-qs="<?php echo e(config('temp.temp')); ?>"
    trash="<?php echo e(config('temp.trash_question_checkbox')); ?>">
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


    <div class="clear clear-as<?php echo e($number); ?>0"></div>
    <div class="div-content-answer qs-as<?php echo e($number); ?>0 row">
        <div class="row">
            <div class="col-md-1 div-square"></div>
            <div class="col-md-9">
                <div class="div-text-answer">
                    <?php echo Form::text("txt-question[answers][$number][][" . config('survey.type_checkbox') . "]", '', [
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
                    'class' => 'hidden-image fileImgAnswer' . $number . '0',
                ]); ?>

                <a class="glyphicon glyphicon-remove" id-as="<?php echo e($number); ?>0" num="<?php echo e($number); ?>">
                </a>
            </div>
        </div>
        <div class="content-image-answer<?php echo e($number); ?>0 div-image-answer animated slideInDown">
            <?php echo Html::image('', '',[
                'class' => 'set-image-answer image-answer' . $number . '0',
            ]); ?>

            <span class="remove-image-answer glyphicon glyphicon-remove" id-answer="<?php echo e($number); ?>0"></span>
        </div>
    </div>


    <div class="clear clear-as<?php echo e($number); ?>"></div>
    <div class="div-content-answer qs-as<?php echo e($number); ?>1">
        <div class="row">
            <div class="col-md-1 div-square"></div>
            <div class="col-md-9">
                <div class="div-text-answer">
                    <?php echo Form::text("txt-question[answers][$number][][" . config('survey.type_checkbox') . "]", '', [
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
                    'class' => 'hidden-image fileImgAnswer' . $number . 1,
                ]); ?>

                <a class="glyphicon glyphicon-remove" id-as="<?php echo e($number); ?>1" num="<?php echo e($number); ?>"></a>
            </div>
        </div>
        <div class="content-image-answer<?php echo e($number); ?>1 div-image-answer animated slideInDown">
            <?php echo Html::image('', '',[
                'class' => 'set-image-answer image-answer' . $number . '1',
            ]); ?>

            <span class="remove-image-answer glyphicon glyphicon-remove" id-answer="<?php echo e($number); ?>1"></span>
        </div>
    </div>
    <div class="clear temp-other<?php echo e($number); ?>"></div>
    <div class="choose-action row">
        <div class="col-md-1"></div>
        <div class="col-md-3">
            <?php echo Form::button(trans('home.add_option'), [
                'class' => 'add-checkbox',
                'id-as' => $number,
                'typeId' => config('survey.type_checkbox'),
                'url' => action('TempController@addTemp', config('temp.checkbox_answer')),
            ]); ?>

        </div>
        <div class="col-md-3">
            <?php echo Form::button(trans('home.add_other'), [
                'class' => 'add-checkbox-other other' . $number,
                'typeId' => config('survey.type_other_checbox'),
                'url' => action('TempController@addTemp', config('temp.other_checkbox')),
            ]); ?>

        </div>
        <div class="col-md-3" class="div-require">
            <ul class="data-list">
                <li>
                    <div class="row">
                        <div class="col-md-6 label-require">
                            <strong><a><?php echo e(trans('temp.require')); ?>?</a></strong>
                        </div>
                        <div class="col-md-5 button-require">
                            <div class="class-option-require slideThree">
                                <?php echo e(Form::checkbox("checkboxRequired[question][$number]", $number, '', [
                                    'id' => 'checkbox' . $number,
                                ])); ?>

                                <?php echo e(Form::label('checkbox' . $number, ' ')); ?>

                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
