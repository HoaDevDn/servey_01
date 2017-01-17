<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Get Survey</title>
        {{ Html::style('user/font-awesome/css/font-awesome.min.css') }}
        {{ Html::style(elixir('css/app.css')) }}
        {{ Html::style('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css') }}
        {{ Html::script('https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js') }}
        {{ Html::script('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js') }}
        {{ Html::style('http://fonts.googleapis.com/css?family=Roboto:400,100,300,500') }}
        {{ Html::script(elixir('user/js/question.js')) }}
    </head>
    <body class="content-body">
        <input type="hidden" data-number="-1" idtoken="{{ csrf_token() }}" data-route="{!! url('/') !!}" class="url-token"/>
        <div class="work-here">
            <div class="content-top">
                @include('user.blocks.menu')
            </div>
            @yield('content')
        </div>
    </body>
</html>
