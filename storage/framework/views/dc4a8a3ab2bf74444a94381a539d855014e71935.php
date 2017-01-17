<table class="table-result table">
    <thead class="thead-default">
        <tr>
            <th>
                <?php echo e(trans('survey.index')); ?>

            </th>
            <th>
                <?php echo e(trans('survey.question_type')); ?>

            </th>
            <th>
                <?php echo e(trans('survey.question')); ?>

            </th>
            <th>
                <?php echo e(trans('survey.answerIndex')); ?>

            </th>
            <th>
                <?php echo e(trans('survey.answer')); ?>

            </th>
            <th>
                <?php echo e(trans('survey.quatily')); ?>

            </th>
        </tr>
    </thead>
    <tbody>
        <?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
            <tr>
                <td><?php echo e(++$key); ?></td>
                <td>
                    <?php switch($question->answers[0]->type):
                        case config('survey.type_radio'): ?>
                            <?php echo e(trans('temp.one_choose')); ?>

                            <?php break;
                        case config('survey.type_checkbox'): ?>
                            <?php echo e(trans('temp.multi_choose')); ?>

                            <?php break;
                        case config('survey.type_text'): ?>
                            <?php echo e(trans('temp.text')); ?>

                            <?php break;
                        case config('survey.type_date'): ?>
                            <?php echo e(trans('temp.date')); ?>

                            <?php break;
                        case config('survey.type_time'): ?>
                            <?php echo e(trans('temp.time')); ?>

                            <?php break;
                    endswitch; ?>
                </td>
                <td><?php echo e($question->content); ?></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $answer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php if(in_array($answer->type, [
                    config('survey.type_radio'),
                    config('survey.type_checkbox'),
                    config('survey.type_other_radio'),
                    config('survey.type_other_checkbox'),
                ])): ?>
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td><?php echo e($key . ' . ' . $loop->iteration); ?></td>
                        <td><?php echo e($answer->content); ?></td>
                        <td><?php echo e(count($answer->results)); ?></td>
                    </tr>
                <?php elseif($answer->type != config('survey.type_radio')
                    && $answer->type != config('survey.type_checkbox')): ?>
                    <?php $__currentLoopData = $answer->results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td> - </td>
                            <td><?php echo e($result->content); ?></td>
                            <td></td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
    </tbody>
</table>
