<div class="option-top container">
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand">{{ trans('home.get_survey') }}</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="#">{{ trans('home.home') }}</a></li>
                <li>
                    {!! Form::open(['class' => 'navbar-form navbar-left']) !!}
                        <div class="input-group">
                            {!! Form::text('text-search', '',
                                ['class' => 'form-control search-form', 'placeholder' => trans('home.search') . '...' ]) !!}
                            <div class="input-group-btn">
                                {{ Form::button('<i class="glyphicon glyphicon-search"></i>', ['type' => 'submit', 'class' => 'btn btn-default']) }}
                            </div>
                        </div>
                    {!! Form::close() !!}
                </li>

            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ trans('home.notices') }}
                    </a>
                    <ul class="dropdown-menu drop-1">
                      <li><a href="#">Page 1-1(databse)</a></li>
                      <li><a href="#">Page 1-2(databse)</a></li>
                      <li><a href="#">Page 1-3(databse)</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ trans('home.setting') }}
                    </a>
                    <ul class="dropdown-menu drop-2">
                      <li><a href="#">{{ trans('home.update_info') }}</a></li>
                      <li><a href="#">Page 1-2(databse)</a></li>
                      <li><a href="#">Page 1-3(databse)</a></li>
                    </ul>
                </li>

                <li>
                    <a href="#">
                        <span class="glyphicon glyphicon-log-out"></span>
                        Logout
                    </a>
                </li>
            </ul>
        </div>
    </nav>
</div>
