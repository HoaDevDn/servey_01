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
                        <?php echo e(Form::radio('radio-set', config('temp.radio.label_info'), '', [
                            'id' => 'tab-1',
                            'class' => 'tab-choose tab-selector-1',
                            'checked' => 'checked',
                        ])); ?>

                        <?php echo e(Form::label('tab-1', trans('survey.information'), [
                            'class' => 'label tab-label-1',
                        ])); ?>

                        <?php echo e(Form::radio('radio-set', config('temp.radio.label_setting'), '', [
                            'id' => 'tab-2',
                            'class' => 'tab-choose tab-selector-2',
                        ])); ?>

                        <?php echo e(Form::label('tab-2', trans('survey.setting'), [
                            'class' => 'label tab-label-2',
                        ])); ?>

                        <?php echo e(Form::radio('radio-set', config('temp.radio.label_result'), '', [
                            'id' => 'tab-3',
                            'class' => 'tab-choose tab-selector-3',
                        ])); ?>

                        <?php echo e(Form::label('tab-3', trans('survey.result'), [
                            'class' => 'label tab-label-3',
                        ])); ?>

                        <?php echo e(Form::radio('radio-set', config('temp.radio.label_detail_result'), '', [
                            'id' => 'tab-4',
                            'class' => 'tab-choose tab-selector-4',
                        ])); ?>

                        <?php echo e(Form::label('tab-4', trans('survey.specific_result'), [
                            'class' => 'label tab-label-4',
                        ])); ?>

                        <div class="clear-shadow"></div>
                        <div class="content">
                            <div class="content-1">
                                <?php echo $__env->make('user.component.tab-info', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div class="content-2 div-hidden">
                                <?php echo $__env->make('user.component.tab-setting', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                            </div>
                            <div class="content-3 div-hidden">
                                 <div class="div-result-survey">
                                    <div class="div-table-list" style="">
                                        <div class="row">
                                            <div class="first-col-result col-md-3">
                                                <ul class="nav nav-tabs tabs-left sideways">
                                                    <li class=" active">
                                                        <a href="#home-v" data-toggle="tab" style="">
                                                            <span class="glyphicon glyphicon-adjust"></span>
                                                            <?php echo e(trans('survey.overview')); ?>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#profile-v" data-toggle="tab">
                                                            <span class="glyphicon glyphicon-asterisk"></span>
                                                            <?php echo e(trans('survey.see_detail')); ?>

                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="#messages-v" data-toggle="tab">
                                                            <span class="glyphicon glyphicon-export"></span>
                                                            Export to exel
                                                        </a>
                                                    </li>
                                                    <li><a href="#settings-v" data-toggle="tab">Settings</a></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-9">
                                                <?php echo $__env->make('user.component.tab-result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="content-4 div-hidden">
                                <p></p>
                                <p></p>
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