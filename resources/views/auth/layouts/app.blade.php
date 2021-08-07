<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{ asset("img/logo.png") }}">

    <title>BeSmart - Login</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    {{-- <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> --}}

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="row">
                        <div class="col-2">
                            <span id="icon-navbar">
                                <img src="{{ asset('img/logo.png') }}" width="45px" class="mt-2">
                            </span>
                        </div>
                        <div class="col-3 ml-1" id="title">
                            <p class="mb-0 title-web"><span id="title-name" class="font-weight-bold">B</span>e<span id="title-name" class="font-weight-bold">S</span>mart</p>
                            <p class="text-muted mini-title">Quiz Management System</p>
                        </div>
                    </div>
                </a>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
