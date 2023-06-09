<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- ===============================================-->
    <!--    Document Title-->
    <!-- ===============================================-->
    <title>{{ config('app.name', 'E-Voting') }}</title>

    <!-- ===============================================-->
    <!--    Favicons-->
    <!-- ===============================================-->
    <meta name="msapplication-TileImage" content="{{ asset('images') .'/Logo SMAN5.png' }}">
    <meta name="theme-color" content="#ffffff">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('images') .'/Logo SMAN5.png' }}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('images') .'/Logo SMAN5.png' }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('images') .'/Logo SMAN5.png' }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('images') .'/Logo SMAN5.png' }}">
    <link rel="manifest" href="{{ asset('images') .'/Logo SMAN5.png' }}">
    <!-- ===============================================-->
    <!--    Stylesheets-->
    <!-- ===============================================-->
    <link href="{{ asset('user') }}/assets/css/theme.css" rel="stylesheet" />

    @yield('css')

</head>

<body>

    <!-- ===============================================-->
    <!--    Main Content-->
    <!-- ===============================================-->
    <main class="main" id="top">
        @include('layouts.user.navbar')

        @yield('content')

        @include('layouts.user.footer')

    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->

    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="{{ asset('user') }}/vendors/@popperjs/popper.min.js"></script>
    <script src="{{ asset('user') }}/vendors/bootstrap/bootstrap.min.js"></script>
    <script src="{{ asset('user') }}/vendors/is/is.min.js"></script>
    <script src="{{ asset('user') }}/assets/js/theme.js"></script>
    <script src="https://polyfill.io/v3/polyfill.min.js?features=window.scroll"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">

    @yield('js')

</body>

</html>
