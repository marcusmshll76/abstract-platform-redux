@extends('layouts.app')

@section('content')
<div class="dashboard-content-wrap">
        <div class="row digital">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="left-nav">
                    <div class="card">
                        <div class="card-title black text-center">
                            <h5>Create Digital Security</h5>
                        </div>
                        <br/>
                        <div class="left-nav-item-wrap">
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-1/choose"> Import Security<br/> Details</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-2/ownership">Investment Details </a></p>
                            </div>
                            <div class="left-nav-item active">
                                <p><a href="/security-fund-flow/step-3/diligence">Diligence Documents</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-4/key-points">Key Deal Points</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-5/capital-stack">Capital Stack</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-6/meet-sponsors">Meet the Sponsors</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/security-fund-flow/step-7/preview">Preview & Submit</a></p>
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
                                <a href="/account-settings/verification"><h5>Account Settings</h5></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile"><img src="/img/icon-building.svg">
                                <a class="color-white" href="/properties/approved"><h5>My Properties</h5></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile"><img src="/img/icon-paper-settings.svg">
                                <a href="/investor-servicing/choose-investment"><h5>Investor Servicing</h5></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-security.svg">
                                <a href="/security-fund-flow/step-1/choose"><h5>Create Digital Security</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection