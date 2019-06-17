@extends('layouts.app')

@section('content')
<div class="dashboard-content-wrap">
        <div class="row digital">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="left-nav">
                    <div class="card">
                        <div class="card-title black text-center">
                            <h5>Investor Servicing</h5>
                        </div>
                        <br/>
                        <div class="left-nav-item-wrap">
                            <div class="left-nav-item">
                                <p><a href="/investor-servicing/choose-investment"> Choose an <br/>investment</a></p>
                            </div>
                            <div class="left-nav-item active">
                                <p><a>Ownership Distribution &amp; <br/> Performance </a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a>Distributions</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a>Investor K-1s</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a>Reports</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-10">
                <div class="dashboard-menu-tile-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile"><img src="/img/icon-user-etting-blue.svg">
                                <h5><a href="/account-settings/verification">Account Settings</a></h5>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-paper-settings-active.svg">
                                <h5><a href="/investor-servicing/choose-investment">Investor Servicing</a></h5>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection