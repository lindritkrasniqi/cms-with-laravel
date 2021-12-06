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
    <link href="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.0/dist/css/coreui.min.css" rel="stylesheet"
        crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


</head>

<body>

    @auth
        @include('navbars.sidebar')

        <div class="wrapper d-flex flex-column min-vh-100 bg-light w-auto" style="padding-left: 4rem;">
            @include('navbars.header')

            <div class="body flex-grow-1 px-3">
                <div class="container-lg">
                    @yield('content')
                </div>
            </div>

            <footer class="footer">
                <div class="ms-auto">
                    Powered by&nbsp;<a href="https://coreui.io/bootstrap/ui-components/">CoreUI UI Components</a>
                </div>
            </footer>
        </div>
    @else
        @yield('content')
    @endauth

    <script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.1.0/dist/js/coreui.bundle.min.js" crossorigin="anonymous">
    </script>
</body>

</html>
