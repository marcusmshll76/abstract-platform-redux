@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2" id="nav">
            <h1>Investor Servicing</h1>
            <ul>
                <li><a href="#">Choose an Investment</a></li>
                <li><a href="#">Cap Table Management</a></li>
                <li><a href="#">Distributions</a></li>
                <li class="current"><a href="#">Investor K-1s</a></li>
                <li><a href="#">Reports</a></li>
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12" id="pane-nav">
                    <img src="/img/nav/account-settings.png">
                    <img src="/img/nav/my-properties.png">
                    <img src="/img/nav/investor-servicing-selected.png">
                    <img src="/img/nav/create-digital-security.png">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="body-frame">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
@endsection