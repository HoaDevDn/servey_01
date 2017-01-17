<?php $__env->startSection('content'); ?>
    <div class="survey_container animated zoomIn wizard" novalidate="novalidate" >
        <div id="top-wizard">
            <strong class="tag-wizard-top">
                <?php echo e(trans('login.login')); ?>

            </strong>
        </div>
        <?php echo Form::open([
            'action' => 'Auth\LoginController@login',
            'method' => 'POST',
        ]); ?>

            <div id="wizard-login middle-wizard" class="wizard-branch wizard-wrapper">
                <div class="step wizard-step current">
                    <div class="container-login row">
                        <h3 class="label-header col-md-10 wizard-header col-md-offset-1">
                            <?php echo e(trans('login.enter_email_password')); ?>

                        </h3>
                        <div class="col-md-8 col-md-offset-2">
                            <ul class="data-list">
                                <li>
                                    <div class="container-infor">
                                        <?php echo Html::image(config('settings.image_system') . 'email1.png', ''); ?>

                                        <?php echo Form::email('email', '', [
                                            'id' => 'email',
                                            'class' => 'required form-control',
                                            'placeholder' => trans('login.email'),
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
                                <li class="social-li" >
                                    <div>
                                        <ul class="data-list social-bookmarks clearfix">
                                            <li class="facebook">
                                                <a href="<?php echo e(action('User\SocialAuthController@redirect', ['facebook'])); ?>">
                                                </a>
                                            </li>
                                            <li class="googleplus">
                                                <a href="<?php echo e(action('User\SocialAuthController@redirect', ['google'])); ?>">
                                                </a>
                                            </li>
                                            <li class="twitter">
                                                <a href="<?php echo e(action('User\SocialAuthController@redirect', ['twitter'])); ?>">
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                <?php if(Session::has('message')): ?>
                                    <div class="alert alert-warning warning-login-register">
                                        <p><?php echo e(Session::get('message')); ?></p>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bottom-wizard">
                <?php echo Form::submit(trans('login.login'), [
                    'class' => 'bt-login forward',
                ]); ?>

            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-info-web'); ?>
    <?php echo $__env->make('user.blocks.info-web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>