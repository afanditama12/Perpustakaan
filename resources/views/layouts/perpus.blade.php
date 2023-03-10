<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="@yield('description')">

    <title>{{ config('app.name')}} - @yield('title')</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}">
    <!-- Custom styles for this template -->
    <link href="{{ asset('vendor/css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendor/my-blog/css/blog.css') }}" rel="stylesheet">
    <!-- fontawesome free -->
    <script src="{{ asset('vendor/vendor/fontawesome-free/js/all.min.js') }}"></script>
    <!-- icon flag -->
    <link rel="stylesheet" href="{{ asset('vendor/flag-icon-css/css/flag-icon.min.css') }}">

    <style type="text/css">
        .divider{
            width: 100%;
            height: 1px;
            background: rgb(199, 199, 199);
            margin: 1rem 0;
        }
    </style>
    
</head>

<body class="d-flex flex-column min-vh-100">

    <!-- Navigation:start -->
    @include('layouts._perpus._navbar')
    <!-- Navigation:end -->

    <!-- Page Content -->
    <div class="container">
        <!-- content:start -->
        @yield('content')
        <!-- content:end -->
    </div>
    <!-- /.container -->

    <!-- Footer:start -->
    @include('layouts._perpus._footer')
    <!-- Footer:end -->

    <!-- jquery -->
    <script src="{{ asset('vendor/vendor/jquery/jquery.min.js') }}"></script>
    <!-- bootstrap -->
    <script src="{{ asset('vendor/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

</body>

</html>