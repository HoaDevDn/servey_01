<?php $__env->startSection('content'); ?>
<div class="row" id="survey-list">
    <div class="hide" data-route="<?php echo url('/'); ?>"></div>
    <div class="col-md-12">
    <?php echo Form::open(['action' => ['Admin\SurveyController@update', config('settings.not_feature')], 'method' => 'PUT']); ?>

        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.survey')); ?></h4>
            </div>
            <?php echo $__env->make('admin.blocks.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.blocks.list', ['surveys' => $surveyFeatures], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <?php echo Form::button(trans('admin.change_feature'), [
            'class' => 'btn btn-primary',
            'id' => 'changeFeature',
            'type' => 'submit'
        ]); ?>

        <?php echo Form::close(); ?>

    </div>
    <div class="col-md-12">
        <div class="card card-plain">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.survey')); ?></h4>
                <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
            </div>
            <?php echo Form::open(['action' => ['Admin\SurveyController@update', config('settings.feature')], 'method' => 'PUT']); ?>

            <?php echo $__env->make('admin.blocks.list', ['surveys' => $surveys], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
        <?php echo Form::button(trans('admin.update_feature'), [
            'class' => 'btn btn-primary',
            'id' => 'updateFeature',
            'type' => 'submit',
        ]); ?>

        <?php echo Form::close(); ?>

    </div>
    <div class="row">
        <div class="col-md-12 offset-6">
            <?php echo e($surveyAll->render()); ?>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>