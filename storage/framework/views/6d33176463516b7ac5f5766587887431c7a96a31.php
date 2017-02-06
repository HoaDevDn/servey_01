<div class="step1 wizard-hidden step wizard-step current">
    <div class="row">
        <h3 class="label-header col-md-10 wizard-header">
            <?php echo e(trans('info.enter_info')); ?>

        </h3>
        <div class="col-md-6">
            <ul class="data-list">
                <li>
                    <div class="container-infor">
                        <?php echo Html::image(config('settings.image_system') . 'email1.png', ''); ?>

                        <?php echo Form::email('email', ((Auth::user()) ? Auth::user()->email : ''), [
                            'id' => 'email',
                            'class' => 'required form-control',
                            'placeholder' => trans('info.email'),
                            (Auth::guard()->check() && !empty(Auth::user()->email)) ? 'readonly' : '',
                        ]); ?>

                    </div>
                </li>
                <li>
                    <div class="container-infor">
                        <?php echo Html::image(config('settings.image_system') . 'title1.png', ''); ?>

                        <?php echo Form::text('title', '', [
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
                        <?php echo Html::image(config('settings.image_system') . 'name.png', ''); ?>

                        <?php echo Form::text('name', ((Auth::user()) ? Auth::user()->name : ''), [
                            'placeholder' => trans('info.name'),
                            'id' => 'name',
                            'class' => 'required form-control',
                            (Auth::guard()->check() && !empty(Auth::user()->email)) ? 'readonly' : '',
                        ]); ?>

                    </div>
                </li>
            </ul>
            <ul class="data-list">
                <li>
                    <div class="container-infor">
                        <?php echo Html::image(config('settings.image_system') . 'date.png', ''); ?>

                        <?php echo Form::text('deadline', '', [
                            'placeholder' =>  trans('info.duration'),
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
    <div class="row" style="display: none;">
        <div class="col-md-4 col-md-offset-4">
            <ul class="label-info-question data-list">
                <li>
                    <strong class="strong-question">
                        <?php echo e(trans('info.do_you_want')); ?>

                        <a>
                            <?php echo e(trans('info.public')); ?>

                        </a>
                        <?php echo e(trans('info.this_survey')); ?>?
                    </strong>
                    <div class="slideThree">

                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>
