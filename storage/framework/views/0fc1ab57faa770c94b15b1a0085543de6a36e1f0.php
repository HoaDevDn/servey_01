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
            <a href="<?php echo e(action('SurveyController@getHome')); ?>">
                <?php echo e(trans('home.public')); ?>

            </a>
            <a href="<?php echo e(action('SurveyController@listSurveyUser')); ?>">
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
                <a href="<?php echo e(action('SurveyController@show', $survey->token)); ?>">
                    <h2><?php echo e($survey->title); ?><?php echo e($key); ?></h2>
                    <div class="content">
                        <p><?php echo e($survey->user->name); ?></p>
                    </div>
                </a>
            </article>
            <div class="remove-survey" data-key="<?php echo e($key); ?>" id-survey="<?php echo e($survey->id); ?>" url="<?php echo e(action('SurveyController@delete')); ?>">
                <span class="glyphicon glyphicon-trash"></span>
            </div>
            <div class="send-mail row">
                <div class="col-md-2">
                    <span class=" glyphicon glyphicon-envelope"></span>
                </div>
                <div class="col-md-9">Send mails</div>
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
