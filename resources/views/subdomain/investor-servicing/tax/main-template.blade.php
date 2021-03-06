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
                                <p><a href="/investor-servicing/choose-investment"> Choose an <br/>Investment</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="{{'/ownership-snapshot/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Ownership Distribution &amp; <br/> Performance </a></p>
                            </div>
                            <div class="left-nav-item active">
                                <p><a href="{{'/tax-documents/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Tax Documents</a></p>
                            </div>
                            <div class="left-nav-item">
                                <p><a href="{{'/reports/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}">Reports</a></p>
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
                                <a href="{{ $site -> host === 'abstract' ? '/account-settings/verification' : '/account-settings/investor-info' }}"><h5>Account Settings</h5></a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-3">
                            <div class="dashboard-menu-tile active"><img src="/img/icon-paper-settings-active.svg">
                                <a href="/investor-servicing/choose-investment"><h5>Your Investments</h5></a>
                            </div>
                        </div>
                    </div>
                </div>
                @yield('body')
            </div>
        </div>
    </div>
@endsection