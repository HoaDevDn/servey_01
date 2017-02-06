<?php $__currentLoopData = $survey->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
    <div>
        <h4 class="tag-question">
            <?php echo e(++$key); ?> . <?php echo e($question->content); ?>

            <span><?php echo e(($question->required) ? '(*)' : ''); ?></span>
        </h4>
        <?php if($question->image): ?>
            <?php echo Html::image($question->image, '',[
                'class' => 'show-img-answer',
            ]); ?>

        <?php endif; ?>
        <ul class="data-list">
            <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp => $answer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <?php $checked = ''; ?>
                <?php if($tempAnswers): ?>
                    <?php $__currentLoopData = $tempAnswers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tempAnswer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                        <?php $checked = ($tempAnswer['answer_id'] == $answer->id) ? $tempAnswer['content'] : $checked; ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                <?php endif; ?>
                <li class="<?php echo e(($question->required) ?  'required': ''); ?>">
                    <?php switch($answer->type):
                        case config('survey.type_radio'): ?>
                            <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                'id' => "$key$temp",
                                'class' => 'option-choose input-radio',
                                'temp-as' => $answer->id,
                                'temp-qs' => $question->id,
                                ($checked) ? 'checked = checked' : null,
                            ])); ?>

                            <?php echo e(Form::label($key . $temp, $answer->content, [
                                'class' => 'label-radio',
                            ])); ?>

                            <?php if($answer->image): ?>
                                <div>
                                    <?php echo Html::image($answer->image, '',[
                                        'class' => 'show-img-answer',
                                    ]); ?>

                                </div>
                            <?php endif; ?>
                            <?php break;
                        case config('survey.type_checkbox'): ?>
                            <div>
                                <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                'id' => "$key$temp",
                                'class' => 'input-checkbox',
                                ($checked) ? 'checked = checked' : null,
                            ])); ?>

                            <?php echo e(Form::label($key . $temp, $answer->content, [
                                'class' => 'label-checkbox'
                            ])); ?>

                            </div>
                            <?php if($answer->image): ?>
                                <div>
                                    <?php echo Html::image($answer->image, '',[
                                        'class' => 'show-img-answer',
                                    ]); ?>

                                </div>
                            <?php endif; ?>
                            <?php break;
                        case config('survey.type_text'): ?>
                             <?php echo Form::textarea("answer[$question->id][$answer->id]", $checked, [
                                'class' => 'form-control answer',
                                'id' => "answer[$question->id][$answer->id]",
                            ]); ?>

                            <?php break;
                        case config('survey.type_time'): ?>
                            <?php echo Form::text("answer[$question->id][$answer->id]", $checked, [
                                'class' => 'frm-time form-control',
                                'id' => "answer[$question->id]",
                            ]); ?>

                            <?php break;
                        case config('survey.type_date'): ?>
                            <?php echo Form::text("answer[$question->id][$answer->id]", $checked, [
                                'class' => 'form-control frm-date-2',
                                'id' => "answer[$question->id]",
                            ]); ?>

                            <?php break;
                        case config('survey.type_other_radio'): ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                        'id' => "$key$temp",
                                        'class' => 'input-radio option-add',
                                        'temp-as' => $answer->id,
                                        'temp-qs' => $question->id,
                                        'url' => action('TempController@addTemp', config('temp.text_other')),
                                        ($checked) ? 'checked = checked' : null,
                                    ])); ?>

                                    <?php echo e(Form::label($key.$temp, trans('home.other'), [
                                        'class' => 'label-radio',
                                    ])); ?>

                                </div>
                                <div class="append-input col-md-8 append-as<?php echo e($question->id); ?>">
                                    <?php if($checked): ?>
                                        <?php echo Form::textarea("answer[$question->id][$answer->id]", $checked, [
                                            'class' => 'animated zoomIn form-control input' . $question->id,
                                            'required' => true,
                                        ]); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php break;
                        case config('survey.type_other_checkbox'): ?>
                            <div class="row">
                                <div class="col-md-2">
                                    <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                        'id' => "$key$temp",
                                        'class' => 'input-checkbox option-add',
                                        'temp-as' => $answer->id,
                                        'temp-qs' => $question->id,
                                        'url' => action('TempController@addTemp', config('temp.text_other')),
                                        ($checked) ? 'checked = checked' : null,
                                    ])); ?>

                                    <?php echo e(Form::label($key.$temp, trans('home.other'), [
                                        'class' => 'label-checkbox',
                                    ])); ?>

                                </div>
                                <div class="col-md-8 append-input-checkbox append-as<?php echo e($question->id); ?>">
                                    <?php if($checked): ?>
                                        <?php echo Form::textarea("answer[$question->id][$answer->id]", $checked, [
                                            'class' => 'animated zoomIn form-control input' . $question->id,
                                            'required' => true,
                                        ]); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php break;
                    endswitch; ?>
                </li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
        </ul>
            <?php if($errors->has('answer.' . $question->id)): ?>
                <div class="alert alert-danger alert-message">
                    <?php echo e($errors->first('answer.' . $question->id)); ?>

                </div>
            <?php endif; ?>
            <?php if($errors->has('answer.' . $question->id . '.' . $question->answers[0]->id)): ?>
                <div class="alert alert-danger alert-message">
                    <?php echo e($errors->first('answer.' . $question->id . '.' . $question->answers[0]->id)); ?>

                </div>
            <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
