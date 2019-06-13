@extends('layouts.app')
@section('title', 'Login')

@section('content')
<form action="/login" method="post">
@csrf
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 center">
        @if ($site -> host == 'abstract')
            <div class="card-content-onboarding card">
                <div class="onboarding-title">
                    <div class="onboarding-logo"><img src="/img/logo-light-w-type.svg"></div>
                </div>
        @else
            <div class="card-content-onboarding card black">
                <div class="onboarding-title">
                    <div class="onboarding-logo"><img src="{{ $site -> logo }}"></div>
                </div>
        @endif
                <div class="content-form">
                    @if( isset( $error ) && $error )
                    <div class="row error">
                        <div class="col-xs-12">
                            <p>Your email address or password were incorrect!</p>
                        </div>
                    </div>
        @endif
                    <div class="row">
                        <div class="col-xs-12">
                            <p>Email</p><input type="text" name="email">
                        </div>
                        <div class="col-xs-12">
                            <p>Password</p><input type="password" name="password">
                        </div>
                    </div>
                </div>
                <div class="signup-footer"><button type="submit" class="large full-width white">Login</button></a>
                    <p><a href="/forget-password">Forgot Password? </a></p>
                </div>
                @if ($site -> host != 'abstract')
                    <div class="footer-logo"><img src="/img/logo-light.svg">
                        <p>Powered By Abstract</p>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
</form>
@endsection
<style>
    header { display: none !important }
</style>