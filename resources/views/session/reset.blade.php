@extends('layouts.app')
@section('title', 'Reset Password')

@section('content')
<form>
@csrf
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-12 col-sm-8 col-md-6 col-lg-5 center">
                <div class="card-content-onboarding card padding-bottom-m">
                    <div class="onboarding-title">
                        <div class="onboarding-logo"><img src="/img/logo-light-w-type.svg"></div>
                    </div>
                    <div class="content-form">
                        <div class="row">
                            <div class="col-xs-12">
                                <p>New password</p>
                                <input type="password" name="New Password">
                            </div>
                            <div class="col-xs-12">
                                <p>Confirm password</p>
                                <input type="password" name="New Password">
                            </div>
                        </div>
                        <a href="/onboarding/login">
                            <button class="large full-width margin-top-m white">Reset</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
@endsection
<style>
    header { display: none !important }
</style>