<?php $__env->startSection('content'); ?>
    <?php echo e(Form::open()); ?>

        <div class="info-update">
            <div>
                <h2><?php echo e(trans('info.update_user_info')); ?></h2>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.name')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('phone', Auth::user()->name, [
                                'placeholder' => trans('info.name'),
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.image')); ?>

                        </div>
                        <div class="col-md-4 col-image">
                            <input type="file" name="">
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.gender')); ?>

                        </div>
                        <div class="col-md-4 col-radio">
                            <div>
                                <?php echo e(Form::radio('gender','', '', ['id' => "male"])); ?>

                                <label for="male">
                                    <?php echo e(trans('info.male')); ?>

                                </label>
                            </div>
                            <div class="col-female">
                                <?php echo e(Form::radio('gender','', '', ['id' => "female"])); ?>

                                <label for="female">
                                   <?php echo e(trans('info.female')); ?>

                                </label>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.phone')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('phone', Auth::user()->phone, [
                                'placeholder' => trans('info.phone'),
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="ct-info row">
                        <div class="col-md-1">
                            <?php echo e(trans('info.address')); ?>

                        </div>
                        <div class="col-md-4">
                            <?php echo Form::text('phone', Auth::user()->address, [
                                'placeholder' => trans('info.address'),
                            ]); ?>

                        </div>
                    </div>
                </div>
                <div>
                    <div class="info-last ct-info row">
                        <div class="col-md-4 col-md-offset-1">
                            <input type="submit" name="" value="update">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php echo e(Form::close()); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content-bot'); ?>
    <div class="inner">
        <h2><?php echo e(trans('home.wellcome')); ?>, <?php echo e(Auth::user()->name); ?></h1>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>