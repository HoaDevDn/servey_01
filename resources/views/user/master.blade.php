<!DOCTYPE HTML>
<html>
    <head>
        <title>{{ trans('home.get_survey') }}!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::style(elixir('/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')) }}
        {{ Html::style(elixir('/bower/bootstrap/dist/css/bootstrap.css')) }}
        {{ Html::style(elixir('/user/css/main.css')) }}
        {{ Html::style(elixir('/user/css/home.css')) }}
        {{ Html::style(elixir('/bower/font-awesome/css/font-awesome.min.css')) }}
    </head>
    <body>
        <div class="popupBackground">
            <div class="popupCenter">
                <div class="popupInfo">
                    <span class="glyphicon glyphicon-remove close" ></span>
                    <div>
                        <div>
                            <span>{{ trans('temp.send_to') }}</span>
                            {!! Form::text('emails', '', [
                                'placeholder' => trans('temp.email_name'),
                                'class' => 'form-emails',
                                'data-role' => 'tagsinput',
                            ]) !!}
                        </div>
                        <div class="div-send">
                            {!! Form::submit(trans('temp.send'),  [
                                'data-url' => action('SurveyController@inviteUser'),
                                'data-redirect' => action('SurveyController@getHome'),
                                'class' => 'bt-send',
                            ]) !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="data" data-number="0" data-question="0"
            data-error="{{ trans('home.error') }}"
            data-confirm="{{ trans('temp.confirm') }}"
            data-email-invalid="{{ trans('temp.email_invalid') }}"
            data-link="{{ action('SurveyController@autocomplete') }}"
        />
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <!-- Logo -->
                    <a href="" class="logo">
                        <span class="symbol">
                            {{ Html::image("/user/images/logo.png") }}
                        </span>
                        <span class="title">{{ trans('home.survey') }}</span>
                    </a>
                    <!-- Nav -->
                    <nav>
                        <ul>
                            <li><a href="#menu">{{ trans('home.menu') }}</a></li>
                        </ul>
                    </nav>
                </div>
            </header>
        <!-- Menu -->
                @include('user.blocks.menu')
        <!-- Main -->
            <div id="main">
                @yield('content')
            </div>
        <!-- Footer -->
            <footer id="footer">
                @yield('content-bot')
            </footer>
        </div>
        <!-- Scripts -->
        {{ Html::script(elixir('/bower/highcharts/highcharts.js')) }}
        {{ Html::script(elixir('/bower/highcharts/highcharts-3d.js')) }}
        {{ Html::script(elixir('/bower/highcharts/js/modules/exporting.js')) }}
        {{ Html::script(elixir('/bower/autocomplete/dist/autocomplete.js')) }}
        {{ Html::script(elixir('/js/app.js')) }}
        {{ Html::script(elixir('/user/js/skel.min.js')) }}
        {{ Html::script(elixir('/user/js/jquery.min.js')) }}
        {{ Html::script(elixir('/user/js/util.js')) }}
        {{ Html::script(elixir('/user/js/main.js')) }}
        {{ Html::script(elixir('/user/js/question.js')) }}
        {{ Html::script(elixir('/user/js/component.js')) }}
        {{ Html::script(elixir('/bower/angularjs/angular.min.js')) }}
        {{ Html::script(elixir('/bower/typeahead.js/dist/typeahead.bundle.min.js')) }}
        {{ Html::script(elixir('/bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')) }}
        {{ Html::script(elixir('/admin/js/chart.js')) }}
        {{ Html::script(elixir('/bower/bootstrap3-typeahead/bootstrap3-typeahead.min.js')) }}
<!--         <script src="https://code.highcharts.com/highcharts.js"></script>
        <script src="https://code.highcharts.com/highcharts-3d.js"></script>
        <script src="https://code.highcharts.com/modules/exporting.js"></script> -->
    <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script> -->

    </body>
</html>
