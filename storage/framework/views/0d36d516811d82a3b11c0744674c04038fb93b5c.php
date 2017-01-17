<?php $__env->startSection('content'); ?>
    <div id="survey_container" class="survey_container animated zoomIn wizard" novalidate="novalidate">
        <div id="top-wizard">
            <div class="container-menu-wizard row">
                <?php if(!in_array(config('settings.key.hideResult'), array_keys($access)) || ($survey->user_id == auth()->id())): ?>
                    <div class="menu-wizard col-md-5 active-answer active-menu">
                        <?php echo e(trans('result.answer')); ?>

                    </div>
                    <div class="menu-wizard col-md-5 active-result col-md-offset-1">
                        <?php echo e(trans('result.result')); ?>

                    </div>
                <?php else: ?>
                    <div class="menu-wizard col-md-8 col-md-offset-2 active-answer active-menu">
                        <?php echo e(trans('result.answer')); ?>

                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div class="container-list-answer">
            <?php echo Form::open([
                'id' => 'wrapped',
                'class' => 'wizard-form',
                'novalidate' => 'novalidate',
                'action' => ['ResultController@result', $survey->token],
                'method' => 'POST',
            ]); ?>

                <div id="middle-wizard" class="wizard-branch wizard-wrapper">
                    <div class="get-title-survey">
                        <?php echo e($survey->title); ?>

                    </div>
                    <div class="description-survey">
                        <h4>
                            <?php echo e($survey->description); ?>

                        </h4>
                    </div>
                    <div class="alert alert-info alert-message save-message-success"></div>
                    <div class="alert alert-danger alert-message save-message-fail"></div>
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
                    <div class="container-all-question step row wizard-step ">
                       <div class="container-survey" id="container-survey">
                           <?php echo $__env->make('user.component.temp-answer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                       </div>
                    </div>
                </div>
                <div class="required-user">
                    <div class="row" >
                        <?php if(in_array(config('settings.key.requireAnswer'), array_keys($access))): ?>
                            <?php switch($access[config('settings.key.requireAnswer')]):
                                case config('settings.require.email'): ?>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="container-infor">
                                            <?php echo Html::image(config('settings.image_system') . 'email1.png', ''); ?>

                                            <?php echo Form::email('email-answer', '', [
                                                'id' => 'email',
                                                'class' => 'frm-require-answer form-control',
                                                'placeholder' => trans('login.your_email'),
                                            ]); ?>

                                        </div>
                                        <?php if($errors->has('email-answer')): ?>
                                            <div class="alert alert-danger alert-message">
                                                <?php echo e($errors->first('email-answer')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php break;
                                case config('settings.require.name'): ?>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="container-infor">
                                            <?php echo Html::image(config('settings.image_system') . 'name.png', ''); ?>

                                            <?php echo Form::text('name-answer', '', [
                                                'placeholder' => trans('login.your_name'),
                                                'id' => 'name',
                                                'class' => 'frm-require-answer form-control',
                                            ]); ?>

                                        </div>
                                        <?php if($errors->has('name-answer')): ?>
                                            <div class="alert alert-danger alert-message">
                                                <?php echo e($errors->first('name-answer')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php break;
                                default: ?>
                                    <div class="col-md-5 col-md-offset-1">
                                        <div class="container-infor">
                                            <?php echo Html::image(config('settings.image_system') . 'email1.png', ''); ?>

                                            <?php echo Form::email('email-answer', '', [
                                                'id' => 'email',
                                                'class' => 'frm-require-answer form-control',
                                                'placeholder' => trans('login.your_email'),
                                            ]); ?>

                                        </div>
                                        <?php if($errors->has('email-answer')): ?>
                                            <div class="alert alert-danger alert-message">
                                                <?php echo e($errors->first('email-answer')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="col-md-5 ">
                                        <div class="container-infor">
                                            <?php echo Html::image(config('settings.image_system') . 'name.png', ''); ?>

                                            <?php echo Form::text('name-answer', '', [
                                                'placeholder' => trans('login.your_name'),
                                                'id' => 'name',
                                                'class' => 'frm-require-answer form-control',
                                            ]); ?>

                                        </div>
                                        <?php if($errors->has('name-answer')): ?>
                                            <div class="alert alert-danger alert-message">
                                                <?php echo e($errors->first('name-answer')); ?>

                                            </div>
                                        <?php endif; ?>
                                    </div>
                                    <?php break;
                            endswitch; ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div id="bottom-wizard">
                <?php $inArray = in_array(config('settings.key.limitAnswer'), array_keys($access));
                    $check = (($inArray && $access[config('settings.key.limitAnswer')]) || !$inArray); ?>
                    <?php if($survey->status
                        && (Carbon\Carbon::parse($survey->deadline)->gt(Carbon\Carbon::now()) || empty($survey->deadline))
                        && $check): ?>
                        <?php if(auth()->check()): ?>
                            <?php echo Form::button(trans('home.save'), [
                                'class' => 'submit-answer btn btn-info save-survey',
                                'survey-id' => $survey->id,
                                'data-url' => action('User\SaveTempController@store'),
                                'feature' => $survey->feature,
                                'user-id' => $survey->user_id,
                                'id' => 'btn-save',
                            ]); ?>

                            <?php echo Form::button(trans('home.load'), [
                                'class' => 'submit-answer btn btn-info show-survey',
                                'survey-id' => $survey->id,
                                'data-url' => action('User\SaveTempController@show'),
                                'id' => 'btn-load',
                            ]); ?>

                        <?php endif; ?>
                        <?php echo Form::submit(trans('home.finish'), [
                            'class' => 'submit-answer btn btn-info',
                        ]); ?>

                    <?php endif; ?>
                </div>
            <?php echo Form::close(); ?>

        </div>
        <?php echo $__env->make('user.pages.result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('user.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>