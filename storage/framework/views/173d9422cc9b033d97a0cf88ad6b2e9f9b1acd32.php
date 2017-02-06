<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open([
        'action' => 'User\UserController@update',
        'method' => 'POST',
        'enctype' => 'multipart/form-data',
    ])); ?>

        <?php if(Session::has('message')): ?>
            <div class="alert alert-info alert-message">
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>
        <div class="info-update">
            <div>
                <h2><?php echo e(trans('info.update_user_info')); ?></h2>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.email')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::email('email', $user->email, [
                                'placeholder' => trans('generate.email'),
                            ]); ?>

                        </div>
                        <?php if($errors->has('email')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.name')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('name', $user->name, [
                                'placeholder' => trans('info.name'),
                            ]); ?>

                        </div>
                        <?php if($errors->has('name')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('name')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.image')); ?>

                        </div>
                        <div class="col-md-4 col-image">
                           <?php echo Form::file('image'); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.birthday')); ?>

                        </div>
                        <div class="col-md-4 col-image">
                            <?php echo Form::date('birthday', $user->birthday,[
                                'class' => 'inputtext',
                                'placeholder' => trans('info.datetime'),
                                'id' => 'frm-birthday'
                            ]); ?>

                        </div>
                        <?php if($errors->has('birthday')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('birthday')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.gender')); ?>

                        </div>
                        <div class="col-md-4 col-radio">
                            <?php echo Form::select('gender', [
                                '0' => trans('generate.gender.male'),
                                '1' => trans('generate.gender.female')
                            ],
                            $user->gender, [
                                'id' => 'gender'
                            ]
                        ); ?>

                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.phone')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('phone', Auth::user()->phone, [
                                'placeholder' => trans('info.phone'),
                            ]); ?>

                        </div>
                        <?php if($errors->has('phone')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('phone')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.address')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('address', $user->address, [
                                'placeholder' => trans('info.address'),
                            ]); ?>

                        </div>
                        <?php if($errors->has('address')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('address')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.new_password')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::password('password', [
                                'id' => 'password',
                                'placeholder' =>  trans('info.new_password'),
                            ]); ?>

                        </div>
                    </div>
                    <?php if($errors->has('password')): ?>
                        <div class="alert alert-warning">
                            <?php echo e($errors->first('password')); ?>

                        </div>
                    <?php endif; ?>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('login.repassword')); ?>

                        </div>
                        <div class="col-md-4">
                             <?php echo Form::password('password_confirmation', [
                                'id' => 'password-confirm',
                                'placeholder' => trans('login.repassword'),
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.old_password')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::password('old-password', [
                                'id' => 'old-password',
                                'placeholder' => trans('info.old_password'),
                            ]); ?>

                        </div>
                        <?php if($errors->has('old-password')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('old-password')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                </div>
                <div>
                    <div class="info-last row">
                        <div class="col-md-2 col-md-offset-1">
                            <input type="submit" name="" value="update">
                        </div>
                        <div class="col-md-1">
                            <input type="button" name="" value="Cancel">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
    <div class="inner">
        <h2><?php echo e(trans('home.wellcome')); ?>, <?php echo e(Auth::user()->name); ?></h1>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>