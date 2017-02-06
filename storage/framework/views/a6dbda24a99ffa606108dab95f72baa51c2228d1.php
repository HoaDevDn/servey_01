<!DOCTYPE HTML>
<html>
    <head>
        <title><?php echo e(trans('home.get_survey')); ?>!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <?php echo e(Html::style(elixir('/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css'))); ?>

        <?php echo e(Html::style(elixir('/bower/bootstrap/dist/css/bootstrap.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/main.css'))); ?>

        <?php echo e(Html::style(elixir('/user/css/home.css'))); ?>

        <?php echo e(Html::style(elixir('/bower/font-awesome/css/font-awesome.min.css'))); ?>

    </head>
    <body>
        <div class="popupBackground">
            <div class="popupCenter">
                <div class="popupInfo">
                    <span class="glyphicon glyphicon-remove close" ></span>
                    <div>
                        <div>
                            <span><?php echo e(trans('temp.send_to')); ?></span>
                            <?php echo Form::text('emails', '', [
                                'placeholder' => trans('temp.email_name'),
                                'class' => 'form-emails',
                                'data-role' => 'tagsinput',
                            ]); ?>

                        </div>
                        <div class="div-send">
                            <?php echo Form::submit(trans('temp.send'),  [
                                'data-url' => action('SurveyController@inviteUser'),
                                'data-redirect' => action('SurveyController@getHome'),
                                'class' => 'bt-send',
                            ]); ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="data" data-number="0" data-question="0"
            data-error="<?php echo e(trans('home.error')); ?>"
            data-confirm="<?php echo e(trans('temp.confirm')); ?>"
            data-email-invalid="<?php echo e(trans('temp.email_invalid')); ?>"
            data-link="<?php echo e(action('SurveyController@autocomplete')); ?>"
        />
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <!-- Logo -->
                    <a href="" class="logo">
                        <span class="symbol">
                            <?php echo e(Html::image("/user/images/logo.png")); ?>

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
        <?php echo e(Html::script(elixir('/bower/highcharts/highcharts.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/highcharts/highcharts-3d.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/highcharts/js/modules/exporting.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/autocomplete/dist/autocomplete.js'))); ?>

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

        <?php echo e(Html::script(elixir('/admin/js/chart.js'))); ?>

        <?php echo e(Html::script(elixir('/bower/bootstrap3-typeahead/bootstrap3-typeahead.min.js'))); ?>

    </body>
</html>
