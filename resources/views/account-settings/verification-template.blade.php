@extends('layouts.app')

@section('content')
<div class="dashboard-content-wrap">
        <div class="row">
            <div class="col-xs-12 col-sm-3 col-md-2">
                <div class="left-nav">
                    <div class="card">
                        <div class="card-title black text-center">
                            <h5>Account Settings</h5>
                        </div>
                        <div class="left-nav-item-wrap">
                            <div class="left-nav-item active">
                                <p><a href="/account-settings/verification">Account Verification</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/account-settings/wallets">Digital Custodial Wallet</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/account-settings/privacy">Privacy & Data Storage Security</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/account-settings/password">Password & Two-Factor Authentication</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="/account-settings/export">Export Data</a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-10">
                <div class="dashboard-menu-tile-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-user-etting.svg">
                                <a class="color-white" href="/account-settings/verification"><h5>Account Settings</h5></a>
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
                            <div class="dashboard-menu-tile"><img src="/img/icon-secured.svg">
                                <a href="/security-flow/step-1/choose"><h5>Create Digital Security</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection