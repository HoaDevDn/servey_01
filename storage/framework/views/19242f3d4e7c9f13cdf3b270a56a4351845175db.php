<div >
    <table class="table-invited table table-hover">
        <thead>
            <tr>
                <th><?php echo e(trans('survey.name')); ?></th>
                <th><?php echo e(trans('survey.reciever_date')); ?></th>
                <th><?php echo e(trans('survey.sender')); ?></th>
                <th><?php echo e(trans('survey.status')); ?></th>
                <th><?php echo e(trans('survey.detail')); ?></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $invites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invite): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <tr>
                    <td>
                        <?php echo e(++$key); ?>.
                        <a href="<?php echo e(action(($invite->survey->feature)
                            ? 'AnswerController@answerPublic'
                            : 'AnswerController@answerPrivate', [
                                'token' => $invite->survey->token,
                        ])); ?>">
                            <?php echo e($invite->survey->title); ?>

                        </a>
                    </td>
                    <td>
                        <?php echo e($invite->created_at->format('M d Y')); ?>

                    </td>
                    <td>
                        <?php echo e(($invite->sender) ? $invite->sender->email : $invite->mail); ?>

                    </td>
                    <td>
                        <?php echo ($invite->status) ? "<span class='glyphicon glyphicon-remove-sign'></span>" . trans('survey.not_yet')
                        : "<span class='glyphicon glyphicon-ok-sign'></span>" . trans('survey.answered'); ?>

                    </td>
                    <td>
                        <?php
                            $deadline = $invite->survey->deadline;
                        ?>
                        <?php if(in_array($invite->survey_id, $settings)
                        || (!Carbon\Carbon::parse($deadline)->gt(Carbon\Carbon::now()) && !empty($deadline))
                        ): ?>
                            <?php echo e(trans('survey.closed')); ?>

                        <?php else: ?>
                            <a href="<?php echo e(action(($invite->survey->feature)
                                ? 'AnswerController@answerPublic'
                                : 'AnswerController@answerPrivate', [
                                    'token' => $invite->survey->token,
                            ])); ?>">
                                <?php echo e(trans('survey.link')); ?>

                            </a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </tbody>
    </table>
</div>
