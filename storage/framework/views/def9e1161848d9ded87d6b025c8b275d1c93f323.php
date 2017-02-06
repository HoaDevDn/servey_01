<div class="popupBackground">
    <div class="popupCenter">
        <div class="popupInfo animated bounceInDown">
            <?php echo Form::open(['class' => 'frm-submit-mail']); ?>

                <div>
                    <div>
                        <span class="popup-span">Email</span>
                        <div class="popup-input">
                            <?php echo Form::email('emailUser', '', [
                                (Auth::guard()->check() && Auth::user()->email) ?: '',
                                'placeholder' => trans('info.your_email'),
                                'class' => 'input-email form-control',
                            ]); ?>

                        </div>
                    </div>
                    <div>
                        <span class="popup-span"><?php echo e(trans('temp.send_to')); ?></span>
                        <div class="popup-input">
                            <?php echo Form::text('emailsUser', '', [
                                'placeholder' => trans('info.sender_email'),
                                'class' => 'frm-mail-user',
                                'data-role' => 'tagsinput',
                            ]); ?>

                        </div>
                    </div>
                    <div class="validate-send-email animated fadeInDown row">
                        <div class="col-md-10 col-md-offset-1">
                            <div class="alert alert-warning warning-login-register">
                                <?php echo e(trans('temp.email_invalid')); ?>

                            </div>
                        </div>
                    </div>
                    <div class="div-send row">
                        <div class="col-md-6">
                            <?php echo Form::submit(trans('temp.send'),  [
                                'class' => 'btn-send-mail',
                            ]); ?>

                        </div>
                        <div class="col-md-6">
                            <?php echo Form::button('Close',  [
                                'class' => 'btn-close-popup',
                            ]); ?>

                        </div>
                    </div>
                </div>
            <?php echo Form::close(); ?>

        </div>
    </div>
</div>
