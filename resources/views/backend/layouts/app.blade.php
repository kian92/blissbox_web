<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Blissbox Asia - @yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        <link rel="icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
        
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        @yield('inline-style')

    </head>
    <body class="@yield('body')">

        @include('backend.layouts.sidenav')
        
        <div id="app">
            @yield('content')        
        </div>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>
        @yield('inline-script')
        <script>
            $(".button-collapse").sideNav();
        </script>
    </body>
</html>
