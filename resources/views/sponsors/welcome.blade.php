@extends('layouts.app')
@section('title', "Welcome")

@section('content')
<div id="welcome-banner">
    <h1>Hello, <span class="name">{{ $user->first_name }}</span>! Be sure to complete your Dashboard account set-up so that we can approve your Sponsor &amp; Investor accounts.</h1> 
    <h2>We will let you know when your account has been approved within 1-2 days.</h2>
</div>
<div id="tour">
    <a href="#"><img src="/img/dashboard/sponsor-diligence.png"></a>
    <a href="#"><img src="/img/dashboard/invest-guide.png"></a>
    <a href="#"><img src="/img/dashboard/explore-marketplace.png"></a>
    <a href="/investor-servicing/k1"><img src="/img/dashboard/investor-servicing.png"></a>
</div>
<div id="overview">
    <img src="/img/dashboard/verify.png">
    <img src="/img/dashboard/opportunity.png">
</div>
@endsection