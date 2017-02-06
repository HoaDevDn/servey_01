<div class="container-list-result">
    <div id="middle-wizard" class="div-show-result wizard-branch wizard-wrapper">
        <div class="tab-bootstrap">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <span class="glyphicon glyphicon-adjust"></span>
                        <?php echo e(trans('result.overview')); ?>

                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu1">
                        <span class="glyphicon glyphicon-asterisk"></span>
                        <?php echo e(trans('result.see_detail')); ?>

                    </a>
                </li>
               <?php if(!empty($history)): ?>
                 <li><a data-toggle="tab" href="#menu2"><?php echo e(trans('survey.history')); ?></a></li>
               <?php endif; ?>
            </ul>
            <div class="tab-content">
                <div id="home" class="tab-pane fade in active">
                    <div class="show-chart inner">
                       <?php if(!$status): ?>
                            <div class="alert alert-info">
                                <p><?php echo e(trans('temp.dont_have_result')); ?></p>
                            </div>
                        <?php else: ?>
                            <div class="ct-data" data-number="<?php echo e(count($charts)); ?>" data-content="<?php echo e(json_encode($charts)); ?>">
                                <?php $__currentLoopData = $charts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <div id="container<?php echo e($key); ?>" class="container-chart"></div>
                                    <?php if(!is_string($value['chart'][0]['answer'])): ?>
                                        <div class="container-text-question">
                                            <div class="question-chart">
                                                <h4><?php echo e($key + 1); ?>. <?php echo e($value['question']->content); ?></h4>
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
                </div>
                <div id="menu1" class="tab-pane fade">
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
                            <?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$key); ?></td>
                                    <td>
                                    <?php switch($value->answers[0]->type):
                                        case config('survey.type_radio'): ?>
                                            Radio
                                            <?php break;
                                        case config('survey.type_checkbox'): ?>
                                            Checkbox
                                            <?php break;
                                        case config('survey.type_text'): ?>
                                            Text
                                            <?php break;
                                        case config('survey.type_date'): ?>
                                            Date
                                            <?php break;
                                        case config('survey.type_time'): ?>
                                            Time
                                            <?php break;
                                    endswitch; ?>
                                    </td>
                                    <td><?php echo e($value->content); ?></td>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                    <td>&nbsp</td>
                                </tr>
                                <?php $__currentLoopData = $value->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $k => $answer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                    <?php if($answer->type == config('survey.type_radio')
                                        || $answer->type == config('survey.type_checkbox')
                                        ): ?>
                                        <tr>
                                            <td>&nbsp</td>
                                            <td>&nbsp</td>
                                            <td>&nbsp</td>
                                            <td><?php echo e($key . '.' . ++$k); ?></td>
                                            <td><?php echo e($answer->content); ?></td>
                                            <td><?php echo e(count($answer->results)); ?></td>
                                        </tr>
                                    <?php else: ?>
                                        <?php if($answer->type == config('survey.type_other_radio')
                                            || $answer->type == config('survey.type_other_checkbox')): ?>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td> <?php echo e($key . '.' . ++$k); ?> </td>
                                                <td><?php echo e($answer->content); ?></td>
                                                <td><?php echo e(count($answer->results)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $answer->results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r => $result): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>                                                <td> - </td>
                                                <td><?php echo e($result->content); ?></td>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <?php if(!empty($history)): ?>
                    <div id="menu2" class="tab-pane fade">
                        <?php echo $__env->make('user.pages.survey-answer-detail', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>
