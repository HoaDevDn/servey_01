<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo e(trans('home.get_survey')); ?>!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo e(Html::style(elixir('bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'))); ?>

        <?php echo e(Html::style(elixir('/bower/bootstrap/dist/css/bootstrap.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/main.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/home.css'))); ?>

    </head>
    <body>
        <div class="popupBackground">
            <div class="popupCenter">
                <div class="popupInfo">
                    <span class="glyphicon glyphicon-remove close" ></span>
                    <div>
                        <div>
                            <span><?php echo e(trans('temp.sendto')); ?></span>
                            <input type="text" class="form-emails" name="emails" data-role="tagsinput">
                        </div>
                        <div class="div-send">
                            <input type="submit" value="Send" class="bt-send">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="data" data-number="0" data-question="0"
            data-error="<?php echo e(trans('home.error')); ?>"
            data-confirm="<?php echo e(trans('temp.confirm')); ?>"/>
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <!-- Logo -->
                    <a href="" class="logo">
                        <span class="symbol">
                            <?php echo e(Html::image("demo/images/logo.png")); ?>

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
        <?php echo e(Html::script(elixir('/js/app.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/skel.min.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/jquery.min.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/util.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/main.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/question.js'))); ?>

        <?php echo e(Html::script(elixir('/user/js/component.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/angularjs/angular.min.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/typeahead.js/dist/typeahead.bundle.min.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js'))); ?>



    </body>
</html>
