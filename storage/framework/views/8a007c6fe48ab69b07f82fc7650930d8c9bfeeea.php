<?php $__env->startSection('content'); ?>
    <div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
        <div id="top-wizard">
            <div class="container-menu-wizard row">
                <div class="menu-wizard col-md-10 active-answer active-menu">
                    <?php echo e(trans('home.list_survey')); ?>

                </div>
            </div>
        </div>
        <div class="container-list-answer">
            <div class="middle-content-detail wizard-branch wizard-wrapper">
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
                <div class="div-table-list" style="">
                    <div class="table-list-row row">
                        <div class="col-md-3">
                            <ul class="nav nav-tabs tabs-left sideways">
                                <li class=" active">
                                    <a href="#home-v" data-toggle="tab" style="">
                                        <span class="glyphicon glyphicon-th-list"></span>
                                        <?php echo e(trans('home.your_survey')); ?>

                                    </a>
                                </li>
                                <li>
                                    <a href="#profile-v" data-toggle="tab">
                                    <span class="glyphicon glyphicon-envelope"></span>
                                        <?php echo e(trans('home.survey_invited')); ?>

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
                                        <table class="table-list-survey table table-hover">
                                            <thead>
                                                <tr>
                                                    <th><?php echo e(trans('survey.name')); ?></th>
                                                    <th><?php echo e(trans('survey.date_create')); ?></th>
                                                    <th><?php echo e(trans('survey.send')); ?></th>
                                                    <th><?php echo e(trans('survey.share')); ?></th>
                                                    <th><?php echo e(trans('survey.setting')); ?></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo e(++$key); ?>.
                                                            <a href="<?php echo e(action(($survey->feature)
                                                                    ? 'AnswerController@answerPrivate'
                                                                    : 'AnswerController@answerPublic', [
                                                                        'token' => $survey->token,
                                                                ])); ?>">
                                                                <?php echo e($survey->title); ?>

                                                            </a>
                                                        </td>
                                                        <td>
                                                            <?php echo e($survey->created_at->format('M d Y')); ?>

                                                        </td>
                                                        <?php if(($survey->status)
                                                            && (Carbon\Carbon::parse($survey->deadline)->gt(Carbon\Carbon::now()) || empty($survey->deadline))
                                                            && !in_array($survey->id, $settings)): ?>
                                                            <td>
                                                                <a class="tag-send-email"
                                                                    data-url="<?php echo e(action('SurveyController@inviteUser', [
                                                                        'id' => $survey->id,
                                                                        'type' => config('settings.return.view'),
                                                                    ])); ?>"
                                                                >
                                                                    <span class="glyphicon glyphicon-send"></span>
                                                                    <?php echo e(trans('survey.send')); ?>

                                                                </a>
                                                            </td>
                                                            <?php if($survey->feature): ?>
                                                                <td>
                                                                <div class="fb-share-button"
                                                                    data-href="<?php echo e(action('AnswerController@answerPublic', $survey->token)); ?>"
                                                                    data-layout="button_count"
                                                                    data-size="small"
                                                                    data-mobile-iframe="true">
                                                                <a class="fb-xfbml-parse-ignore"
                                                                    target="_blank"
                                                                    href="<?php echo e(action('AnswerController@answerPublic', $survey->token)); ?>">
                                                                    <?php echo e(trans('survey.share')); ?>

                                                                </a>
                                                                </div>
                                                            </td>
                                                            <?php else: ?>
                                                                <td></td>
                                                            <?php endif; ?>
                                                        <?php else: ?>
                                                            <td class="margin-center" colspan="2">
                                                                <?php echo e(trans('survey.closed_or_private')); ?>

                                                                <?php echo e($survey->status); ?>

                                                            </td>
                                                        <?php endif; ?>
                                                        <td class="margin-center">
                                                            <a href="<?php echo e(action('AnswerController@show', [
                                                                'token' => $survey->token_manage,
                                                                'type' => $survey->feature,
                                                            ])); ?>" class="glyphicon glyphicon-cog"></a>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                            </tbody>
                                        </table>
                                        <?php echo e($surveys->render()); ?>

                                    </div>
                                </div>
                                <div class="tab-pane" id="profile-v">
                                    <?php echo $__env->make('user.pages.list-invited', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                </div>
                                <div class="tab-pane" id="messages-v">Messages Tab.</div>
                                <div class="tab-pane" id="settings-v">Settings Tab.</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="bottom-wizard bottom-wizard-anwser"></div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>