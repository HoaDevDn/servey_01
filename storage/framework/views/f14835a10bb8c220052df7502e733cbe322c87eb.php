<div class="step3 wizard-hidden step wizard-step current">
    <div class="container-setting">
        <div class="label-title-setting">
            <?php echo e(trans('info.enter_info')); ?>

        </div>
        <div class="content-setting">
            <div class="setting-label">
                Required to answer
            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox("setting[1]", '1', '', [
                            'id' => 'requirement-answer',
                        ])); ?>

                        <?php echo e(Form::label('requirement-answer', ' ')); ?>

                    </div>
                </div>
                <div class="setting-requirement col-md-10 row div-hidden">
                    <div class="col-md-2">
                        <?php echo e(Form::radio("setting[1]", '1', '', [
                            'id' => 'require-email',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-email', 'Email', [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                    <div class="col-md-2">
                        <?php echo e(Form::radio("setting[1]", '2', '', [
                            'id' => 'require-name',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-name', 'Name', [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                    <div class="col-md-6">
                        <?php echo e(Form::radio("setting[1]", '3', '', [
                            'id' => 'require-email-name',
                            'class' => 'option-choose-answer input-radio',
                        ])); ?>

                        <?php echo e(Form::label('require-email-name', 'Name and Email', [
                            'class' => 'label-radio',
                        ])); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="validate-requirement-answer row">
            <div class="col-md-6">
                <div class="alert alert-warning warning-center">
                    Ban chua chon yeu cau
                </div>
            </div>
        </div>

        <div>
            <div class="setting-label">
                Replies limits
            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox("setting[2]", '', '', [
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

                        <?php echo e(Form::text("setting[2]", '', [
                            'placeholder' => 'none',
                            'class' => 'quantity-limit qty form-control',
                        ])); ?>

                        <?php echo e(Form::button('', [
                            'class' => 'qtyminus',
                        ])); ?>

                        <span>Click here!</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="validate-limit-answer row">
            <div class="col-md-6">
                <div class="alert alert-warning warning-center">
                    <?php echo e(trans('info.create_invalid')); ?>

                </div>
            </div>
        </div>

        <div>
            <div class="setting-label">
                Hide answer result
            </div>
            <div class="setting-option row">
                <div class="col-md-2">
                    <div class="slideThree">
                        <?php echo e(Form::checkbox("setting[3]", '', '', [
                            'id' => 'hide-answer',
                        ])); ?>

                        <?php echo e(Form::label('hide-answer', ' ')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
