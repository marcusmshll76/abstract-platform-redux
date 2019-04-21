<!DOCTYPE html>
<html>
<head>
    <title>@yield('title') | {{ $site->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.rawgit.com/Chalarangelo/mini.css/v3.0.1/dist/mini-default.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Montserrat:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="/css/app.css">
</head>
<body>
    <header>
        <a href="/dashboard" class="logo"><img src="/img/abstract-logo-dark.png"></a>
        @if( !isset( $sections ) || $sections == true )
        <div class="pull-center">
            <a class="button">Investors</a>
            <a class="button active">Sponsors</a>
            <a class="button">Marketplace</a>
        </div>
        @endif
        <div class="pull-right">
            <a href="#" class="button alerts"><img src="/img/alerts.png"></a>

            <label for="drawer-control" class="drawer-toggle persistent">
                <img src="{{ $user->profile_image }}" id="profile-pic">
                <img src="/img/dropdown-arrow.png" id="dropdown">
            </label>
            <input type="checkbox" id="drawer-control" class="drawer persistent">
            <div>
                <label for="drawer-control" class="drawer-close"></label>
                <a href="#">Logout</a>
            </div>
        </div>
    </header>
    <div id="page-body">
        @yield('content')
    </div>
</body>
</html>