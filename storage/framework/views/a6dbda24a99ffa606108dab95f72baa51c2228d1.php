<!DOCTYPE html>
<html lang="en" class=" js no-touch csstransforms csstransitions"><!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title><?php echo e(trans('info.fsurvey')); ?></title>
        <meta name="description" content="">
        <meta name="author" content="Ansonika">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $__env->make('library.css-file', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('library.js-file', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </head>
    <body>
        <?php echo $__env->make('user.blocks.popup-send-mail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <input type="hidden" class="data"
            data-number="<?php echo e(config('temp.data_number')); ?>"
            data-question="<?php echo e(config('temp.data_question')); ?>"
            data-error="<?php echo e(trans('home.error')); ?>"
            data-confirm="<?php echo e(trans('temp.confirm')); ?>"
            data-email-invalid="<?php echo e(trans('temp.email_invalid')); ?>"
            data-link="<?php echo e(action('SurveyController@autocomplete')); ?>"
        />
        <section id="top-area">
            <?php echo $__env->make('user.blocks.menu', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <div class="container animated slideInDown">
                 <div class="row">
                     <div class="col-md-12 main-title">
                        <h1><?php echo e(trans('view.title_web')); ?></h1>
                        <p><?php echo e(trans('view.body.intro.slogan')); ?></p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container" id="main">
            <?php echo $__env->yieldContent('content'); ?>
            <?php echo $__env->yieldContent('content-info-web'); ?>
        </section>
        <?php echo $__env->make('user.blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
