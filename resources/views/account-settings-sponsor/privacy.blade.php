@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/privacy" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Privacy & Data Storage Security</h5>
    </div>
    <div class="card-content">
        <h5>Electronic Consent & Appoint a Signee</h5>
        <p>We have partnered with PrimeTrust for institutional grade, qualified custody and digital securities storage. PrimeTrust is the leading cold storage solution provided by the trusted expert in digital custody.</p>
        
        @if( isset( $success ) && $success )
            <div class="success"><p><strong>Your changes have been saved!</strong></p></div>
        @endif

        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-7 col-md-6">
                        <h5>Electronic Document Delivery Consent</h5>
                        <div class="content-scroll">
                            <p>We have partnered with PrimeTrust for institutional grade, qualified custody and digital securities storage. PrimeTrust is the leading cold storage solution provided by the trusted expert in digital custody. We have partnered with PrimeTrust for institutional grade, qualified custody and digital securities storage. PrimeTrust is the leading cold storage solution provided by the trusted expert in digital custody. We have partnered with PrimeTrust for institutional grade, qualified custody and digital securities storage. PrimeTrust is the leading cold storage solution provided by the trusted expert in digital custody .We have partnered with PrimeTrust for institutional grade, qualified custody and digital securities storage. PrimeTrust is the leading cold storage solution provided by the trusted expert in digital custody.</p>
                        </div>
                        <div class="form-consent">
                            <div class="row">
                                <div class="col-xs-12"><input type="radio" name="edc" value="true"
                                    @if( $user->electronic_document_consent )
                                        checked
                                    @endif
                                    >
                                    <p>I consent to electronic delivery</p>
                                </div>
                                <div class="col-xs-12"><input type="radio" name="edc" value="false"
                                    @if( !$user->electronic_document_consent )
                                        checked
                                    @endif
                                >
                                    <p>I <strong>do not</strong> content to electronic delivery</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-5 col-md-offset-1 margin-top-m-md">
                        <h5>Appoint A Signee</h5>
                        <p>So we hear you can get to be pretty busy and important. We get it. Feel free to appoint an assignee to handle matters while you’re away. </p>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Signee First Name</p><input type="text" name="signee_first_name" value="{{ $user->signee_first_name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Signee Last Name</p><input type="text"  name="signee_last_name" value="{{ $user->signee_last_name }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Signee Email Address</p><input type="email" name="signee_email" value="{{ $user->signee_email }}">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" value="Save" />
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection