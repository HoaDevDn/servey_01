<div class="detail-survey">
    <div class="row">
        <p class="tag-detail-survey">
            <?php echo e($survey->title); ?>

        </p>
        <div class="col-md-6">
            <ul class="data-list">
                <li>
                    <div class="container-infor">
                        <?php echo Html::image(config('settings.image_system') . 'title1.png', ''); ?>

                        <?php echo Form::text('title', $survey->title, [
                            'placeholder' => trans('info.title'),
                            'id' => 'title',
                            'class' => 'required form-control',
                        ]); ?>

                    </div>
                </li>
                <?php echo Form::text('website', '', [
                    'id' => 'website',
                ]); ?>

            </ul>
        </div>
        <div class="col-md-6">
            <ul class="data-list">
                <li>
                    <div class="container-infor">
                        <?php echo Html::image(config('settings.image_system') . 'date.png', ''); ?>

                        <?php echo Form::text('deadline', '', [
                            'placeholder' =>  ($survey->dealine) ?: trans('info.duration'),
                            'id' => 'deadline',
                            'class' => 'frm-deadline datetimepicker form-control',
                        ]); ?>

                        <?php echo Form::label('deadline', trans('info.date_invalid'), [
                            'class' => 'wizard-hidden validate-time error',
                        ]); ?>

                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="frm-textarea container-infor">
            <?php echo Html::image(config('settings.image_system') . 'description.png', ''); ?>

            <?php echo Form::textarea('description', '', [
                'class' => 'form-control',
                'placeholder' => trans('info.description'),
            ]); ?>

        </div>
    </div>
    <div class="note-detail-survey">
        <?php echo e(trans('survey.link')); ?>:
        <a href="<?php echo e(action(($survey->feature)
            ? 'AnswerController@answerPublic'
            : 'AnswerController@answerPrivate', [
                'token' => $survey->token,
        ])); ?>">
            <?php echo e(action(($survey->feature)
                ? 'AnswerController@answerPublic'
                : 'AnswerController@answerPrivate', [
                    'token' => $survey->token,
            ])); ?>

        </a>
    </div>
    <div class="note-detail-survey">
        <?php echo e(trans('survey.date_create')); ?>:
        <?php echo e($survey->created_at->format('M d Y')); ?>

    </div>
    <div class="container-btn-detail row">
        <div class="col-md-3 col-md-offset-3">
            <?php echo Form::submit(trans('survey.save'),  [
                'class' => 'btn-save-survey  btn-action',
            ]); ?>

        </div>
        <div class="col-md-3">
           <?php echo Form::button(trans('survey.delete'),  [
                'data-url' => action('SurveyController@delete'),
                'id-survey' => $survey->id,
                'redirect' => action('SurveyController@listSurveyUser'),
                'class' => 'btn-remove-survey btn-action',
            ]); ?>

        </div>
    </div>
</div>
