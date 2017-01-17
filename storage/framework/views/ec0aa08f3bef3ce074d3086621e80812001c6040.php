<?php $__env->startSection('content'); ?>
    <div id="survey_container" class="div-complete survey_container animated slideInDown wizard" novalidate="novalidate">
        <div class="top-wizard-complete">
            <strong class="tag-complete tag-wizard-top">
                <?php echo e(trans('info.success')); ?>

            </strong>
        </div>
        <div id="middle-wizard" class="wizard-branch wizard-wrapper">
            <div class="step row wizard-step">
                <div class="row">
                    <div class="col-md-4 complete-info">
                        <h3><?php echo e(trans('info.thank_you')); ?>, <?php echo e(Auth::user()->name); ?></h3>
                        <h4><?php echo e(trans('info.survey_created')); ?></h4>
                        <p><?php echo e(trans('info.link_send')); ?></p>
                        <a href="<?php echo e(action((!$feature)
                            ? 'SurveyController@answerPrivate'
                            : 'SurveyController@answerPublic', $token)); ?>">
                            <?php echo e(action((!$feature)
                            ? 'SurveyController@answerPrivate'
                            : 'SurveyController@answerPublic', $token)); ?>

                        </a>
                    </div>
                    <div class="complete-image col-md-8 animated">
                        <?php echo Html::image(config('settings.image_system') . 'congra.png', ''); ?>

                    </div>
                </div>
            </div>
        </div>
        <div class="bot-wizard-complete">
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('ui.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>