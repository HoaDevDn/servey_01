 <div class="detail-survey">
    <?php echo Form::open(['action' => ['SettingController@update',
        'id' => $survey->id,
        'token' => $survey->token_manage,
    ]]); ?>

        <div class="container-setting">
            <div class="label-title-setting">
                <?php echo e(trans('survey.setting_survey')); ?>

            </div>
            <div class="content-setting">
                <div class="setting-label">
                    <?php echo e(trans('survey.required_answer')); ?>

                </div>
                <div class="setting-option row">
                    <div class="col-md-2">
                        <div class="slideThree">
                            <?php echo e(Form::checkbox('setting[' . config('settings.key.requireAnswer') . ']', '', '', [
                                'id' => 'requirement-answer',
                                ($access[config('settings.key.requireAnswer')]) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('requirement-answer', ' ')); ?>

                        </div>
                    </div>
                    <div class="setting-requirement col-md-10 row <?php echo e($access[config('settings.key.requireAnswer')] ? '' : 'div-hidden'); ?>">
                        <div class="col-md-2">
                            <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.email'), '', [
                                'id' => 'option-choose-email',
                                'class' => 'option-choose-answer input-radio',
                                ($access[config('settings.key.requireAnswer')] == config('settings.require.email')) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('option-choose-email', trans('survey.require.email'), [
                                'class' => 'label-radio',
                            ])); ?>

                        </div>
                        <div class="col-md-2">
                            <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.name'), '', [
                                'id' => 'option-choose-name',
                                'class' => 'option-choose-answer input-radio',
                                ($access[config('settings.key.requireAnswer')] == config('settings.require.name')) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('option-choose-name', trans('survey.require.name'), [
                                'class' => 'label-radio',
                            ])); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo e(Form::radio('setting[' . config('settings.key.requireAnswer') . ']', config('settings.require.both'), '', [
                                'id' => 'option-choose-both',
                                'class' => 'option-choose-answer input-radio',
                                ($access[config('settings.key.requireAnswer')] == config('settings.require.both')) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('option-choose-both', trans('survey.require.email_and_name'), [
                                'class' => 'label-radio',
                            ])); ?>

                        </div>
                    </div>
                    <div class="clear"></div>
                    <div class="validate-requirement-answer row">
                        <div class="col-md-6">
                            <div class="alert alert-warning warning-center">
                                <?php echo e(trans('survey.validate.choose_option')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="div-option-require row
                        <?php echo e(array_has([
                            config('settings.require.email'),
                            config('settings.require.both'),
                        ], $access[config('settings.key.requireAnswer')]) ? '' : 'div-hidden'); ?>">
                        <div class="col-md-1"></div>
                        <div class="squaredThree col-md-1">
                            <?php echo e(Form::checkbox('setting[' . config('settings.key.requireOnce') . ']', config('settings.key.requireOnce'), '', [
                                'id' => 'require-oneTime',
                                ($access[config('settings.key.requireOnce')] == config('settings.key.requireOnce')) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('require-oneTime', ' ')); ?>

                        </div>
                        <div class="tag-once col-md-5"><?php echo e(trans('survey.require_once')); ?></div>
                    </div>
                    <div class="div-option-require row
                        <?php echo e(array_has([
                            config('settings.require.email'),
                            config('settings.require.both'),
                        ], $access[config('settings.key.requireAnswer')]) ? '' : 'div-hidden'); ?>">
                        <div class="col-md-1"></div>
                        <div class="squaredThree col-md-1">
                            <?php echo e(Form::checkbox('setting[' . config('settings.key.tailMail') . ']', '', '', [
                                'id' => 'require-tail-email',
                                ($access[config('settings.key.tailMail')]) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('require-tail-email', ' ')); ?>

                        </div>
                        <div class="tag-once col-md-5"><?php echo e(trans('survey.tail_mail')); ?></div>
                    </div>
                    <div class="clear"></div>
                    <div class="tail-email <?php echo e(($access[config('settings.key.tailMail')]) ? '' : 'div-hidden'); ?>">
                        <?php echo e(Form::text('setting[' . config('settings.key.tailMail') . ']', $access[config('settings.key.tailMail')], [
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
                </div>
            </div>
            <div class="image-tab-setting">
                <?php echo Html::image(config('settings.image_system') . 'setup3.png', '',[
                    'class' => 'animated flipInX'
                ]); ?>

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
                                ($access[config('settings.key.limitAnswer')]) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('limit-answer', ' ')); ?>

                        </div>
                    </div>
                    <div class="setting-limit col-md-4 <?php echo e(($access[config('settings.key.limitAnswer')]) ? '' : 'div-hidden'); ?>">
                        <div class="qty-buttons">
                            <?php echo e(Form::button('', [
                                'class' => 'qtyplus',
                            ])); ?>

                            <?php echo Form::text('setting[' . config('settings.key.limitAnswer') . ']', $access[config('settings.key.limitAnswer')], [
                                'class' => 'quantity-limit qty form-control required',
                                'placeholder' => trans('survey.require.none'),
                            ]); ?>

                            <?php echo e(Form::button('', [
                                'class' => 'qtyminus',
                            ])); ?>

                            <span><?php echo e(trans('survey.click_here')); ?>!</span>
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
            </div>
            <div>
                <div class="setting-label"><?php echo e(trans('survey.hide_result')); ?></div>
                <div class="setting-option row">
                    <div class="col-md-2">
                        <div class="slideThree">
                            <?php echo e(Form::checkbox('setting[' . config('settings.key.hideResult') . ']',  config('settings.key.hideResult'), '', [
                                'id' => 'hidden-answer',
                                ($access[config('settings.key.hideResult')]) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('hidden-answer', ' ')); ?>

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
                                ($survey->feature) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('feature', ' ')); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div class="setting-save">
                <?php echo Form::submit(trans('survey.save'), [
                    'class' => 'btn-save-setting  btn-action',
                ]); ?>

            </div>
        </div>
    <?php echo Form::close(); ?>

</div>
