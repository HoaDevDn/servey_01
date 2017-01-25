<?php $__env->startSection('content'); ?>
<div class="inner">
    <?php if(Auth::check()): ?>
        <div class="choose-link">
            <a href="<?php echo e(action('User\SurveyController@getHome')); ?>"><?php echo e(trans('home.public')); ?></a>
            <a href="<?php echo e(action('User\SurveyController@listSurveyUser')); ?>"><?php echo e(trans('home.me')); ?></a>
        </div>
    <?php endif; ?>
    <section class="tiles">
        <?php $__empty_1 = true; $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
            <article class="style<?php echo e(++$key); ?>">
                <span class="image">
                    <?php echo e(Html::image("demo/images/pic0$key.jpg")); ?>

                </span>
                <a href="<?php echo e(action('User\SurveyController@answerSurvey', $survey->id)); ?>">
                    <h2><?php echo e($survey->title); ?></h2>
                    <div class="content">
                        <p><?php echo e($survey->user->name); ?></p>
                    </div>
                </a>

            </article>
            <div >
                <a href="a" class="glyphicon glyphicon-trash" style="margin-left:-360px;"></a>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); if ($__empty_1): ?>
            <article class="style1">
                <?php echo e(trans('home.dont_have')); ?>

            </article>
        <?php endif; ?>
    </section>
    <div class="render">
        <?php echo e($surveys->render()); ?>

    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>