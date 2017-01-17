<header>
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-3" id="logo">
                <a></a>
            </div>
            <div class="btn-responsive-menu">
                <span class="bar"></span>
                <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <nav class="col-md-8 col-xs-9" id="top-nav">
                <ul>
                    <?php if(!Auth::guard()->check()): ?>
                        <li>
                            <a href="<?php echo e(action('Auth\LoginController@getLogin')); ?>">
                                <span class="glyphicon glyphicon-log-in span-menu">
                                </span>
                                <?php echo e(trans('login.login')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(action('Auth\RegisterController@getRegister')); ?>">
                                <span class="glyphicon glyphicon-registration-mark span-menu">
                                </span>
                                <?php echo e(trans('login.register')); ?>

                            </a>
                        </li>
                    <?php else: ?>
                        <li>
                            <a href="<?php echo e(action('SurveyController@getHome')); ?>">
                                <span class="glyphicon glyphicon-home">
                                </span>
                                <?php echo e(trans('home.home')); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(action('SurveyController@listSurveyUser')); ?>">
                                <span class="glyphicon glyphicon-th">
                                </span>
                                <?php echo e(trans('home.list_survey')); ?>

                            </a>
                        </li>
                        <li>
                        <span>
                            <?php echo Html::image(Auth::user()->image, '', [
                                'class' => 'image-avatar',
                            ]); ?>

                         </span>
                            <a href="<?php echo e(action('User\UserController@show')); ?>">
                                <?php echo e(Auth::user()->getName()); ?>

                            </a>
                        </li>
                        <li>
                            <a href="<?php echo e(action('Auth\LoginController@logout')); ?>">
                                <span class="glyphicon glyphicon-log-out">
                                </span>
                                <?php echo e(trans('login.logout')); ?>

                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
        </div>
     </div>
            </header>
