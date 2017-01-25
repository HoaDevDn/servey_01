<div class="inner">
    <header>
        <h1><?php echo e(trans('temp.title')); ?></h1>
        <p><?php echo e(trans('temp.describe')); ?></p>
    </header>
    <?php echo e(Form::open()); ?>

        <div class="div-search">
            <div>
                <?php echo Form::text('txt-search', '', [
                    'placeholder' => trans('home.search_survey'),
                ]); ?>

            </div>
            <?php echo e(Form::submit(trans('home.search'))); ?>

            <div class="clear"></div>
        </div>
    <?php echo e(Form::close()); ?>

    <?php if(Auth::check()): ?>
        <div class="choose-link">
            <a href="<?php echo e(action('User\SurveyController@getHome')); ?>">
                <?php echo e(trans('home.public')); ?>

            </a>
            <a href="<?php echo e(action('User\SurveyController@listSurveyUser')); ?>">
                <?php echo e(trans('home.me')); ?>

            </a>
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
