@extends('layouts.session')
@section('title', 'Register')

@section('content')
<div class="container" id="login">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="login-pane">
            <div class="row">
                <img src="{{ $site->logo }}" id="logo">
            </div>
            <div class="row">
                <img src="/img/login/steps.png" id="steps">
            </div>
            <div class="row">
                <form method="post" action="/register">
                    @csrf
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-6">
                                <fieldset>
                                    <label for="first">First Name</label>
                                    <input type="text" name="first">
                                </fieldset>
                            </div>
                            <div class="col-sm-6">
                                <fieldset>
                                    <label for="first">Last Name</label>
                                    <input type="text" name="last">
                                </fieldset>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="row">
                            <fieldset>
                                <label for="email">Email</label>
                                <input type="email" name="email">
                            </fieldset>
                        </div>
                        <div class="row">
                            <fieldset>
                                <label for="password">Password</label>
                                <input type="password" name="password">
                            </fieldset>
                        </div>
                        <div class="row">
                            <input type="hidden" name="remember" value="true">
                            <input type="submit" value="Create Account!" />
                        </div>
                    </div>
                </form>
            </div>
            <div class="row">
                <p>Already have an account? <a href="/login">Login now</a>!</p>
            </div>
        </div>
    </div>
</div>
@endsection