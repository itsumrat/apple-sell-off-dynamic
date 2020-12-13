<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'ESHOP') }}</title>
    {{--  <link href="{{ asset('css/app.css') }}" rel="stylesheet">  --}}
    <link href="{{ asset('frontend/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/fontawesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/jquery.fancybox.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/css/style.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat" rel="stylesheet">
</head>
<body>
    <div id="app">
        <layouts></layouts>
    </div>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    {{--  <script src="{{ asset('frontend/js/jquery-3.4.1.min.js') }}"></script>  --}}
    <script src="{{ asset('frontend/js/popper.js') }}"></script>
    <script src="{{ asset('frontend/js/bootstrap.js') }}"></script>
    <script src="{{ asset('frontend/js/all.min.js') }}"></script>
    <script src="{{ asset('frontend/js/fontawesome.min.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.fancybox.pack.js') }}"></script>
    <script src="{{ asset('frontend/js/jquery.waypoints.min.js') }}"></script>
    <script src="{{ asset('frontend/js/script.js') }}"></script>

</body>
</html>
