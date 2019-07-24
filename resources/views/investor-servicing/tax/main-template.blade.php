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
                        @if (isset($type) && isset($id))
                        <div class="left-nav-item-wrap">
                            <div class="left-nav-item">
                                <p><a href="/investor-servicing/choose-investment"> Choose an <br/>Investment</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="{{'/investor-servicing/cap-table-mgmt/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Cap Table <br/>Management </a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="{{'/investor-servicing/distributions/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Distributions</a></p>
                            </div>
                            <div class="left-nav-item active">
                                <p><a href="{{'/investor-servicing/tax-document/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Tax Documents</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="{{'/investor-servicing/reports/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Reports</a></p>
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-9 col-md-10">
                <div class="dashboard-menu-tile-container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3">
                        <a href="/account-settings/verification">
                            <div class="dashboard-menu-tile"><img src="/img/icon-user-etting-blue.svg">
                                <h5>Account Settings</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                        <a class="color-white" href="/properties/approved">
                            <div class="dashboard-menu-tile"><img src="/img/icon-building.svg">
                                <h5>My Properties</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                        <a href="/investor-servicing/choose-investment">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-paper-settings-active.svg">
                                <h5>Investor Servicing</h5>
                            </div>
                            </a>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                        <a href="/security-fund-flow/step-1/choose">
                            <div class="dashboard-menu-tile"><img src="/img/icon-security-blue.svg">
                                <h5>Create Digital Security</h5>
                            </div>
                        </a>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection