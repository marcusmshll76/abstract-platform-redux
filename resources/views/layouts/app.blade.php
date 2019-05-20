<!DOCTYPE html>
<html>

<head>
    <title>@yield('title') | {{ $site->name }}</title>
    <meta http-eqiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Content-Language" content="en-us">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1">
    <link rel="icon" type="image/png" href="/img/favicon.png">
    <link rel="stylesheet" href="/css/lib/bootstrap.css">
    <link rel="stylesheet" href="/css/lib/flexboxgrid.css">
    <link rel="stylesheet" href="/css/lib/jquery-ui.css">
    <link rel="stylesheet" href="/css/lib/cs-select.css">
    <link rel="stylesheet" href="/css/lib/owl.theme.css">
    <link rel="stylesheet" href="/css/lib/owl.carousel.css">
    <link rel="stylesheet" href="/css/index.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
    <script src="/js/custom.js"></script>
    <script src="/js/sectionscroll.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body>
    <div id="app">
        <header>
            <div class="container-fluid">
                <div class="navbar">
                    <div class="row middle-xs no-margin">
                        <div class="col-xs-12 col-sm-4">
                            <div class="nav-logo"><a href="/"><img src="/img/logo-dark-w-type.svg" class="logo"></a></div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="header-toggle text-center">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="header-toggle-item">
                                            <p>Investors</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="header-toggle-item active">
                                            <p>Sponsors</p>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <div class="header-toggle-item">
                                            <p>Marketplace</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-4">
                            <div class="nav-user-info">
                                <div class="user-setting">
                                    <div class="dropdown">
                                        <div data-toggle="dropdown" class="dropdown-toggle">
                                            <div class="user-image"><img src="/img/icon-user.svg"></div>
                                            <div class="user-setting-arrow"></div>
                                        </div>
                                        <ul class="dropdown-menu">
                                            <li><a href="/logout">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-item">
                                <div class="nav-notification"><img src="/img/icon-bell.svg"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="navbar-mobile">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="logo"><a href="/"><img src="/img/logo-dark-w-type.svg" class="logo"></a></div>
                            <div class="menu-button"><img src="/img/icon-menu-btn.svg"></div>
                            <ul class="nav-item">
                                <li><a href="#">Investor </a></li>
                                <li><a href="#">Sponsors</a></li>
                                <li><a href="#">Marketplace</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="/logout">Logout</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </header>
         @yield('content')
    </div>
    <script src="/js/app.js"></script>
</body>
</html>