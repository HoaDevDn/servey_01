<?php $__env->startSection('content'); ?>
<div class="inner">
    <header>
        <h1> A survey is a list of questions aimed at extracting specific data from a particular group of people.</h1>
        <p>Surveys are a method of gathering information from individuals. Surveys have a variety of purposes, and can be conducted in many ways. Surveys may be conducted to gather information through a printed questionnaire, over the telephone, by mail, in person, by diskette, or on the web. This information is collected through use of standardized procedures so that every participant is asked the same questions in the same way. It involves asking people for information in some structured format. Depending on what is being analyzed, the participants being surveyed may be representing themselves, their employer, or some organization to which they belong.</p>
    </header>
    <section class="tiles">
        <article class="style1">
            <span class="image">
                <img src="demo/images/pic01.jpg" alt="" />
            </span>
            <a href="generic.html">
                <h2>Magna</h2>
                <div class="content">
                    <p>Sed nisl arcu euismod sit amet nisi lorem etiam dolor veroeros et feugiat.</p>
                </div>
            </a>
        </article>
    </section>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
    <div class="inner" style="display: flex;">
        <section>
            <?php if(!Auth::check()): ?>
                <h2>login Now</h2>
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
                        <?php echo Form::button('Register', ['class' => 'bt-register special']); ?>

                        <?php echo Form::submit('Login', ['class' => 'special']); ?>

                    </li>
                </ul>
                <?php echo Form::close(); ?>

        </section>

        <section>
                <h2>Login With</h2>
                <ul class="icons">
                    <li>
                        <a href="<?php echo e(action('User\SocialAuthController@redirect', 'google')); ?>" class="icon style2 fa-google">
                            <span class="label">Google</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(action('User\SocialAuthController@redirect', 'github')); ?>" class="icon style2 fa-github">
                            <span class="label">GitHub</span>
                        </a>
                    </li>
                </ul>
            <?php endif; ?>
        </section>
    </div>



    <div class="inner" style="display: none;">
        <?php if(!Auth::check()): ?>
            <section>
                <h2>Register Now</h2>
                <?php echo Form::open(['action' => 'Auth\RegisterController@register']); ?>

                    <div class="field half first">
                        <?php echo Form::email('email', '', [
                            'placeholder' => 'Email',
                            'id' => 'email',
                            'required' => true
                        ]); ?>

                    </div>
                    <div class="field half">
                        <?php echo Form::text('first-name', '', [
                            'placeholder' => 'First Name',
                            'id' => 'first-name',
                            'required' => true
                        ]); ?>


                    </div>
                    <div class="field half first">
                        <?php echo Form::password('password', [
                            'id' => 'password',
                            'placeholder' => trans('login.password'),
                            'required' => 'true'
                        ]); ?>

                    </div>
                    <div class="field half">
                        <?php echo Form::text('last-name', '', [
                            'placeholder' => 'Last Name',
                            'id' => 'last-name',
                            'required' => true
                        ]); ?>

                    </div>
                    <div class="field half first">
                        <?php echo Form::password('password_confirmation', [
                            'id' => 'password-confirm',
                            'placeholder' => trans('login.repassword'),
                            'required' => 'true'
                        ]); ?>

                    </div>
                    <ul class="actions">
                        <li>
                            <?php echo Form::submit('Register', ['class' => 'special']); ?>

                            <?php echo Form::button('Login', ['class' => 'bt-login special']); ?>

                        </li>
                    </ul>
                <?php echo Form::close(); ?>

            </section>

            <section>
                <h2>Login With</h2>
                <ul class="icons">
                    <li>
                        <a href="<?php echo e(action('User\SocialAuthController@redirect', 'google')); ?>" class="icon style2 fa-google">
                            <span class="label">Google</span>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(action('User\SocialAuthController@redirect', 'github')); ?>" class="icon style2 fa-github">
                            <span class="label">GitHub</span>
                        </a>
                    </li>
                </ul>
            </section>
        </div>
        <?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>