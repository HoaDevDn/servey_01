<?php $__env->startSection('content'); ?>
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            <div class="menu-wizard col-md-5 active-answer active-menu">
                <?php echo e(trans('result.answer')); ?>

            </div>
            <div class="menu-wizard col-md-5 active-result col-md-offset-1">
                <?php echo e(trans('result.result')); ?>

            </div>
        </div>
    </div>
    <div class="container-list-answer">
        <?php echo Form::open([
            'id' => 'wrapped',
            'class' => 'wizard-form',
            'novalidate' => 'novalidate',
            'action' => ['User\ResultController@result', $surveys->token],
            'method' => 'POST',
        ]); ?>

            <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                <div class="get-title-survey">
                    <?php echo e($surveys->title); ?>

                </div>
                <div class="description-survey">
                    <h4>
                        <?php echo e($surveys->description); ?>

                    </h4>
                </div>
                <div class="step row wizard-step ">
                    <?php $__currentLoopData = $surveys->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
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
                                                ])); ?>

                                                <?php echo e(Form::label($key.$temp, $answer->content, [
                                                    'class' => 'label-radio',
                                                ])); ?>

                                                <?php break;
                                            case config('survey.type_checkbox'): ?>
                                                <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                                    'id' => "$key$temp",
                                                    'class' => 'input-checkbox',
                                                ])); ?>

                                                <?php echo e(Form::label($key.$temp, $answer->content, [
                                                    'class' => 'label-checkbox'
                                                ])); ?>

                                                <?php break;
                                            case config('survey.type_text'): ?>
                                                 <?php echo Form::textarea("answer[$question->id][$answer->id]", '', [
                                                    'class' => 'form-control',
                                                    'id' => "answer[$question->id][$answer->id]",
                                                ]); ?>

                                                <?php break;
                                            case config('survey.type_time'): ?>
                                                <?php echo Form::text("answer[$question->id][$answer->id]", '', [
                                                    'class' => 'frm-time form-control ',
                                                    'id' => "answer[$question->id]",
                                                ]); ?>

                                                <?php break;
                                            case config('survey.type_date'): ?>
                                                <?php echo Form::text("answer[$question->id][$answer->id]", '', [
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
                                                            'url' => action('SurveyController@addTemp', config('temp.text_other')),
                                                        ])); ?>

                                                        <?php echo e(Form::label($key.$temp, trans('home.other'), [
                                                            'class' => 'label-radio'
                                                        ])); ?>

                                                    </div>
                                                    <div class="append-input col-md-8 append-as<?php echo e($question->id); ?>">
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
                                                            'url' => action('SurveyController@addTemp', config('temp.text_other')),
                                                        ])); ?>

                                                        <?php echo e(Form::label($key.$temp, trans('home.other'), [
                                                            'class' => 'label-checkbox'
                                                        ])); ?>

                                                    </div>
                                                    <div class="col-md-8 append-input-checkbox append-as<?php echo e($question->id); ?>"></div>
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
                </div>
            </div>
            <div id="bottom-wizard">
                <?php echo Form::submit(trans('home.finish'), [
                    'class' => 'submit-answer btn btn-info',
                ]); ?>

            </div>
        <?php echo Form::close(); ?>

    </div>
    <?php echo $__env->make('ui.pages.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('ui.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>