@extends('layouts.app')
@section('title', 'Login')

@section('content')
<style>
        header {
            display: none !important
        }
    </style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 center">
                <div class="card-content-onboarding card">
                    <div class="onboarding-title">
                        <div class="onboarding-logo"><img src="/img/logo-light-w-type.svg"></div>
                    </div>
                    <div class="content-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>Email</p><input type="text" name="email">
                            </div>
                            <div class="col-xs-12">
                                <p>Password</p><input type="password" name="password">
                                <p>Your password needs at least 8 characters. </p>
                            </div>
                        </div>
                    </div>
                    <div class="signup-footer"><a href="#"><button class="large full-width white">Login</button></a>
                        <p><a href="#">Forgot Password? </a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection