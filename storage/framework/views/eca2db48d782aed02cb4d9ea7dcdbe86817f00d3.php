<div class="divider"></div>
<footer>
    <section class="container">
        <div class="row">
            <div class="col-md-4">
                <h3><?php echo e(trans('view.footer.about.title')); ?></h3>
                <p><?php echo e(trans('view.footer.about.content')); ?></p>
            </div>
            <div class="col-md-4" id="contact">
                <h3><?php echo e(trans('view.footer.contact.title')); ?></h3>
                <ul>
                    <li><?php echo e(trans('view.footer.contact.content')); ?></li>
                    <li>
                        <i class="glyphicon glyphicon-home"></i>
                        <?php echo e(trans('view.footer.contact.home')); ?>

                    </li>
                    <li>
                        <i class="glyphicon glyphicon-earphone"></i>
                        <?php echo e(trans('view.footer.contact.telephone')); ?>:
                        <?php echo e(trans('view.footer.contact.phone')); ?>

                    </li>
                    <li>
                        <i class="glyphicon glyphicon-envelope"></i>
                        <?php echo e(trans('generate.email')); ?>:
                        <a><?php echo e(trans('view.footer.contact.email')); ?></a>
                    </li>
                </ul>
            </div>
            <div class="col-md-4">
                <h3><?php echo e(trans('view.footer.contact.more_info')); ?></h3>
                <p><?php echo e(trans('view.footer.contact.intro')); ?></p>
                <div class="list-more-info">
                    <div class="col-icon">
                        <a href="https://www.facebook.com/FramgiaVietnam/?fref=ts" class="icon-fb">
                            <i class="fa fa-facebook" ></i>
                        </a>
                    </div>
                    <div class="col-icon">
                        <a href="https://github.com/framgia" class="icon-git">
                            <i class="fa fa-github"></i>
                        </a>
                    </div>
                     <div class="col-icon">
                        <a href="https://www.linkedin.com/company/framgia-vietnam" class="icon-in">
                            <i class="fa fa-linkedin"></i>
                        </a>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </section>
    <section id="footer_2">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul id="footer-nav">
                    <li><?php echo e(trans('view.footer.copyright')); ?></li>
                    <li><?php echo e(trans('view.footer.reserved')); ?></li>
                </ul>
            </div>
    </section>
</footer>
<div id="toTop"><?php echo e(trans('view.footer.back_to_top')); ?></div>
