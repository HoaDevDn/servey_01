<?php $__env->startSection('content'); ?>
<div class="row">
    <div class="hide" data-route="<?php echo url('/'); ?>"></div>
    <div class="col-md-12">
        <div class="card">
            <div class="header">
                <h4 class="title"><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.user')); ?></h4>
            </div>
            <?php echo $__env->make('admin.blocks.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            <?php echo $__env->make('admin.blocks.list-user', [
                'users' => $userActives,
                'type' => config('users.status.active')
            ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div class="col-md-12">
        <?php echo Form::open(['action' => ['Admin\UserController@changeStatus', config('users.status.active')]]); ?>

            <div class="card card-plain">
                <div class="header">
                    <h4 class="title"><?php echo e(trans('generate.list')); ?> <?php echo e(trans('generate.user')); ?></h4>
                    <p class="category"><?php echo e(trans('generate.exampe')); ?></p>
                </div>
                <?php echo $__env->make('admin.blocks.list-user', [
                    'users' => $userBlocks,
                    'type' => config('users.status.block')
                ], array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
                <?php echo Form::button(trans('admin.active'), [
                        'class' => 'btn btn-primary',
                        'id' => 'activeButton',
                        'type' => 'submit'
                ]); ?>

        <?php echo Form::close(); ?>

    </div>
    <div class="row">
        <div class="col-md-12 offset-6">
            <?php echo e($users->render()); ?>

        </div>
    </div>
    <div class="popup-container">
            <div class="popup-delete col-md-12" id="form-request">
                <!-- Request Form -->
                <?php echo Form::open(['action' => 'Admin\RequestController@store']); ?>

                <div class="table-popup content table-responsive table-full-width">
                    <table class="popup-table table table-hover">
                          <tr>
                            <td colspan="3">
                               <h4><?php echo e(trans('component.reason')); ?></h4>
                            </td>
                        </tr>
                         <tr>
                            <td><?php echo e(trans('component.email_of_user')); ?></td>
                            <td colspan="2">
                                <span id="emailUser"></span>
                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('component.input_content')); ?></td>
                            <td colspan="2">
                                <?php echo Form::text('txtContent', '', [
                                    'class' => 'form-control',
                                    'id' => 'requestContent'
                                ]); ?>

                            </td>
                        </tr>
                        <tr>
                            <td><?php echo e(trans('component.action_type')); ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-md-2">
                                        <?php echo Form::radio('data-option', config('users.level.user'), [
                                            'class' => 'radio-block'
                                        ]); ?>

                                        <?php echo e(trans('component.block')); ?>

                                    </div>
                                    <div class="col-md-2">
                                        <?php echo Form::radio('data-option', config('users.level.admin'), [
                                            'class' => 'radio-block'
                                        ]); ?>

                                        <?php echo e(trans('component.update_admin')); ?>

                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="row">
                                    <div class="col-md-5 col-md-offset-1">
                                        <?php echo Form::button('Send', [
                                            'class' => 'bt-send-request form-control',
                                            'data-url' => action('Admin\RequestController@store'),
                                            'data-href' => action('Admin\UserController@index'),
                                        ]); ?>

                                    </div>
                                    <div class="col-md-5">
                                        <?php echo Form::button('Cancel', [
                                            'class' => 'bt-send-cancel form-control',
                                        ]); ?>

                                    </div>
                                </div>

                            </td>
                        </tr>
                    </table>
                    <?php echo Form::close(); ?>

                </div>
                <!-- END Login Form -->
            </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>