<div class="content table-responsive table-full-width" id="table">
    <table class="table table-hover table-striped">
        <thead>
            <th><?php echo e(trans('generate.id')); ?></th>
            <th><?php echo e(trans('generate.title')); ?></th>
            <th><?php echo e(trans('generate.email')); ?></th>
            <th><?php echo e(trans('generate.feature.generate')); ?></th>
            <th><?php echo e(trans('generate.chocies')); ?></th>
            <th><?php echo e(trans('generate.remove')); ?></th>
        </thead>
        <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tbody class="sva<?php echo e($survey->id); ?>">
            <tr>
                <td><?php echo e($survey->id); ?></td>
                <td><?php echo e($survey->title); ?></td>
                <td><?php echo e($survey->user->email); ?></td>
                <td>
                    <?php echo e(($survey->feature == config('settings.feature')) ? trans('generate.feature.yes_feature') : trans('generate.feature.not_feature')); ?>

                </td>
                <td>
                    <?php echo Form::checkbox(($survey->feature == config('settings.feature')) ?
                        'checkbox-survey-change[]' : 'checkbox-survey-update[]',
                        $survey->id,
                        '', [
                            'data-toggle' => 'checkbox',
                            'id-survey[]' => $survey->id,
                            'class' => 'bt-form',
                        ]); ?>

                </td>
                <td>
                    <?php echo Form::button('<i class="fa fa-remove"></i>', [
                        'class' => 'btn btn-info btn-simple btn-xs remove-sva',
                        'title' => trans('admin.remove'),
                        'rel' => 'tooltip',
                        'id-survey' => $survey->id
                    ]); ?>

                </td>
            </tr>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>
</div>
