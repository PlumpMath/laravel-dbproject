<!DOCTYPE html>
    <!--[if IE 7 ]>    <html class="no-js ie7"> <![endif]-->
    <!--[if (gt IE 7)|!(IE)]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <title>{{ $title }}</title>
        <meta name="description" content="">
        <meta name="HandheldFriendly" content="True">
        <meta name="MobileOptimized" content="320">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="cleartype" content="on">
        {{ HTML::style('css/main.css') }} 
        {{ HTML::script('js/vendor/modernizr-2.6.2.min.js') }}
    </head>
    <body>
        <div class="container">
            @yield('content')
        </div>

        {{ HTML::script('//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js') }}
        <script>window.jQuery || document.write('<script src=\'js/vendor/jquery-1.10.2.min.js\'><\/script>')</script>
        @yield('scripts');
    </body>
</html>
