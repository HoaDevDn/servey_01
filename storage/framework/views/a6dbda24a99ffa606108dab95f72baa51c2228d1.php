<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo e(trans('home.get_survey')); ?>!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo e(Html::style(elixir('/bower/bootstrap/dist/css/bootstrap.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/main.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/home.css'))); ?>

    </head>
    <body>
        <input type="hidden" data-number="0" class="url-token" ms-error="<?php echo e(trans('home.error')); ?>"/>
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <!-- Logo -->
                    <a href="" class="logo">
                        <span class="symbol">
                            <?php echo e(Html::image("demo/images/logo.svg")); ?>

                        </span>
                        <span class="title"><?php echo e(trans('home.survey')); ?></span>
                    </a>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="#menu"><?php echo e(trans('home.menu')); ?></a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        <!-- Menu -->
                <?php echo $__env->make('user.blocks.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <!-- Main -->
            <div id="main">
                <?php echo $__env->yieldContent('content'); ?>
            </div>
        <!-- Footer -->
            <footer id="footer">
                <?php echo $__env->yieldContent('content-bot'); ?>
            </footer>
        </div>
        <!-- Scripts -->
        <?php echo e(Html::script(elixir('/user/js/jquery.min.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/skel.min.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/util.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/main.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/question.js'))); ?>

        <?php echo e(Html::script(elixir('/js/app.js'))); ?>

    </body>
</html>
