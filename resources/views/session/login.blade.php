@extends('layouts.session')
@section('title', 'Login')

@section('content')
<div class="container" id="login">
    <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2" id="login-pane">
            <div class="row">
                <img src="{{ $site->logo }}" id="logo">
            </div>
            <div class="row">
                <form>
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
                            <input type="submit" value="Login" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection