<div class="inner">
    <header>
        <h1><?php echo e(trans('temp.title')); ?></h1>
        <p><?php echo e(trans('temp.describe')); ?></p>
    </header>
    <?php echo e(Form::open(['action' => 'SurveyController@search'])); ?>

        <div class="div-search">
            <div>
                <?php echo Form::text('txt-search', '', [
                    'placeholder' => trans('home.search_survey'),
                    'class' => 'typeahead form-control',
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
            <a href="<?php echo e(action('SurveyController@getInviteSurvey')); ?>">
                (<?php echo e($count); ?>)<?php echo e(trans('home.invited')); ?>

            </a>
        </div>
    <?php endif; ?>
    <?php if(Session::has('message')): ?>
        <div class="alert alert-info alert-message">
              <?php echo e(Session::get('message')); ?>

        </div>
    <?php endif; ?>
    <section class="tiles">
        <?php $__empty_1 = true; $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); $__empty_1 = false; ?>
            <article class="art-container style<?php echo e(++$key); ?>">
                <span class="image">
                    <?php echo e(Html::image("user/images/pic0$key.jpg")); ?>

                </span>
                <a href="<?php echo e(action('SurveyController@show', $survey->token)); ?>">
                    <h2><?php echo e($survey->title); ?></h2>
                    <div class="content">
                        <p><?php echo e($survey->user->name); ?></p>
                    </div>
                </a>
                <div class="row div-option">
                    <?php if($survey->user_id == auth()->id()): ?>
                        <div class="col-md-2 remove-survey" data-key="<?php echo e($key); ?>"
                            id-survey="<?php echo e($survey->id); ?>"
                            url="<?php echo e(action('SurveyController@delete')); ?>" >
                            <span class="glyphicon glyphicon-trash"></span>
                        </div>
                        <div class="col-md-1 mark-survey" data-url="<?php echo e(action('User\LikeController@markLike')); ?>">
                            <?php if(!$survey->is_liked): ?>
                                <span class="bt-like glyphicon glyphicon-star-empty" data-value="1"></span>
                            <?php else: ?>
                                <span class="bt-like glyphicon glyphicon-star" data-value="0"></span>
                            <?php endif; ?>
                        </div>
                        <div class="col-md-4 send-mail row" data-id-survey="<?php echo e($survey->id); ?>">
                            <div class="col-md-2">
                                <span class="glyphicon glyphicon-envelope"></span>
                            </div>
                            <div class="col-md-9">
                                <?php echo e(trans('temp.send_mail')); ?>

                            </div>
                        </div>
                <?php endif; ?>
                    <div class="col-md-4 view-result" data-url="<?php echo e(action('SurveyController@viewChart', $survey->token)); ?>">
                         <div class="col-md-2">
                            <span class="glyphicon glyphicon-adjust"></span>
                        </div>
                        <div class="col-md-9">
                            <?php echo e(trans('temp.view_result')); ?>

                        </div>
                    </div>
                </div>
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
