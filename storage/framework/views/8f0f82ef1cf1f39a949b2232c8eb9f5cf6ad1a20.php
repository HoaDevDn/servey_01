<div class="step2 wizard-hidden step row wizard-step">
    <div class="title-create row">
        <div class="col-md-9">
            <h3 class="wizard-header">
                <?php echo e(trans('home.choose_question')); ?>

            </h3>
        </div>
        <div class="col-md-3">
            <span>
                <?php echo e(Html::image(config('settings.image_system') . 'arrow-down1.png', '', [
                    'class' => 'animated bounceInDown'
                ])); ?>

            </span>
        </div>
    </div>
    <div class="wizard-hidden create-question-validate row">
        <div class="col-md-6 col-md-offset-3">
            <div class="alert alert-warning warning-center">
                <?php echo e(trans('info.create_invalid')); ?>

            </div>
        </div>
    </div>
    <div class="container-add-question">
        <div class="add-question col-md-1">
        </div>
        <div class="hide"></div>
    </div>
    <div class="row">
        <div class="row col-md-4 col-md-offset-8 parent-option">
            <div class="col-md-2 col-md-offset-1 container-option-image">
                <span class="span-option-1">
                    <?php echo e(trans('temp.one_choose')); ?>

                </span>
                <?php echo e(Html::image(config('settings.image_system') . 'radio.png', '', [
                    'class' => 'image-type-option',
                    'url' => action('TempController@addTemp', config('temp.radio_question')),
                    'id' => 'radio-button',
                    'typeId' => config('survey.type_radio'),
                ])); ?>

            </div>
            <div class="col-md-2 container-option-image">
                <span class="span-option-2">
                    <?php echo e(trans('temp.multi_choose')); ?>

                </span>
                <?php echo e(Html::image(config('settings.image_system') . 'checkbox.png', '', [
                    'class' => 'image-type-option',
                    'url' => action('TempController@addTemp', config('temp.checkbox_question')),
                    'id' => 'checkbox-button',
                    'typeId' => config('survey.type_checkbox'),
                ])); ?>

            </div>
            <div class="col-md-2 container-option-image">
                <span class="span-option-3">
                    <?php echo e(trans('temp.text')); ?>

                </span>
                <?php echo e(Html::image(config('settings.image_system') . 'text.png', '', [
                    'class' => 'image-type-option',
                    'url' => action('TempController@addTemp', config('temp.text_question')),
                    'id' => 'text-button',
                    'typeId' => config('survey.type_text'),
                ])); ?>

            </div>
            <div class="col-md-2 container-option-image">
                <span class="span-option-4">
                    <?php echo e(trans('temp.time')); ?>

                </span>
                <?php echo e(Html::image(config('settings.image_system') . 'time.png', '', [
                    'class' => 'image-type-option',
                    'url' => action('TempController@addTemp', config('temp.time_question')),
                    'id' => 'time-button',
                    'typeId' => config('survey.type_time'),
                ])); ?>

            </div>
            <div class="col-md-2 container-option-image">
                <span class="span-option-5">
                    <?php echo e(trans('temp.date')); ?>

                </span>
                <?php echo e(Html::image(config('settings.image_system') . 'type-date.png', '', [
                    'class' => 'image-type-option',
                    'url' => action('TempController@addTemp', config('temp.date_question')),
                    'id' => 'date-button',
                    'typeId' => config('survey.type_date'),
                ])); ?>

            </div>
        </div>
    </div>
</div>
