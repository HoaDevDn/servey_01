<nav class="navbar navbar-default navbar-fixed">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">{{ trans('admin.dashboard') }}</a>
        </div>
        <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-left">
                <li>
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-dashboard"></i>
                    </a>
                </li>
                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <i class="fa fa-globe"></i>
                            <b class="caret"></b>
                            <span class="notification">5</span>
                      </a>
                      <ul class="dropdown-menu">
                        <li><a href="#">{{ trans('generate.exampe') }}</a></li>
                        <li><a href="#">{{ trans('generate.exampe') }}</a></li>
                        <li><a href="#">{{ trans('generate.exampe') }}</a></li>
                        <li><a href="#">{{ trans('generate.exampe') }}</a></li>
                        <li><a href="#">{{ trans('generate.exampe') }}</a></li>
                      </ul>
                </li>
                <li>
                   <a href="">
                        <i class="fa fa-search"></i>
                    </a>

                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">

                <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            {{ Auth::user()->name }}
                            <b class="caret"></b>
                      </a>
                      <ul class="dropdown-menu">
                        <li>
                           <a href="{{ action('Admin\UserController@show', [Auth::user()->id]) }}">
                               {{ trans('generate.account') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ action('User\SurveyController@getHome') }}">
                                {{ trans('generate.home') }}
                            </a>
                        </li>
                        <li>
                            <a href="{{ action('User\MailController@index') }}">
                                {{ trans('generate.mail') }}
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{ action('Auth\LoginController@logout') }}">
                                {{ trans('generate.logout') }}
                            </a>
                        </li>
                      </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
