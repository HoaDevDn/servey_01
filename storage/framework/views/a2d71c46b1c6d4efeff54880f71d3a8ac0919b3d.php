<?php $__env->startSection('content'); ?>
<div class="col-md-8">
    <div class="card">
        <div class="header">
            <h4 class="title"><?php echo e(trans('admin.edit')); ?> <?php echo e(trans('generate.profile')); ?></h4>
        </div>
        <?php echo $__env->make('admin.blocks.alert', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="content">
            <?php echo Form::open([
                'action' => ['Admin\UserController@update', $user->id],
                'method' => 'PUT',
                'enctype' => 'multipart/form-data'
            ]); ?>

                <div class="row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <?php echo Form::label(trans('admin.edmail')); ?>

                            <?php echo Form::email('email', $user->email, [
                                'class' => 'form-control',
                                'placeholder' => trans('generate.email'),
                                'disabled' => 'true',
                            ]); ?>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.name')); ?>

                            <?php echo Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => trans('generate.name')]); ?>

                        </div>
                        <div class="form-group">
                            <?php if($errors->has('name')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($errors->first('name')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.birthday')); ?>

                            <?php echo Form::date('birthday', $user->birthday, ['class' => 'form-control', 'placeholder' => trans('generate.birthday')]); ?>

                        </div>
                        <div class="form-group">
                            <?php if($errors->has('birthday')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($errors->first('birthday')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.gender.name')); ?>

                        </div>
                        <div class = "form-group">
                            <?php echo Form::select('gender', [
                                    '0' => trans('generate.gender.male'),
                                    '1' => trans('generate.gender.female')
                                ],
                                $user->gender, [
                                    'class' => 'inputtext',
                                    'id' => 'gender'
                                ]
                            ); ?>

                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.address')); ?>

                            <?php echo Form::text('address', $user->address, ['class' => 'form-control', 'placeholder' => trans('generate.address')]); ?>

                        </div>
                        <div class="form-group">
                            <?php if($errors->has('address')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($errors->first('address')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.phone')); ?>

                            <?php echo Form::text('phone', $user->phone, ['class' => 'form-control', 'placeholder' => trans('generate.phone')]); ?>

                        </div>
                        <div class="form-group">
                            <?php if($errors->has('phone')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($errors->first('phone')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <?php echo Form::label(trans('generate.avatar')); ?>

                            <?php echo Form::file('image'); ?>

                        </div>
                        <div class="form-group">
                            <?php if($errors->has('image')): ?>
                                <div class="alert alert-warning">
                                    <?php echo e($errors->first('image')); ?>

                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <?php echo Form::button(trans('generate.update'), [
                    'class' => 'btn btn-info btn-fill pull-right',
                    'type' => 'submit',
                ]); ?>

                <div class="clearfix"></div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
<div class="col-md-4">
    <div class="card card-user">
        <div class="image">
            <?php echo Html::image('https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400'); ?>

        </div>
        <div class="content">
            <div class="author">
                 <a href="#">
                <?php echo Form::model($user, [
                    'action' => ['Admin\UserController@update', $user->id],
                    'class' => 'form-horizontal',
                    'method' => 'PUT',
                    'enctype' => 'multipart/form-data',
                ]); ?>

                <?php echo Html::image($user->image, 'userAvatar', ['class' => 'avatar border-gray']); ?>

                  <h4 class="title"><?php echo e($user->name); ?><br />
                     <small><?php echo e($user->email); ?></small>
                  </h4>
                </a>
            </div>
            <p class="description text-center"><?php echo e($user->birthday); ?>

                </br>
                    <?php echo e(($user->gender == config('users.gender.male')) ? trans('generate.gender.male') : trans('generate.gender.female')); ?>

                </br>
                    <?php echo e($user->address); ?>

                </br>
                    <?php echo e($user->phone); ?>

            </p>
        </div>
        <hr>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>