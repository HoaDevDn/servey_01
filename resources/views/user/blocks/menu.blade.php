<div class="option-top container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">{{ trans('home.get_survey') }}</a>
            </div>
            <ul class="nav navbar-nav">
                <li>
                    <a href="{{ action('User\SurveyController@createSurvey') }}">
                        {{ trans('home.home') }}
                    </a>
                </li>
                <li>
                    {!! Form::open(['class' => 'navbar-form navbar-left']) !!}
                        <div class="input-group">
                            {!! Form::text('text-search', '',
                                ['class' => 'form-control search-form fr', 'placeholder' => trans('home.search') . '...' ]) !!}
                            <div class="input-group-btn">
                                {{ Form::button('<i class="glyphicon glyphicon-search"></i>', ['type' => 'submit', 'class' => 'btn btn-default']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="{{ action('User\SurveyController@createSurvey') }}" >
                        <span class="glyphicon glyphicon-plus"></span>
                        {{ trans('home.create_survey') }}
                    </a>
                </li>
                <li class="drop-1 dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-gift"></span>
                        {{ trans('home.notices') }}
                    </a>
                    <ul class="drop-1 dropdown-menu">
                        <li><a href="#">{{ trans(home.pages) }}</a></li>

                    </ul>
                </li>
                <li class="drop-2 dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Auth::user()->name }}
                    </a>
                    <ul class="drop-2 dropdown-menu">
                        <li><a href="#">{{ trans('home.update_info') }}</a></li>
                    </ul>
                </li>

                <li>
                    <a href="{{ action('Auth\LoginController@logout') }}">
                        <span class="glyphicon glyphicon-log-out"></span>
                        {{ trans('home.logout') }}
                    </a>
                </li>

            </ul>
        </div>
    </nav>
</div>
