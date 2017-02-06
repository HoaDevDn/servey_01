<!DOCTYPE HTML>
<html>
    <head>
        <title>{{ trans('home.get_survey') }}!</title>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{ Html::style(elixir('bower/bootstrap-tagsinput/dist/bootstrap-tagsinput.css')) }}
        {{ Html::style(elixir('/bower/bootstrap/dist/css/bootstrap.css')) }}
        {{ Html::style(elixir('/user/css/main.css')) }}
        {{ Html::style(elixir('/user/css/home.css')) }}
    </head>
    <body>
        <div class="popupBackground">
            <div class="popupCenter">
                <div class="popupInfo">
                    <span class="glyphicon glyphicon-remove close" ></span>
                    <div>
                        <div>
                            <span>{{ trans('temp.sendto') }}</span>
                            <input type="text" class="form-emails" name="emails" data-role="tagsinput">
                        </div>
                        <div class="div-send">
                            <input type="submit" value="Send" class="bt-send">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <input type="hidden" class="data" data-number="0" data-question="0"
            data-error="{{ trans('home.error') }}"
            data-confirm="{{ trans('temp.confirm') }}"/>
        <!-- Wrapper -->
        <div id="wrapper">
        <!-- Header -->
            <header id="header">
                <div class="inner">
                    <!-- Logo -->
                    <a href="" class="logo">
                        <span class="symbol">
                            {{ Html::image("demo/images/logo.png") }}
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


    </body>
</html>
