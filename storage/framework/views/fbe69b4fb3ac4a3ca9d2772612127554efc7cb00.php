<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="col-md-12 col-md-offset-0">
        <div class="card">
            <div class="header text-center">
                <h4 class="title"><?php echo e(trans('component.list_request')); ?></h4>
                <br>
            </div>
            <div class="content table-responsive table-full-width table-upgrade" id="table-request">
                <table class="table table-request">
                    <thead>
                        <th><?php echo e(trans('component.email_user')); ?></th>
                        <th><?php echo e(trans('component.admin_send_request')); ?></th>
                        <th><?php echo e(trans('component.content')); ?></th>
                        <th><?php echo e(trans('component.type')); ?></th>
                        <th><?php echo e(trans('component.delete_request')); ?></th>
                        <th><?php echo e(trans('component.accept')); ?></th>
                        <th><?php echo e(trans('component.action')); ?></th>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $requests; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $request): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td><?php echo e($request->member->email); ?></td>
                            <td><?php echo e($request->admin->email); ?></td>
                            <td><?php echo e($request->content); ?></td>
                            <td><?php echo e(($request->action_type) ? trans('component.updat_admin') : trans('component.block')); ?></td>
                            <?php if(!$request->status): ?>
                                <td><?php echo Form::button('<i class="fa fa-times text-danger"></i>', [
                                    'class' => 'btn btn-info btn-simple btn-xs',
                                    'id' => 'bt-request-delete',
                                    'request-id' => $request->id,
                                    'url' => action('Admin\RequestController@index'),
                                    'data-url' => action('Admin\RequestController@destroy'),
                                ]); ?>

                                </td>
                                <td></td>
                                <td>
                                <?php echo Form::button('Accept', [
                                    'class' => 'form-control',
                                    'id' => 'bt-request-accept',
                                    'url' => action('Admin\RequestController@index'),
                                    'data-url' => action('Admin\RequestController@update', $request->id),
                                ]); ?>

                            </td>
                            <?php else: ?>
                                <td></td>
                                <td><i class="fa fa-check text-success"></td>
                                <td><?php echo Form::button('<i class="fa fa-times text-danger"></i>', [
                                    'class' => 'btn btn-info btn-simple btn-xs',
                                    'id' => 'bt-request-delete',
                                    'request-id' => $request->id,
                                    'url' => action('Admin\RequestController@index'),
                                    'data-url' => action('Admin\RequestController@destroy'),
                                ]); ?>

                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </tbody>
                    <?php echo e($requests->render()); ?>

                </table>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>