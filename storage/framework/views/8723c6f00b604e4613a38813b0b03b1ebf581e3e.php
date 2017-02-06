 <div class="detail-survey">
    <?php echo Form::open(['action' => ['SettingController@update', $survey->id]]); ?>

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
                            <?php echo e(Form::checkbox("setting[1]", '', '', [
                                'id' => 'requirement-answer',
                                (in_array(config('settings.key.requireAnswer'), array_keys($access))) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('requirement-answer', ' ')); ?>

                        </div>
                    </div>
                    <?php if(in_array(config('settings.key.requireAnswer'), array_keys($access))): ?>
                        <div class="setting-requirement col-md-10 row">
                            <div class="col-md-2">
                                <?php echo e(Form::radio("setting[1]", config('temp.setting.email'), '', [
                                    'id' => 'option-choose-email',
                                    'class' => 'option-choose input-radio',
                                    ($access[1] == 1) ? ('checked=checked') : '',
                                ])); ?>

                                <?php echo e(Form::label('option-choose-email', trans('survey.require.email'), [
                                    'class' => 'label-radio',
                                ])); ?>

                            </div>
                            <div class="col-md-2">
                                <?php echo e(Form::radio("setting[1]", config('temp.setting.name'), '', [
                                    'id' => 'option-choose-name',
                                    'class' => 'option-choose input-radio',
                                    ($access[1] == 2) ? ('checked=checked') : '',
                                ])); ?>

                                <?php echo e(Form::label('option-choose-name', trans('survey.require.name'), [
                                    'class' => 'label-radio',
                                ])); ?>

                            </div>
                            <div class="col-md-6">
                                <?php echo e(Form::radio("setting[1]", config('temp.setting.both'), '', [
                                    'id' => 'option-choose-both',
                                    'class' => 'option-choose input-radio',
                                    ($access[1] == 3) ? ('checked=checked') : '',
                                ])); ?>

                                <?php echo e(Form::label('option-choose-both', trans('survey.require.email_and_name'), [
                                    'class' => 'label-radio',
                                ])); ?>

                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <div class="setting-label">
                    <?php echo e(trans('survey.replies_limits')); ?>

                </div>
                <div class="setting-option row">
                    <div class="col-md-2">
                        <div class="slideThree">
                            <?php echo e(Form::checkbox("setting[2]", '', '', [
                                'id' => 'limit-answer',
                                (in_array(config('settings.key.limitAnswer'), array_keys($access))) ? ('checked=checked') : '',
                            ])); ?>

                            <?php echo e(Form::label('limit-answer', ' ')); ?>

                        </div>
                    </div>
                    <?php if(in_array(config('settings.key.limitAnswer'), array_keys($access))): ?>
                        <div class="setting-limit col-md-4">
                            <div class="qty-buttons">
                                <?php echo e(Form::button('', [
                                    'class' => 'qtyplus',
                                ])); ?>

                                <?php echo Form::text("setting[2]", $access[2], [
                                    'class' => 'quantity-limit qty form-control required',
                                    'placeholder' => trans('survey.require.none'),
                                ]); ?>

                                <?php echo e(Form::button('', [
                                    'class' => 'qtyminus',
                                ])); ?>

                                <span><?php echo e(trans('survey.click_here')); ?>!</span>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <div class="setting-label">
                    <?php echo e(trans('survey.hide_result')); ?>

                </div>
                <div class="setting-option row">
                    <div class="col-md-2">
                        <div class="slideThree">
                            <?php echo e(Form::checkbox("setting[3]", '', '', [
                                'id' => 'hidden-answer',
                                (in_array(config('settings.key.hideResult'), array_keys($access)) ? ('checked=checked') : ''),
                            ])); ?>

                            <?php echo e(Form::label('hidden-answer', ' ')); ?>

                        </div>
                    </div>
                </div>
            </div>
            <div>
                <?php echo Form::submit(trans('survey.save'),  [
                    'class' => 'btn-save-survey  btn-action',
                ]); ?>

            </div>
        </div>
    <?php echo Form::close(); ?>

</div>
