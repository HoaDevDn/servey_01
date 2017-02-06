<?php $__env->startSection('content'); ?>
    <div class="content-question container">
        <div class="title-survey">
            <h1><?php echo e($surveys->title); ?></h1>
        </div>
        <?php echo e(Form::open(['action' => ['User\ResultController@result', $surveys->token]])); ?>

            <?php $__currentLoopData = $surveys->questions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $question): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                <div class="row-container-answer">
                    <div>
                        <p class="qs-content">
                            <?php echo e(++$key); ?>. <?php echo e($question->content); ?>

                        </p>
                    </div>
                    <div class="put-answer">
                         <?php $__currentLoopData = $question->answers; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $temp => $answer): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                            <?php switch($answer->type):
                                case config('survey.type_radio'): ?>
                                    <div class="12u$(small) ct-option">
                                        <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                            'id' => "$key-$temp",
                                            'class' => 'option-choose',
                                            'temp-as' => $answer->id,
                                            'temp-qs' => $question->id
                                        ])); ?>

                                        <label for="<?php echo e($key); ?>-<?php echo e($temp); ?>">
                                            <?php echo e($answer->content); ?>

                                        </label>
                                    </div>
                                    <?php break;
                                case config('survey.type_checkbox'): ?>
                                    <div class="12u$(small) ct-option">
                                        <?php echo e(Form::checkbox("answer[$question->id][$answer->id]", $answer->id, '', [
                                            'id' => "$key-$temp",
                                        ])); ?>

                                        <label for="<?php echo e($key); ?>-<?php echo e($temp); ?>">
                                            <?php echo e($answer->content); ?>

                                        </label>
                                    </div>
                                    <?php break;
                                case config('survey.type_short'): ?>
                                    <div class="put-answer">
                                        <?php echo Form::text("answer[$question->id][$answer->id]", '', ['class' => 'short-text', 'required' => true]); ?>

                                    </div>
                                    <?php break;
                                case config('survey.type_long'): ?>
                                    <div class="put-answer">
                                        <?php echo Form::textarea("answer[$question->id][$answer->id]", '', ['class' => 'long-text', 'required' => true]); ?>

                                    </div>
                                    <?php break;
                                case config('survey.type_other_radio'): ?>
                                    <div class="container-other row">
                                        <div class="col-md-2">
                                            <div class="12u$(small) ct-option">
                                                <?php echo e(Form::radio("answer[$question->id]", $answer->id, '', [
                                                    'id' => "$key-$temp",
                                                    'class' => 'option-add',
                                                    'temp-as' => $answer->id,
                                                    'temp-qs' => $question->id,
                                                    'url' => action('SurveyController@textOther'),
                                                ])); ?>

                                                <label for="<?php echo e($key); ?>-<?php echo e($temp); ?>">
                                                    <?php echo e(trans('home.other')); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 append-as<?php echo e($question->id); ?>"></div>
                                    </div>
                                    <?php break;
                                case config('survey.type_other_checkbox'): ?>
                                    <div class="container-other row">
                                        <div class="col-md-2">
                                            <div class="12u$(small) ct-option">
                                                <?php echo e(Form::checkbox("answer[$question->id]", $answer->id, '', [
                                                    'id' => "$key-$temp",
                                                    'class' => 'option-add',
                                                    'temp-as' => $answer->id,
                                                    'temp-qs' => $question->id,
                                                    'url' => action('SurveyController@textOther'),
                                                ])); ?>

                                                <label for="<?php echo e($key); ?>-<?php echo e($temp); ?>">
                                                    <?php echo e(trans('home.other')); ?>

                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-md-5 append-as<?php echo e($question->id); ?>"></div>
                                    </div>
                                    <?php break;
                            endswitch; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                    </div>
                    <?php if($errors->has('answer.' . $question->id)): ?>
                        <div class="alert alert-warning alert-message">
                            <?php echo e($errors->first('answer.' . $question->id)); ?>

                        </div>
                    <?php endif; ?>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
            <div class="div-submit">
                <?php echo e(Form::submit(trans('home.submit'))); ?>

            </div>
        <?php echo e(Form::close()); ?>

    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>