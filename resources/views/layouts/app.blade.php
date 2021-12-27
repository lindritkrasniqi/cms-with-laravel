<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <div id="app">
        @include('navbars.sidebar')

        <div class="wrapper d-flex flex-column min-vh-100 bg-light">
            @include('navbars.header')

            <div class="body flex-grow-1 px-3">
                <div class="container-fluid">
                    @yield('content')
                </div>
            </div>

            <footer class="footer mt-4">
                <div class="ms-auto">
                    Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components</a>
                </div>
            </footer>
        </div>
    </div>

    <x-notification.toast></x-notification.toast>
</body>

</html>
