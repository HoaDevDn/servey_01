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
                        <li><i class="icon-home"></i><?php echo e(trans('view.footer.contact.home')); ?></li>
                        <li><i class="icon-phone"></i><?php echo e(trans('view.footer.contact.phone')); ?></li>
                        <li><i class="icon-envelope"></i><?php echo e(trans('generate.email')); ?>

                            <a href=""><?php echo e(trans('view.footer.contact.email')); ?></a>
                        </li>
                        <li><i class="icon-skype"></i><?php echo e(trans('view.footer.contact.content')); ?></li>
                    </ul>
            </div>
            <div class="col-md-4">
                <h3>Latest tweet</h3>
                <div class="footer-info latest-tweets"
                  data-number="10" data-username="ansonika"
                  data-mode="fade" data-pager="false"
                  data-nextselector=".tweets-next"
                  data-prevselector=".tweets-prev"
                  data-adaptiveheight="true"
                >
                    <div class="bx-wrapper">
                        <div class="bx-viewport">
                            <ul class="tweet_list slider">
                                <li class="tweet_first tweet_odd">
                                    <span class="tweet_time">
                                        <a href="" title="view tweet on twitter">About 26 days ago</a>
                                    </span>
                                    <span class="tweet_join"></span>
                                    <span class="tweet_text">
                                        Check out 'QUOTE - Quotation or Survey Form Wizard' by
                                        <span class="at">@</span>
                                        <a href="">themeforest.net/item/volare-tr…</a>
                                    </span>
                                    All the best
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="footer_2">
        <div class="container">
        <div class="row">
            <div class="col-md-6">
                <ul id="footer-nav">
                    <li>Copyright© Ansonika </li>
                    <li><a href="">Terms of Use</a></li>
                    <li><a href="">Privacy</a></li>
                </ul>
            </div>
    </section>
</footer>
<div id="toTop"><?php echo e(trans('view.footer.back_to_top')); ?></div>

