<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/dataTables.bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    @stack('scripts-head')
</head>
<body class="{{ Auth::check() ? 'body-admin' : ''}}">

    <div id="app" class="">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery.validate.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/additional-methods.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/dataTables.bootstrap.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/velocity.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/velocity.ui.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" charset="utf-8"></script>
    <script src="{{ asset('js/custom.js') }}" charset="utf-8"></script>
    @stack('scripts')
</body>
</html>
