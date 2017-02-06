<div class="content table-responsive table-full-width" id="table-<?php echo e($type); ?>">
    <table class="table table-hover">
        <thead>
            <th><?php echo e(trans('generate.avatar')); ?></th>
            <th><?php echo e(trans('generate.id')); ?></th>
            <th><?php echo e(trans('generate.name')); ?></th>
            <th><?php echo e(trans('generate.email')); ?></th>
            <th><?php echo e(trans('generate.birthday')); ?></th>
            <th><?php echo e(trans('generate.address')); ?></th>
            <th><?php echo e(trans('generate.phone')); ?></th>
            <th><?php echo e(trans('generate.gender.name')); ?></th>
            <th><?php echo e(trans('generate.status.generate')); ?></th>
        </thead>
        <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
        <tbody>
            <tr>
                <td>
                    <?php echo Html::image($user->image, 'userAvatar', ['class' => 'avatar border-gray']); ?>

                </td>
                <td><?php echo e($user->id); ?></td>
                <td>
                    <a href="<?php echo e(action('Admin\UserController@show', [$user->id])); ?>"><?php echo e($user->name); ?></a>
                </td>
                <td>
                    <a href="<?php echo e(action('Admin\UserController@show', [$user->id])); ?>"><?php echo e($user->email); ?></a>
                </td>
                <td><?php echo e($user->birthday); ?></td>
                <td><?php echo e($user->address); ?></td>
                <td><?php echo e($user->phone); ?></td>
                <td>
                    <?php echo e(($user->gender == config('users.gender.male')) ?
                        trans('generate.gender.male') : trans('generate.gender.female')); ?>

                </td>
                 <?php if(!$user->requestMember): ?>
                    <td><?php echo e(($user->status) ? trans('generate.status.active') : trans('generate.status.block')); ?></td>
                    <?php if(!$user->level && $user->status): ?>
                        <td>
                            <?php echo e(Form::button('Request', [
                                'class' => 'form-control',
                                'id' => 'bt-request',
                                'userId' => $user->id,
                                'userEmail' => $user->email,
                            ])); ?>

                        </td>

                    <?php endif; ?>
                    <?php if(!$user->status): ?>
                        <td>
                            <?php echo Form::checkbox(($user->status) ?
                                'checkbox-user-active[]' : 'checkbox-user-block[]',
                                $user->id,
                                '', [
                                    'data-toggle' => 'checkbox',
                                    'id-user[]' => $user->id,
                                    'class' => 'bt-form',
                                ]); ?>

                        </td>
                    <?php else: ?>
                        <td></td>
                    <?php endif; ?>
                <?php else: ?>
                    <?php if(!$user->requestMember->status): ?>
                        <td><?php echo e(trans('generate.status.process')); ?></td>
                        <td>
                            <?php echo e(Form::button('Cancel', [
                                'class' => 'form-control',
                                'id' => 'bt-cancel',
                                'requestId' => $user->requestMember->id,
                                'request-url' => action('Admin\RequestController@cancel'),
                                'table-type' => $type,
                            ])); ?>

                        </td>
                    <?php else: ?>
                        <td><?php echo e(trans('generate.status.finish')); ?></td>
                        <?php if(!$user->status): ?>
                            <td>
                                <?php echo e(Form::button('Active', [
                                    'class' => 'form-control',
                                    'id' => 'bt-active',
                                    'table-type' => $type,
                                    'data-url' => action('Admin\UserController@changeStatus', $user->id),
                                ])); ?>

                            </td>
                            <td>
                                <?php echo Form::checkbox(($user->status) ?
                                    'checkbox-user-active[]' : 'checkbox-user-block[]',
                                    $user->id,
                                    '', [
                                        'data-toggle' => 'checkbox',
                                        'id-user[]' => $user->id,
                                        'class' => 'bt-form',
                                ]); ?>

                            </td>
                        <?php else: ?>
                            <td></td>
                        <?php endif; ?>
                        <td></td>
                    <?php endif; ?>
                <?php endif; ?>
            </tr>
        </tbody>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </table>
</div>

