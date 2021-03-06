@extends('layouts.app')
<style>
.disabled-menu{
    opacity: 0.2 !important;
}
</style>
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
                            <div class="left-nav-item active">
                                <p><a href="/investor-servicing/choose-investment"> Choose an <br/>Investment</a></p>
                            </div>
                            <div class="left-nav-item disabled-menu">
                                <p><a>Cap Table <br/>Management </a></p>
                            </div>
                            <div class="left-nav-item disabled-menu">
                                <p><a>Distributions</a></p>
                            </div>
                            <div class="left-nav-item disabled-menu">
                                <p><a>Tax Documents</a></p>
                            </div>
                            <div class="left-nav-item disabled-menu">
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
                        <a href="{{ $site -> host == 'abstract' || $site -> host == 'abstracttokenization' ? '/account-settings/verification' : '/account-settings/investor-info' }}"><div class="dashboard-menu-tile"><img src="/img/icon-user-etting-blue.svg">
                            <h5>Account Settings</h5>
                            </div></a>
                        </div>
                        @if ($site -> host == 'abstract' || $site -> host == 'abstracttokenization')
                            <div class="col-xs-12 col-sm-3">
                            <a class="color-white" href="/properties/approved">
                                <div class="dashboard-menu-tile"><img src="/img/icon-building.svg">
                                    <h5>My Properties</h5>
                                </div>
                            </a>
                            </div>
                        @endif
                        <div class="col-xs-12 col-sm-3">
                        <a href="/investor-servicing/choose-investment">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-paper-settings-active.svg">
                                <h5>
                                @if ($site -> host == 'abstract' || $site -> host == 'abstracttokenization') 
                                    Investor Servicing
                                @else
                                    Your Investments
                                @endif
                            </h5>
                            </div>
                        </a>
                        </div>
                        @if ($site -> host == 'abstract' || $site -> host == 'abstracttokenization')
                        <div class="col-xs-12 col-sm-3">
                        <a href="/security-fund-flow/step-1/choose">
                            <div class="dashboard-menu-tile"><img src="/img/icon-security-blue.svg">
                                <h5>Create Digital Security</h5>
                            </div>
                        </a>
                        </div>
                        @endif
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection