<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
    <title>@yield('title', 'Laravel Distro PointSurf')</title>
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/kaiadmin.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<body>
   
    @include('partials.navbar')

    <div class="container mt-4 mb-5">
        @yield('content')
    </div>
</body>
</html>