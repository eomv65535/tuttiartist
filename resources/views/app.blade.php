<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <title inertia>{{ config('app.name', 'Tuttiartist') }}</title>
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/line-awesome.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/line-awesome-font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/jquery.mCustomScrollbar.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('lib/slick/slick-theme.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <script src="{{ mix('/js/app.js') }}" defer></script>
    @routes
  </head>
  <body>
    @inertia
  </body>
    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/popper.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jquery.mCustomScrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('lib/slick/slick.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/scrollbar.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/script.js') }}"></script>
</html>