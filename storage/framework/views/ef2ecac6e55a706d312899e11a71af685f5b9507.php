<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.exampe')); ?></h4>
                <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
            </div>
            <div class="content">
                <div id="chartPreferences" class="ct-chart ct-perfect-fourth">
                </div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> <?php echo e(trans('generate.exampe')); ?>

                        <i class="fa fa-circle text-danger"></i> <?php echo e(trans('generate.exampe')); ?>

                        <i class="fa fa-circle text-warning"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-clock-o"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.exampe')); ?></h4>
                <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
            </div>
            <div class="content">
                <div id="chartHours" class="ct-chart"></div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> <?php echo e(trans('generate.exampe')); ?>

                        <i class="fa fa-circle text-danger"></i> <?php echo e(trans('generate.exampe')); ?>

                        <i class="fa fa-circle text-warning"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class="card ">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.exampe')); ?></h4>
                <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
            </div>
            <div class="content">
                <div id="chartActivity" class="ct-chart"></div>
                <div class="footer">
                    <div class="legend">
                        <i class="fa fa-circle text-info"></i> <?php echo e(trans('generate.exampe')); ?>

                        <i class="fa fa-circle text-danger"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                    <hr>
                    <div class="stats">
                        <i class="fa fa-check"></i> <?php echo e(trans('generate.exampe')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card ">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.exampe')); ?></h4>
                <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
            </div>
            <div class="content">
                <div class="table-full-width">
                    <table class="table">
                        <tbody>
                        <td></td>
                        <td><?php echo e(trans('generate.id')); ?></td>
                        <td><?php echo e(trans('generate.title')); ?></td>
                        <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <tr>
                                <td><?php echo e($survey->id); ?></td>
                                <td><?php echo e($survey->title); ?></td>
                                <td class="td-actions text-right">
                                    <?php echo Form::button('<i class="fa fa-edit"></i>',
                                        [
                                            'class' => 'btn btn-info btn-simple btn-xs',
                                            'title' => trans('admin.edit'),
                                            'rel' => 'tooltip'
                                        ]); ?>

                                    <?php echo Form::button('<i class="fa fa-remove"></i>',
                                        [
                                            'class' => 'btn btn-info btn-simple btn-xs',
                                            'title' => trans('admin.remove'),
                                            'rel' => 'tooltip'
                                        ]); ?>

                                </td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div class="footer">
                    <hr>
                    <div class="stats">
                        <i class="fa fa-history"></i><?php echo e(trans('generate.exampe')); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>