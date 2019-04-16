@extends('layouts.app')
@section('title', 'Welcome')

@section('content')
<div id="welcome-banner">
    <h1>Abstract Users</h1>
    <h2>Our Platform was built for Sponsors &amp; Investors alike.</h2>
    <h2>One user, one portal. #lessismore</h2>
</div>
<img src="/img/onboarding/info-banner.png" id="info-banner">
<form action="/welcome" method="post" id="onboard-info">
    @csrf
    <div id="select-user-type">
        <span class="label">I am a:</span>
        <label>
            <input type="radio" name="type" value="sponsor">
            <span>Sponsor</span>
        </label>
        <label>
            <input type="radio" name="type" value="investor">
            <span>Investor</span>
        </label>
        <label>
            <input type="radio" name="type" value="both">
            <span>Both</span>
        </label>
    </div>
    <input type="submit" value="Next" id="onboard-continue">
</form>
@endsection