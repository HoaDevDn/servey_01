<?php $__env->startSection('content'); ?>
<div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
    <div id="top-wizard">
        <div class="container-menu-wizard row">
            <div class="menu-wizard col-md-10 active-answer active-menu">
                <?php echo e(trans('home.detail_survey')); ?>

            </div>
        </div>
    </div>
    <div class="container-list-answer">
    <div class="middel-content-detail wizard-branch wizard-wrapper">
        <?php if(Session::has('message')): ?>
            <div class="alert alert-info alert-message">
                <?php echo e(Session::get('message')); ?>

            </div>
        <?php endif; ?>
        <?php if(Session::has('message-fail')): ?>
            <div class="alert alert-danger alert-message">
                <?php echo e(Session::get('message-fail')); ?>

            </div>
        <?php endif; ?>
        <div class="tab-class">
            <section class="tabs">
                <input id="tab-1" type="radio" name="radio-set" value="1" class="tab-choose tab-selector-1" checked="checked" />
                <label for="tab-1" class="label tab-label-1"><?php echo e(trans('survey.information')); ?></label>

                <input id="tab-2" type="radio" name="radio-set" value="2" class="tab-choose tab-selector-2" />
                <label for="tab-2" class="label tab-label-2"><?php echo e(trans('survey.setting')); ?></label>

                <input id="tab-3" type="radio" name="radio-set" value="3" class="tab-choose tab-selector-3" />
                <label for="tab-3" class="label tab-label-3"><?php echo e(trans('survey.result')); ?></label>

                <input id="tab-4" type="radio" name="radio-set" value="4" class="tab-choose tab-selector-4" />
                <label for="tab-4" class="label tab-label-4">Contact us</label>

                <div class="clear-shadow"></div>

                <div class="content">
                    <div class="content-1">
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
                                Date create:
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
                    </div>
                    <div class="content-2 div-hidden">
                        <div class="detail-survey">
                            <div class="container-setting">
                                <div class="label-title-setting">
                                    <?php echo e(trans('survey.setting_survey')); ?>

                                </div>
                                <div class="content-setting">
                                    <div class="setting-label">
                                        <?php echo e(trans('Survey.Required_answer')); ?>

                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                <?php echo e(Form::checkbox('requirement-answer', config('settings.survey.feature'), '', [
                                                    'id' => 'requirement-answer',
                                                ])); ?>

                                                <?php echo e(Form::label('requirement-answer', ' ')); ?>

                                            </div>
                                        </div>
                                        <div class="setting-requirement col-md-10 row div-hidden">
                                            <div class="col-md-2">
                                                <?php echo e(Form::radio('set-require-email', '', '', [
                                                    'id' => 'option-choose-email',
                                                    'class' => 'option-choose input-radio',
                                                ])); ?>

                                                <?php echo e(Form::label('option-choose-email', 'Email', [
                                                    'class' => 'label-radio',
                                                ])); ?>

                                            </div>
                                            <div class="col-md-2">
                                                <?php echo e(Form::radio('set-require-name', '', '', [
                                                    'id' => 'option-choose-name',
                                                    'class' => 'option-choose input-radio',
                                                ])); ?>

                                                <?php echo e(Form::label('option-choose-name', 'Name', [
                                                    'class' => 'label-radio',
                                                ])); ?>

                                            </div>
                                            <div class="col-md-6">
                                                <?php echo e(Form::radio('set-require-both', '', '', [
                                                    'id' => 'option-choose-both',
                                                    'class' => 'option-choose input-radio',
                                                ])); ?>

                                                <?php echo e(Form::label('option-choose-both', 'email and name', [
                                                    'class' => 'label-radio',
                                                ])); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="setting-label">
                                        <?php echo e(trans('survey.replies_limits')); ?>

                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                <?php echo e(Form::checkbox('limit-answer', config('settings.survey.feature'), '', [
                                                    'id' => 'limit-answer',
                                                ])); ?>

                                                <?php echo e(Form::label('limit-answer', ' ')); ?>

                                            </div>
                                        </div>
                                        <div class="setting-limit col-md-4 div-hidden">
                                            <div class="qty-buttons">
                                                <input type="button" value="+" class="qtyplus" name="quantity">
                                                <input type="text" name="quantity" value="" class="quantity-limit qty form-control required" placeholder="none">
                                                <input type="button" value="-" class="qtyminus" name="quantity">
                                                <span><?php echo e(trans('survey.click_here')); ?>!</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="setting-label">
                                        <?php echo e(trans('survey.hide_result')); ?>

                                    </div>
                                    <div class="setting-option row">
                                        <div class="col-md-2">
                                            <div class="slideThree">
                                                <?php echo e(Form::checkbox('feature', config('settings.survey.feature'), '', [
                                                    'id' => 'feature',
                                                ])); ?>

                                                <?php echo e(Form::label('feature', ' ')); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-3 div-hidden">
                         <div class="div-result-survey">
                            <div class="div-table-list" style="">
                                <div class="row">
                                    <div class="first-col-result col-md-3">
                                        <ul class="nav nav-tabs tabs-left sideways">
                                            <li class=" active">
                                                <a href="#home-v" data-toggle="tab" style="">
                                                    <span class="glyphicon glyphicon-th-list"></span>
                                                    <?php echo e(trans('survey.overview')); ?>

                                                </a>
                                            </li>
                                            <li>
                                                <a href="#profile-v" data-toggle="tab">
                                                <span class="glyphicon glyphicon-envelope"></span>
                                                    <?php echo e(trans('survey.see_detail')); ?>

                                                </a>
                                            </li>
                                            <li><a href="#messages-v" data-toggle="tab">Messages</a></li>
                                            <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
                                        </ul>
                                    </div>
                                    <div class="col-md-9">
                                      <!-- Tab panes -->
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="home-v">
                                                <div >
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
                                            </div>
                                            <div class="tab-pane" id="profile-v">
                                                <div >
                                                    <div>
                                                        <table class="table-result table">
                                                            <thead class="thead-default">
                                                                <tr>
                                                                    <th>
                                                                        <?php echo e(trans('survey.index')); ?>

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
                                                </div>
                                            </div>
                                            <div class="tab-pane" id="messages-v">
                                                Messages Tab.
                                            </div>
                                            <div class="tab-pane" id="settings-v">
                                                Settings Tab.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-4 div-hidden">
                        <p>Some contedồn hết về 1 nt 4</p>
                        <p>Some content 4</p>
                    </div>
                </div>
            </section>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>

</div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>