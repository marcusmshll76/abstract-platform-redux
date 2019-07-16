@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>Meet The Principles, Property Owners, and Fund Managers</h5>
        <p>Connect any Principles or Partners to your organization.  These will be shared to investors interested in your deals on Abstract’s Marketplace. </p>
        <principal-form
            back="/account-settings/verification/bio"
            next="yes"
            url="/principles/create" 
            data="{{ isset($data['principles']) ? $data['principles'] : '' }}"
            user="{{ Auth::id() }}"
            type="account settings"
            map="account-verification-files">
        </principal-form>
    </div>
</div>
</form>
@endsection