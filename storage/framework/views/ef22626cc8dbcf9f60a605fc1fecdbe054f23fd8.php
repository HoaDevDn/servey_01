<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <?php echo e(trans('admin.dashboard')); ?>

                </div>

                <div class="panel-body">
                    <?php echo e(trans('generate.example')); ?>

                </div>
                <?php if(!$status): ?>
                    <dir class="alert alert-info">
                        <p>123123</p>
                    </dir>
                <?php else: ?>
                <div class="ct-data" data-number="<?php echo e(count($dataShow)); ?>" data-content="<?php echo e($charts); ?>">
                    <?php $__currentLoopData = $dataShow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <div id="container<?php echo e($key); ?>"></div>
                        <?php if(!is_string($value['chart'][0]['answer'])): ?>
                        <?php echo e($value['question']->content); ?>

                            <dir>
                                <?php $__currentLoopData = $value['chart'][0]['answer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <p>
                                  <?php echo e($collection->content); ?>

                                </p>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            </dir>
                        <?php endif; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>