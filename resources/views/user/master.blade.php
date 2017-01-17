<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ trans('home.get_survey') }}</title>
        {{ Html::style('user/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style(elixir('css/app.css')) }}
        {{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
        {{ Html::style(elixir('/admin/css/bootstrap.min.css')) }}
    </head>
    <body class="content-body">
        <input type="hidden" data-number="0" idtoken="{{ csrf_token() }}" data-route="{!! url('/') !!}" class="url-token"/>

        <div class="work-here">
            <div class="content-top">
                @include('user.blocks.menu')
            </div>
            @yield('content')
        </div>
    </body>
        {{ Html::script(elixir('/js/app.js')) }}
        {{ Html::script(elixir('/admin/js/jquery.js')) }}
        {{ Html::script(elixir('/admin/js/bootstrap.min.js')) }}
        {{ Html::script(elixir('/user/js/question.js')) }}
</html>
