<?php $__env->startSection('content'); ?>
    <div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
        <div id="top-wizard">
            <strong><?php echo e(trans('home.progress')); ?><span id="location"></span></strong>
            <div class="ui-progressbar ui-widget ui-widget-content ui-corner-all"
                id="progressbar"
                role="progressbar"
                aria-valuemin="0"
                aria-valuemax="100"
                aria-valuenow="0">
                <div class="ui-progressbar-value ui-widget-header ui-corner-left">
                </div>
            </div>
            <div class="shadow"></div>
        </div>
        <?php echo Form::open([
            'id' => 'wrapped',
            'class' => 'wizard-form',
            'action' => 'SurveyController@create',
            'novalidate' => 'novalidate',
        ]); ?>

            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                <?php if(Session::has('message')): ?>
                    <div class="alert alert-info alert-message">
                        <?php echo e(Session::get('message')); ?>

                    </div>
                <?php endif; ?>
                <?php if(Session::has('message-fail')): ?>
                    <div class="alert alert-danger alert-message">
                        <?php echo e(Session::get('message-fail')); ?>

                    </div>
                <?php endif; ?>
                <?php echo $__env->make('user.steps.step-infor', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('user.steps.step-create-survey', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('user.steps.step-send-mail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make('user.steps.step-finish', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
            <div id="bottom-wizard">
                <?php echo Form::button(trans('home.backward'), [
                    'class' => 'backward',
                    'disabled' => 'disabled',
                ]); ?>

                <?php echo Form::button(trans('home.forward'), [
                    'class' => 'forward ',
                    'disabled' => 'disabled',
                ]); ?>

            </div>
        <?php echo Form::close(); ?>

    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-info-web'); ?>
    <?php echo $__env->make('user.blocks.info-web', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>