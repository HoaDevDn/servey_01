<div class="alert-message">
    <?php if(Session::get('message-success')): ?>
        <div class="alert alert-success">
            <span>
                <p>
                    <?php echo e(Session::get('message-success')); ?>

                </p>
            </span>
        </div>
    <?php elseif(Session::get('message-fail')): ?>
        <div class="alert alert-warning">
            <span>
                <p>
                    <?php echo e(Session::get('message-fail')); ?>

                </p>
            </span>
        </div>
    <?php endif; ?>
</div>
