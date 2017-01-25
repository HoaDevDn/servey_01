<?php $__env->startSection('content'); ?>
    <?php echo $__env->make('user.blocks.list-container', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
    <div class="inner">
        <?php if(!Auth::check()): ?>
            <section>
                <h2><?php echo e(trans('home.login_now')); ?></h2>
                <?php echo Form::open(['action' => 'Auth\LoginController@login']); ?>

                    <div class="field half first">
                        <?php echo Form::email('email', '', [
                            'placeholder' => 'Email',
                            'id' => 'email'
                        ]); ?>

                    </div>
                    <div class="field half">
                        <?php echo Form::password('password', [
                            'id' => 'password',
                            'placeholder' => trans('login.password'),
                        ]); ?>

                    </div>
                    <div class="field half first">
                        <?php if($errors->has('email')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('email')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="field half">
                        <?php if($errors->has('password')): ?>
                            <div class="alert alert-warning">
                                <?php echo e($errors->first('password')); ?>

                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="field first">
                        <?php if(Session::has('message')): ?>
                            <div class="alert alert-warning">
                                <p><?php echo e(Session::get('message')); ?></p>
                            </div>
                        <?php endif; ?>
                    </div>
                    <ul class="actions">
                        <li>
                            <?php echo Form::button('Register', [
                                'class' => 'bt-register special bt-action',
                                'url' => action('Auth\RegisterController@register')
                            ]); ?>

                            <?php echo Form::submit('Login', ['class' => 'special']); ?>

                        </li>
                    </ul>
                <?php echo Form::close(); ?>

            </section>
            <?php echo $__env->make('user.blocks.social', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
         <?php else: ?>
             <h2><?php echo e(trans('home.wellcome')); ?>,<?php echo e(Auth::user()->name); ?></h1>
         <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>