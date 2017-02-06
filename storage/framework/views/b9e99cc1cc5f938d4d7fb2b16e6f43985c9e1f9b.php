<div class="container-list-result">
    <div id="middle-wizard" class="wizard-branch wizard-wrapper" style="padding: 10px;">
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
               <!--  <li><a data-toggle="tab" href="#menu2">Menu 2</a></li>
                <li><a data-toggle="tab" href="#menu3">Menu 3</a></li> -->
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
                    <table class="table">
                        <thead class="thead-default">
                            <tr>
                                <th style="width: 2%; text-align: center;">
                                    STT
                                </th>
                                <th style="width: 45%;">
                                    Question
                                </th>
                                <th style="width: 4%;">
                                    No.
                                </th>
                                <th style="width: 45%;" >
                                    Answer
                                </th>
                                <th style="width: 4%; text-align: center;" align="center">
                                    Quatily
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $__currentLoopData = $surveys->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                <tr>
                                    <td><?php echo e(++$key); ?></td>
                                    <td><?php echo e($value->content); ?></td>
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
                                                <td> <?php echo e($key . '.' . ++$k); ?> </td>
                                                <td><?php echo e($answer->content); ?></td>
                                                <td><?php echo e(count($answer->results)); ?></td>
                                            </tr>
                                        <?php endif; ?>
                                        <?php $__currentLoopData = $answer->results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r => $result): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                            <tr>
                                                <td>&nbsp</td>
                                                <td>&nbsp</td>
                                                <td> - </td>
                                                <td><?php echo e($result->content); ?></td>
                                                <td>&nbsp</td>
                                            </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                        </tbody>
                    </table>
                </div>
                <div id="menu2" class="tab-pane fade">
                    <h3>Menu 2</h3>
                    <p>Some content in menu 2.</p>
                </div>
            </div>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>
