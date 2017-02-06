<?php $__env->startSection('content'); ?>
    <div id="" class="survey_container animated zoomIn wizard" novalidate="novalidate">
        <div id="top-wizard">
            <strong class="tag-wizard-top">
                <?php echo e(trans('login.register')); ?>

            </strong>
        </div>
        <?php echo Form::open([
            'action' => 'Auth\RegisterController@register',
            'method' => 'POST',
            'enctype' => 'multipart/form-data',
        ]); ?>

            <div id="middle-wizard" class="wizard-register wizard-branch wizard-wrapper">
                <div class="step wizard-step current">
                    <div class="row">
                        <h3 class="label-header col-md-10 wizard-header">
                            <?php echo e(trans('login.enter_info')); ?>

                        </h3>
                        <div class="col-md-6">
                            <ul class="data-list">
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'email1.png', ''); ?>

                                        <?php echo Form::email('email', '', [
                                            'id' => 'email',
                                            'class' => 'required form-control',
                                            'placeholder' => trans('login.your_email'),
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'lock1.png', ''); ?>

                                        <?php echo Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'required form-control',
                                            'placeholder' => trans('login.password'),
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'lock1.png', ''); ?>

                                        <?php echo Form::password('password_confirmation', [
                                            'id' => 'password-confirm',
                                            'class' => 'required form-control',
                                            'placeholder' => trans('login.repassword'),
                                        ]); ?>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="data-list">
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'name.png', ''); ?>

                                        <?php echo Form::text('name', '', [
                                            'placeholder' => trans('login.your_name'),
                                            'id' => 'name',
                                            'class' => 'required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="row">
                                        <div class="avatar-img col-md-2">
                                            <?php echo e(trans('login.avatar')); ?>

                                        </div>
                                        <div class="col-md-10">
                                            <?php echo Form::button('<span class="glyphicon glyphicon-picture span-menu"></span>' . 'choose image', [
                                                'id' => 'image',
                                                'class' => 'choose-image',
                                            ]); ?>

                                            <?php echo Form::file('image', [
                                                'id' => 'image',
                                                'class' => 'button-file-hidden',
                                            ]); ?>

                                        </div>
                                    </div>
                                </li>
                            </ul>
                            <ul class="gender-option data-list floated clearfix">
                                <li>
                                    <?php echo e(Form::radio('gender', 0, '', [
                                        'id' => 'gender-male',
                                        'class' => 'input-radio',
                                    ])); ?>

                                    <?php echo e(Form::label('gender-male', trans('info.male'), [
                                        'class' => 'label-radio',
                                    ])); ?>

                                </li>
                                <li>
                                    <?php echo e(Form::radio('gender', 1, '', [
                                        'id' => 'gender-female',
                                        'class' => 'input-radio',
                                    ])); ?>

                                    <?php echo e(Form::label('gender-female', trans('info.female'), [
                                        'class' => 'label-radio',
                                    ])); ?>

                                </li>
                            </ul>
                        </div>
                         <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <?php if(
                                    $errors->has('email') ||
                                    $errors->has('password') ||
                                    $errors->has('password_confirmation') ||
                                    $errors->has('name') ||
                                    $errors->has('image')
                                ): ?>
                                    <div class="alert alert-warning warning-login-register">
                                        <p><?php echo e($errors->first('email')); ?></p>
                                        <p><?php echo e($errors->first('password')); ?></p>
                                        <p><?php echo e($errors->first('password_confirmation')); ?></p>
                                        <p><?php echo e($errors->first('name')); ?></p>
                                        <p><?php echo e($errors->first('image')); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bottom-wizard">
                <?php echo Form::submit(trans('login.register'), [
                    'class' => 'bt-register forward',
                ]); ?>

            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-info-web'); ?>
    <?php echo $__env->make('ui.blocks.info-web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>