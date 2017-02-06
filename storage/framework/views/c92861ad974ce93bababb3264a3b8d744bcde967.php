<div class="container-list-result">
    <div class="div-show-result wizard-branch wizard-wrapper">
        <div class="tab-bootstrap">
            <ul class="nav nav-tabs">
                <li class="active">
                    <a data-toggle="tab" href="#home">
                        <span class="glyphicon glyphicon-adjust"></span>
                        <?php echo e(trans('result.overview')); ?>

                    </a>
                </li>
                <li>
                    <a data-toggle="tab" href="#menu1">
                        <span class="glyphicon glyphicon-asterisk"></span>
                        <?php echo e(trans('result.see_detail')); ?>

                    </a>
                </li>
                <?php if($listUserAnswer): ?>
                    <li><a data-toggle="tab" href="#menu3">ListsUser</a></li>
                <?php endif; ?>
                <?php if($history): ?>
                    <li><a data-toggle="tab" href="#menu2"><?php echo e(trans('survey.history')); ?></a></li>
                <?php endif; ?>
            </ul>
            <?php echo $__env->make('user.component.tab-result', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        </div>
    </div>
    <div id="bottom-wizard bottom-wizard-anwser"></div>
</div>
