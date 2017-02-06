<!DOCTYPE html>
<!-- saved from url=(0031)http://www.ansonika.com/annova/ -->
<html lang="en" class=" js no-touch csstransforms csstransitions"><!--<![endif]-->
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Basic Page Needs -->

        <title>FSurvey</title>
        <meta name="description" content="">
        <meta name="author" content="Ansonika">
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <!-- Mobile Specific Metas -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo $__env->make('library.css-file', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <?php echo $__env->make('library.js-file', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

    </head>
    <body>
        <input type="hidden" class="data" data-number="0" data-question="0"
            data-error="<?php echo e(trans('home.error')); ?>"
            data-confirm="<?php echo e(trans('temp.confirm')); ?>"
            data-email-invalid="<?php echo e(trans('temp.email_invalid')); ?>"
            data-link="<?php echo e(action('SurveyController@autocomplete')); ?>"
        />
        <section id="top-area">
            <header>
                <div class="container">
                    <div class="row">
                        <div class="col-md-4 col-xs-3" id="logo">
                            <a>Planio Survey template</a>
                        </div>
                        <div class="btn-responsive-menu">
                            <span class="bar"></span>
                            <span class="bar"></span>
                            <span class="bar"></span>
                        </div>
                        <nav class="col-md-8 col-xs-9" id="top-nav">
                            <ul>
                                <li><a><span class="glyphicon glyphicon-log-in span-menu"></span> Login</a></li>
                                <li>
                                    <a href="">
                                        <span class="glyphicon glyphicon-registration-mark span-menu"></span>Register
                                        </a>
                                </li>
                           </ul>
                        </nav>
                    </div>
                 </div>
            </header>
            <div class="container animated slideInDown">
                 <div class="row">
                     <div class="col-md-12 main-title">
                        <h1>Satisfaction survey</h1>
                        <p>Help everyone to improve our service and customer satisfaction.</p>
                    </div>
                </div>
            </div>
        </section>
        <section class="container" id="main">
    <!-- Start Survey container -->
            <?php echo $__env->make('ui.pages.answer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
        <div class="divider"></div>
        <div class="row">
            <div class="col-md-12">
                <h2>Thank you for your time<span>This help us to improve our service and customer satisfaction.</span></h2>
            </div>
        </div><!-- end row -->

        <div class="row">

            <div class="col-md-4 col-sm-4 add_bottom_30 box">
                <p><img src="library/css/images/icon-1.png" alt="Icon"></p>
                <h3>Fully responsive</h3>
                <p>
                    Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                </p>
            </div>

            <div class="col-md-4 col-sm-4 add_bottom_30 box">
                <p><img src="library/css/images/icon-2.png" alt="Icon"></p>
                <h3>Useful survey data</h3>
                <p>
                    Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                </p>
            </div>

            <div class="col-md-4 col-sm-4 add_bottom_30 box">
                <p><img src="library/css/images/icon-3.png" alt="Icon"></p>
                <h3>Receive it by email</h3>
                <p>
                    Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt sensibus.
                </p>
            </div>

        </div><!-- end row -->
        </section>
        <div class="divider"></div>

        <div class="row">
            <div class="col-md-12">
                <h3>Some screenshots<span>This help us to improve our service and customer satisfaction.</span></h3>
            </div>
        </div><!-- end row -->

        <div class="row">
            <div class="col-md-10 col-md-offset-1">

                <div id="owl-demo">
                    <div class="item">
                        <a href="" class="fancybox">
                            <img src="/library/images/1.jpg" alt="Image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="fancybox">
                            <img src="/library/images/2.jpg" alt="Image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="fancybox">
                            <img src="/library/images/3.jpg" alt="Image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="fancybox" >
                            <img src="/library/images/4.jpg" alt="Image">
                        </a>
                    </div>
                    <div class="item">
                        <a href="" class="fancybox" >
                            <img src="/library/images/5.jpg" alt="Image">
                            </a>
                    </div>
                </div>

            </div><!-- end col-md-12 -->

        </div><!-- end row -->

        <?php echo $__env->make('ui.blocks.footer', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    </body>
</html>
