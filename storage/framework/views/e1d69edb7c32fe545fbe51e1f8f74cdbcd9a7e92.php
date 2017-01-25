<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <?php echo Html::style('assets/img/favicon.ico', ['type' => 'image/png', 'rel' => 'icon']); ?>

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title></title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
    <meta name="viewport" content="width=device-width" />
    <?php echo Html::style('http://fonts.googleapis.com/css?family=Roboto:400,700,300', ['type' => 'text/css']); ?>

    <?php echo Html::style('http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'); ?>

    <?php echo Html::style(elixir('/admin/css/bootstrap.css')); ?>

    <?php echo Html::style(elixir('/admin/css/bootstrap.min.css')); ?>

    <?php echo Html::style(elixir('/css/app.css')); ?>

</head>
<body>
    <div class="wrapper">
        <div class="sidebar" data-color="blue" data-image="assets/img/sidebar-5.jpg">
            <input type="hidden" data-number="0" idtoken="<?php echo e(csrf_token()); ?>" data-route="<?php echo url('/'); ?>" class="url-token"/>
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="" class="simple-text">
                        <?php echo trans('admin.adminArea'); ?>

                    </a>
                </div>
                <ul class="nav">
                    <li class="active">
                        <a href="<?php echo e(action('HomeController@index')); ?>">
                            <i class="pe-7s-graph"></i>
                            <p><?php echo e(trans('admin.dashboard')); ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(action('Admin\UserController@index')); ?>">
                            <i class="pe-7s-user"></i>
                            <p><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.user')); ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="<?php echo e(action('Admin\SurveyController@index')); ?>">
                            <i class="pe-7s-note2"></i>
                            <p><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.survey')); ?></p>
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="pe-7s-bell"></i>
                            <p><?php echo e(trans('generate.notification')); ?></p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <?php echo $__env->make('admin.blocks.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <!-- begin content -->
            <div class="content">
                <div class="container-fluid">
                    <?php echo $__env->yieldContent('content'); ?>
                </div>
            </div>
            <!-- end content -->
            <?php echo $__env->make('admin.blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <?php echo Html::script(elixir('/js/app.js')); ?>

    <?php echo Html::script(elixir('/admin/js/jquery.js')); ?>

    <?php echo Html::script(elixir('/admin/js/bootstrap.min.js')); ?>

    <?php echo Html::script(elixir('/admin/js/admin-script.js')); ?>

    <?php echo Html::script(elixir('/admin/js/chart.js')); ?>

    <?php echo Html::script(elixir('/admin/js/survey.js')); ?>

    <?php echo Html::script(elixir('bower/bootstrap/dist/js/bootstrap.min.js')); ?>

</body>
</html>
