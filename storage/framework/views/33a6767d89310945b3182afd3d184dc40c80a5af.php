<div class="show-chart inner">
   <?php if(!$status): ?>
        <div class="alert alert-info">
            <p><?php echo e(trans('temp.dont_have_result')); ?></p>
        </div>
    <?php else: ?>
        <div class="ct-data"
            data-number="<?php echo e(count($charts)); ?>"
            data-content="<?php echo e(json_encode($charts)); ?>">
            <?php $__currentLoopData = $charts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div id="container<?php echo e($loop->index); ?>" class="container-chart"></div>
                <?php if(!is_string($value['chart'][0]['answer'])): ?>
                    <div class="container-text-question">
                        <div class="question-chart">
                            <h4><?php echo e($loop->iteration); ?>. <?php echo e($value['question']->content); ?></h4>
                        </div>
                        <div class="content-chart">
                            <?php $__currentLoopData = $value['chart'][0]['answer']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $collection): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <div>
                                    <h5> - <?php echo e($collection->content); ?> </h5>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    <?php endif; ?>
</div>
