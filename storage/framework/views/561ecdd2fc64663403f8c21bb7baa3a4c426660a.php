<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo e(action('Admin\DashboardController@index')); ?>">
                <?php echo e(trans('admin.dashboard')); ?>

            </a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                    </a>
                </li>
                <li class ="dropdown">
                   <a href="" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-search"></i>
                    </a>
                    <?php echo Form::open(['action' => 'Admin\UserController@search', 'method' => 'GET']); ?>

                    <ul class="dropdown-menu">
                        <li class="dropdown">
                            <?php echo Form::text('search', '', ['class' => 'form-control', 'placeholder' => trans('generate.search')]); ?>

                        </li>
                    </ul>
                    <?php echo Form::close(); ?>

                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li>
                   <a href="<?php echo e(action('Admin\UserController@show', [Auth::user()->id])); ?>">
                       <?php echo e(Auth::user()->name); ?>

                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <?php echo e(trans('generate.profile')); ?>

                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                           <a href="<?php echo e(action('Admin\UserController@show', [Auth::user()->id])); ?>">
                               <?php echo e(trans('generate.account')); ?>

                            </a>
                        </li>
                        <li><a href=""><?php echo e(trans('generate.create.survey')); ?></a></li>
                        <li>
                            <a href=""><?php echo e(trans('generate.invite')); ?></a>
                        </li>
                        <li><a href=""><?php echo e(trans('admin.go_home')); ?></a></li>
                        <li class="divider"></li>
                        <li>
                            <a href="<?php echo e(action('Auth\LoginController@logout')); ?>">
                                <?php echo e(trans('generate.logout')); ?>

                            </a>
                        </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
