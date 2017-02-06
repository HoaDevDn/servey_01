<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.blocks.list-container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
    <div class="inner">
        <?php if(!Auth::check()): ?>
            <section>
                <h2><?php echo e(trans('home.register_now')); ?></h2>
                <?php echo Form::open(['action' => 'Auth\RegisterController@register']); ?>

                    <div class="field half first">
                        <?php echo Form::email('email', '', [
                            'placeholder' => trans('login.email'),
                            'id' => 'email',
                        ]); ?>

                    </div>
                    <div class="field half">
                        <?php echo Form::text('first-name', '', [
                            'placeholder' => trans('login.first_name'),
                            'id' => 'first-name',
                        ]); ?>

                    </div>
                    <div class="field half first">
                        <?php echo Form::password('password', [
                            'id' => 'password',
                            'placeholder' => trans('login.password'),
                        ]); ?>

                    </div>
                    <div class="field half">
                        <?php echo Form::text('last-name', '', [
                            'placeholder' => trans('login.last_name'),
                            'id' => 'last-name',
                        ]); ?>

                    </div>
                    <div class="field half first">
                        <?php echo Form::password('password_confirmation', [
                            'id' => 'password-confirm',
                            'placeholder' => trans('login.repassword'),
                        ]); ?>

                    </div>
                    <div class="field first">
                        <?php if(
                            $errors->has('email') ||
                            $errors->has('password') ||
                            $errors->has('password_confirmation') ||
                            $errors->has('first-name') ||
                            $errors->has('last-name')
                        ): ?>
                            <div class="alert alert-warning">
                                <p><?php echo e($errors->first('email')); ?></p>
                                <p><?php echo e($errors->first('password')); ?></p>
                                <p><?php echo e($errors->first('password_confirmation')); ?></p>
                                <p><?php echo e($errors->first('first-name')); ?></p>
                                <p><?php echo e($errors->first('last-name')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <ul class="actions">
                        <li>
                            <?php echo Form::submit('Register', ['class' => 'special']); ?>

                            <?php echo Form::button('Login', [
                                'class' => 'bt-login special bt-action',
                                'url' => action('SurveyController@getHome')
                            ]); ?>

                        </li>
                    </ul>
                <?php echo Form::close(); ?>

            </section>
            <?php echo $__env->make('user.blocks.social', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php endif; ?>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>