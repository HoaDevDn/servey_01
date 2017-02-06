<div class="container-list-answer1">
    <div id="middle-wizard" class="wizard-branch wizard-wrapper">
        <div class="get-title-survey">
            <?php echo e($survey->title); ?>

        </div>
        <div class="description-survey">
            <h4>
                <?php echo e($survey->description); ?>

            </h4>
        </div>
        <div class="row">
            <?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div>
                    <h4 class="tag-question">
                        <?php echo e(++$key); ?>. <?php echo e($question->content); ?>

                        <span><?php echo e(($question->required) ? '(*)' : ''); ?></span>
                    </h4>
                    <ul class="data-list">
                        <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp => $answer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <li class="<?php echo e(($question->required) ?  'required': ''); ?>">
                                <?php switch($answer->type):
                                    case config('survey.type_radio'): ?>
                                        <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                            'id' => "$key$temp",
                                            'class' => 'option-choose input-radio',
                                            'temp-as' => $answer->id,
                                            'temp-qs' => $question->id,
                                            (in_array($answer->id, array_keys($history))) ? ('checked='. 'checked') : null,
                                        ])); ?>

                                        <?php echo e(Form::label($key.$temp, $answer->content, [
                                            'class' => 'label-radio',
                                        ])); ?>

                                        <?php break;
                                    case config('survey.type_checkbox'): ?>
                                        <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                            'id' => "$key$temp",
                                            'class' => 'input-checkbox',
                                            (in_array($answer->id, array_keys($history))) ? ('checked='. 'checked') : null,
                                        ])); ?>

                                        <?php echo e(Form::label($key.$temp, $answer->content, [
                                            'class' => 'label-checkbox'
                                        ])); ?>

                                        <?php break;
                                    case config('survey.type_text'): ?>
                                        <?php echo Form::textarea("answer[$question->id][$answer->id]",
                                            (in_array($answer->id, array_keys($history))) ? $history[$answer->id] : null, [
                                                'class' => 'form-control',
                                                'id' => "answer[$question->id][$answer->id]",
                                                (in_array($answer->id, array_keys($history))) ? ('disabled='. 'true') : null,
                                        ]); ?>

                                        <?php break;
                                    case config('survey.type_time'): ?>
                                        <?php echo Form::text("answer[$question->id][$answer->id]",
                                            (in_array($answer->id, array_keys($history))) ? $history[$answer->id] : null, [
                                                'class' => 'frm-time form-control ',
                                                'id' => "answer[$question->id]",
                                                (in_array($answer->id, array_keys($history))) ? ('disabled='. 'true') : null,
                                        ]); ?>

                                        <?php break;
                                    case config('survey.type_date'): ?>
                                        <?php echo Form::text("answer[$question->id][$answer->id]",
                                            (in_array($answer->id, array_keys($history))) ? $history[$answer->id] : null, [
                                                'class' => 'form-control frm-date-2',
                                                'id' => "answer[$question->id]",
                                                (in_array($answer->id, array_keys($history))) ? ('disabled='. 'true') : null,
                                        ]); ?>

                                        <?php break;
                                    case config('survey.type_other_radio'): ?>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'input-radio option-add',
                                                    'temp-as' => $answer->id,
                                                    'temp-qs' => $question->id,
                                                    (in_array($answer->id, array_keys($history))) ? ('checked='. 'checked') : null,
                                                ])); ?>

                                                <?php echo e(Form::label($key.$temp, (in_array($answer->id, array_keys($history))) ? ( trans('home.other') . $history[$answer->id] ) : null, [
                                                    'class' => 'label-radio'
                                                ])); ?>

                                            </div>
                                        </div>
                                        <?php break;
                                    case config('survey.type_other_checkbox'): ?>
                                        <div class="row">
                                            <div class="col-md-10">
                                                <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'input-checkbox option-add',
                                                    'temp-as' => $answer->id,
                                                    'temp-qs' => $question->id,
                                                    (in_array($answer->id, array_keys($history))) ? ('checked='. 'checked') : null,
                                                ])); ?>

                                                <?php echo e(Form::label($key.$temp, (in_array($answer->id, array_keys($history))) ? ( trans('home.other') . $history[$answer->id] ) : null, [
                                                    'class' => 'label-checkbox'
                                                ])); ?>

                                            </div>
                                        </div>
                                    <?php break;
                                endswitch; ?>
                            </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </ul>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </div>
    </div>
    <div id="bottom-wizard">
    </div>
</div>
