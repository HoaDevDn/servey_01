<?php $__env->startSection('content'); ?>
    <div id="" class="survey_container animated zoomIn wizard" novalidate="novalidate">
        <div id="top-wizard">
            <strong class="tag-wizard-top">
                <?php echo e(trans('user.update_info')); ?>

            </strong>
        </div>
        <?php echo Form::open([
            'action' => 'User\UserController@update',
            'method' => 'PUT',
            'enctype' => 'multipart/form-data',
        ]); ?>

            <div id="middle-wizard" class="wizard-register wizard-branch wizard-wrapper">
                <div class="step wizard-step current">
                    <?php if(Session::has('message')): ?>
                        <div class="alert alert-info alert-message">
                            <?php echo e(Session::get('message')); ?>

                        </div>
                    <?php endif; ?>
                    <?php if(Session::has('message-fail')): ?>
                        <div class="alert alert-danger alert-message">
                            <?php echo e(Session::get('message-fail')); ?>

                        </div>
                    <?php endif; ?>
                    <div class="row">
                        <h3 class="label-header col-md-10 wizard-header">
                            <?php echo e(trans('user.enter_info')); ?>

                        </h3>
                        <div class="col-md-6">
                            <ul class="data-list">
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'email.png', ''); ?>

                                        <?php echo Form::email('email', $user->email, [
                                            'placeholder' => trans('user.your_email'),
                                            'id' => 'email',
                                            'class' => 'required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'name.png', ''); ?>

                                        <?php echo Form::text('name', $user->name, [
                                            'placeholder' => trans('user.your_name'),
                                            'id' => 'name',
                                            'class' => 'required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'birthday3.png', ''); ?>

                                        <?php echo Form::text('birthday', $user->birthday, [
                                            'placeholder' => trans('user.birthday'),
                                            'class' => 'frm-date-2 required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'phone.png', ''); ?>

                                        <?php echo Form::text('phone', $user->phone, [
                                            'placeholder' => trans('user.phone'),
                                            'class' => 'required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'address.png', ''); ?>

                                        <?php echo Form::text('address', $user->address, [
                                            'placeholder' => trans('user.address'),
                                            'class' => 'required form-control',
                                        ]); ?>

                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="col-md-6">
                            <ul class="data-list">
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'lock3.png', ''); ?>

                                        <?php echo Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'required form-control',
                                            'placeholder' => 'Old-password',
                                        ]); ?>

                                    </div>
                                </li>
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'lock2.png', ''); ?>

                                        <?php echo Form::password('password', [
                                            'id' => 'password',
                                            'class' => 'required form-control',
                                            'placeholder' => 'New password',
                                        ]); ?>

                                    </div>
                                </li>
                                <div class="container-infor">
                                    <?php echo Html::image(config('settings.image_system') . 'lock3.png', ''); ?>

                                    <?php echo Form::password('password_confirmation', [
                                        'id' => 'password-confirm',
                                        'class' => 'required form-control',
                                        'placeholder' => trans('user.retype_new_password'),
                                    ]); ?>

                                </div>
                                <li>
                                    <div class="row">
                                        <div class="avatar-img col-md-2">
                                            <?php echo e(trans('user.avatar')); ?>

                                        </div>
                                         <div class="col-md-2">
                                           <?php echo Html::image($user->image, '', [
                                                'class' => 'img-avatar',
                                           ]); ?>

                                        </div>
                                        <div class="col-md-7">
                                            <?php echo Form::button('<span class="glyphicon glyphicon-picture span-menu"></span>' . trans('user.chooser_new_image'), [
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
                <?php echo Form::submit(trans('user.update'), [
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