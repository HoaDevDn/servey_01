<div class="tab-content">
    <div id="home" class="tab-pane fade in ">
        <?php echo $__env->make('user.result.chart', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <div id="menu1" class="tab-pane fade in active">
        <?php echo $__env->make('user.result.over-view', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </div>
    <?php if($listUserAnswer): ?>
        <div id="menu3" class="tab-pane fade in">
            <?php echo $__env->make('user.result.users-answer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php endif; ?>
    <?php if($history): ?>
        <div id="menu2" class="tab-pane fade in">
            <?php echo $__env->make('user.result.history', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    <?php endif; ?>
</div>
