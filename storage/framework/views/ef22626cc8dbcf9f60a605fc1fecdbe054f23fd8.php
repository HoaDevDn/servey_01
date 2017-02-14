<?php $__env->startSection('content'); ?>
    <div class="show-chart inner">
        <div class="show-chart-result">
            <h3><?php echo e(trans('temp.result')); ?></h3>
        </div>
       <?php if(!$status): ?>
            <div class="alert alert-info">
                <p><?php echo e(trans('temp.dont_have_result')); ?></p>
            </div>
        <?php else: ?>
            <div class="ct-data" data-number="<?php echo e(count($dataShow)); ?>" data-content="<?php echo e($charts); ?>">
                <?php $__currentLoopData = $dataShow; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                    <div id="container<?php echo e($key); ?>" class="container-chart"></div>
                    <?php if(!is_string($value['chart'][0]['answer'])): ?>
                        <div class="question-chart">
                            <h3><?php echo e($value['question']->content); ?></h3>
                        </div>
                        <div class="content-chart">
                            <?php $i = 1; ?>
                            <?php $__currentLoopData = $value['chart'][0]['answer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div>
                                    <h5><?php echo e($i); ?> .<?php echo e($collection->content); ?></h5>
                                </div>
                                <?php $i++; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            </div>
        <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
     <div class="inner">
        <?php if(Auth::check()): ?>
            <h2><?php echo e(trans('home.wellcome')); ?>,<?php echo e(Auth::user()->name); ?></h1>
         <?php endif; ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>