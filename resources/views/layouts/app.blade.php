<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>@yield('title')</title>

        <link rel="stylesheet" href="{{ asset('css/app.css') }}" />
        <style>
            @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100);
        </style>
    </head>
    <body>
        <div class="table-title"><h1>@yield('title')</h1></div>

        @yield('content')
    </body>
</html>
