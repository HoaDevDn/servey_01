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
    <div id="middle-wizard" class="wizard-branch wizard-wrapper" style="padding: 10px;">
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
    <div class="div-table-list">
        <div  class="row" style="width: 100%;">
            <div class="col-md-2" style="width: 19%;">
                <ul class="nav nav-tabs tabs-left sideways">
                    <li class=" active">
                        <a href="#home-v" data-toggle="tab">
                            <span class="glyphicon glyphicon-th-list"></span>
                            Your survey
                        </a>
                    </li>
                    <li>
                        <a href="#profile-v" data-toggle="tab">
                        <span class="glyphicon glyphicon-envelope"></span>
                            Survey invited
                        </a>
                    </li>
                    <li><a href="#messages-v" data-toggle="tab">Messages</a></li>
                    <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
                </ul>
            </div>
            <div class="col-md-10" style="width: 81%;">
              <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active" id="home-v">
                        <div >
                            <table class="table-list-survey table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Date created</th>
                                        <th style="width: 12%;text-align: center;">
                                        Send mail</th>
                                        <th style="width: 10%;text-align: center;">
                                        Setting</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $surveys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $survey): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td>
                                                <?php echo e(++$key); ?>.
                                                <a href="<?php echo e(action(($survey->feature)
                                                        ? 'SurveyController@answerPrivate'
                                                        : 'SurveyController@answerPublic', [
                                                            'token' => $survey->token,
                                                    ])); ?>" style="color: black;">
                                                    <?php echo e($survey->title); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($survey->created_at->format('M d Y')); ?></td>
                                            <td>
                                                <a class="tag-send-email" data-url="<?php echo e(action('SurveyController@inviteUser', [
                                                    'id' => $survey->id,
                                                    'type' => config('settings.return.view')
                                                ])); ?>">
                                                    <span class="glyphicon glyphicon-send"></span>
                                                    Send to
                                                </a>
                                            </td>
                                            <td style="text-align: center;">
                                                <a href="<?php echo e(action('SurveyController@showDetail', $survey->token)); ?>" class="glyphicon glyphicon-cog"></a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                            <?php echo e($surveys->render()); ?>

                        </div>
                    </div>
                    <div class="tab-pane" id="profile-v">
                        <div >
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Reciever date</th>
                                        <th>Sender</th>
                                        <th>Status</th>
                                        <th>Go to survey</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $__currentLoopData = $invites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $invite): $__env->incrementLoopIndices(); $loop = $__env->getFirstLoop(); ?>
                                        <tr>
                                            <td>
                                                <a href="<?php echo e(action(($invite->survey->feature)
                                                        ? 'SurveyController@answerPrivate'
                                                        : 'SurveyController@answerPublic', [
                                                            'token' => $invite->survey->token,
                                                    ])); ?>">
                                                    <?php echo e($invite->survey->title); ?>

                                                </a>
                                            </td>
                                            <td><?php echo e($invite->created_at); ?></td>
                                            <td><?php echo e(($invite->sender) ? $invite->sender->email : $invite->email); ?></td>
                                            <td><?php echo e(($invite->status) ? 'Not yet' : 'Answerd'); ?></td>
                                            <td>
                                                <a href="<?php echo e(action(($invite->survey->feature)
                                                        ? 'SurveyController@answerPrivate'
                                                        : 'SurveyController@answerPublic', [
                                                            'token' => $invite->survey->token,
                                                    ])); ?>">
                                                    Link
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getFirstLoop(); ?>
                                </tbody>
                            </table>
                        </div>
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


<?php echo $__env->make('ui.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>