@extends('layouts.app')
@section('title', "Welcome")

@section('content')
    <div class="page-title-row">
        <div class="row center-xs text-center">
            <div class="col-xs-12 col-sm-8">
                <h2>Our Services</h2>
                <p>Start simple and explore our automated Investor Servicing or lead the way for CRE 2.0 by creating your first Digital Security with our Primary Issuance Platform.</p>
            </div>
        </div>
    </div>
    <div class="dashboard-content-wrap">
        <div class="row center-xs">
            <div class="col-xs-12 col-sm-8">
                <div class="welcome-box-container">
                    <div class="row text-center center-xs">
                        <div class="col-xs-12 col-md-4">
                            <div class="welcome-box-item">
                                <div class="card">
                                    <div class="wb-item-wrap">
                                        <div class="wb-item-title">
                                            <h3>Investor Servicing</h3></div>
                                        <div class="wb-item-icon"><img src="/img/icon-puzzle.svg"></div>
                                        <div class="wb-item-content">
                                            <p>Discover automation at it’s finest. Save time, save money, leave the office early.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="welcome-box-button">
                                <a href="/investor-servicing/choose-investment" class="btn full-width color-white">Go to Investor Servicing</a>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-4">
                            <div class="welcome-box-item">
                                <div class="card">
                                    <div class="wb-item-wrap">
                                        <div class="wb-item-title">
                                            <h3>Create Digital Security</h3></div>
                                        <div class="wb-item-icon"><img src="/img/icon-security.svg"></div>
                                        <div class="wb-item-content">
                                            <p>Digitize a specific CRE Project or Fund once your account is approved.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="welcome-box-button">
                            <a href="/account-settings/verification" class="btn full-width color-white">
                                Go To Account Set Up </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection