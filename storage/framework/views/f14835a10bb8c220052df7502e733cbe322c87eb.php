<div class="step3 wizard-hidden step wizard-step current">
    <div class="container-setting">
        <div class="label-title-setting">
            <?php echo e(trans('info.enter_info')); ?>

        </div>
        <div class="content-setting">
            <?php echo Html::image(config('settings.image_system') . 'setup.png', '',[
                'class' => 'img-setting animated flipInX'
            ]); ?>

            <div class="setting-label">
            <?php echo e(trans('survey.required_answer')); ?>

            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.email'), '', [
                            'id' => 'requirement-answer',
                        ])); ?>

                        <?php echo e(Form::label('requirement-answer', ' ')); ?>

                    </div>
                </div>
                <div class="setting-requirement col-md-10 row div-hidden">
                    <div class="col-md-2">
                        <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.email'), '', [
                            'id' => 'require-email',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-email', trans('survey.require.email'), [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                    <div class="col-md-2">
                        <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.name'), '', [
                            'id' => 'require-name',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-name', trans('survey.require.name'), [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.both'), '', [
                            'id' => 'require-email-name',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-email-name', trans('survey.require.email_and_name'), [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="validate-requirement-answer row">
            <div class="col-md-6">
                <div class="alert alert-warning warning-center">
                    <?php echo e(trans('survey.validate.choose_option')); ?>

                </div>
            </div>
        </div>
        <div class="div-option-require div-hidden row">
            <div class="col-md-1"></div>
            <div class="squaredThree col-md-1">
                <?php echo e(Form::checkbox('setting[' . config('settings.key.requireOnce') . ']', config('settings.key.requireOnce'), '', [
                    'id' => 'require-oneTime',
                ])); ?>

                <?php echo e(Form::label('require-oneTime', ' ')); ?>

            </div>
            <div class="tag-once col-md-5"><?php echo e(trans('survey.require_once')); ?></div>
        </div>
        <div class="div-option-require div-hidden row">
            <div class="col-md-1"></div>
            <div class="squaredThree col-md-1">
                <?php echo e(Form::checkbox('setting[' . config('settings.key.tailMail') . ']', '', '', [
                    'id' => 'require-tail-email',
                ])); ?>

                <?php echo e(Form::label('require-tail-email', ' ')); ?>

            </div>
            <div class="tag-once col-md-5"><?php echo e(trans('survey.tail_mail')); ?></div>
        </div>
        <div class="clear"></div>
        <div class="tail-email div-hidden">
            <?php echo e(Form::text('setting[' . config('settings.key.tailMail') . ']', '', [
                'placeholder' => trans('survey.placeholder.example'),
                'class' => 'frm-tailmail',
                'data-role' => 'tagsinput',
            ])); ?>

        </div>
        <div class="validate-tailmail div-hidden row">
            <div class="col-md-6">
                <div class="alert alert-warning warning-center">
                    <?php echo e(trans('survey.validate.tailmail')); ?>

                </div>
            </div>
        </div>
        <div>
            <div class="setting-label">
                <?php echo e(trans('survey.replies_limits')); ?>

            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox('setting[' . config('settings.key.limitAnswer') . ']', '', '', [
                            'id' => 'limit-answer',
                        ])); ?>

                        <?php echo e(Form::label('limit-answer', ' ')); ?>

                    </div>
                </div>
                <div class="setting-limit col-md-4 div-hidden">
                    <div class="qty-buttons">
                        <?php echo e(Form::button('', [
                            'class' => 'qtyplus',
                        ])); ?>

                        <?php echo e(Form::text('setting[' . config('settings.key.limitAnswer') . ']', '', [
                            'placeholder' => trans('survey.placeholder.none'),
                            'class' => 'quantity-limit qty form-control',
                        ])); ?>

                        <?php echo e(Form::button('', [
                            'class' => 'qtyminus',
                        ])); ?>

                        <span><?php echo e(trans('survey.click_here')); ?>!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="validate-limit-answer row">
            <div class="col-md-6">
                <div class="alert alert-warning warning-center">
                    <?php echo e(trans('survey.validate.validate_number')); ?>

                </div>
            </div>
        </div>
        <div>
            <div class="setting-label">
                <?php echo e(trans('survey.hide_result')); ?>

            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox('setting[' . config('settings.key.hideResult') . ']', config('settings.key.hideResult'), '', [
                            'id' => 'hide-answer',
                        ])); ?>

                        <?php echo e(Form::label('hide-answer', ' ')); ?>

                    </div>
                </div>
            </div>
        </div>
        <div>
            <div class="setting-label">
                <a><?php echo e(trans('info.public')); ?></a>
                <?php echo e(trans('info.this_survey')); ?>?
            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox('feature', config('settings.feature'), '', [
                            'id' => 'feature',
                        ])); ?>

                        <?php echo e(Form::label('feature', ' ')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
