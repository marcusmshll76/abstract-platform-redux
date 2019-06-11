@extends('layouts.app')
@section('title', 'Register')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 center">
                <div class="card-content-onboarding card">
                    <div class="onboarding-title">
                        <div class="onboarding-logo"><img src="/img/logo-light-w-type.svg"></div>
                    </div>
                    <div class="onboarding-steps">
                        <div class="row">
                            <div class="col-xs-3">
                                <p>Account</p><img src="/img/icon-check-orange.svg">
                            </div>
                            <div class="col-xs-3">
                                <p>User Dashboard</p><img src="/img/icon-check-white.svg">
                            </div>
                            <div class="col-xs-3">
                                <p>Create Digital Security</p><img src="/img/icon-check-white.svg">
                            </div>
                            <div class="col-xs-3">
                                <p>Invest</p><img src="/img/icon-check-white.svg">
                            </div>
                        </div>
                        <div class="divider"></div>
                    </div>
                    <form method="post" action="/register">
                    @csrf
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <p>First Name</p><input type="text" name="first">
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <p>Last Name</p><input type="text" name="last">
                                </div>
                                <div class="col-xs-12">
                                    <p>Email</p><input type="email" name="email">
                                </div>
                                <div class="col-xs-12">
                                    <p>Password</p><input type="password" name="password">
                                </div>
                                <div class="col-xs-12">
                                    <p>Confirm Password</p><input type="password" name="password_verify">
                                </div>
                            </div>
                        </div>
                        <div class="signup-footer">
                            <button class="large full-width white">Create Account!</button>
                            <p>Already have an account? <a href="/login">Login now</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
<style>
    header { display: none !important }
</style>