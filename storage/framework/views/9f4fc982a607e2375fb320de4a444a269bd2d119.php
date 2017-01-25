<section>
    <h2><?php echo e(trans('home.login_with')); ?></h2>
    <ul class="icons">
        <li>
            <a href="<?php echo e(action('User\SocialAuthController@redirect', 'google')); ?>" class="icon style2 fa-google">
                <span class="label"><?php echo e(trans('home.google')); ?></span>
            </a>
        </li>
    </ul>
</section>
