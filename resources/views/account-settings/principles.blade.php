@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/principles/create" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>Meet The Principles, Property Owners, and Fund Managers</h5>
        <p>Connect any Principles or Partners to your organization.  These will be shared to investors interested in your deals on Abstract’s Marketplace. </p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row middle-xs">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <div class="file-upload-box">
                            <h5>Upload Company Logo </h5>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Company Name</p>
                                    <input type="text" value="{{ isset($data['principle_company_name']) ? $data['principle_company_name'] : '' }}" name="principle_company_name">
                                </div>
                                <div class="col-xs-12">
                                    <p>Company Website</p>
                                    <input type="text" value="{{ isset($data['principle_company_website']) ? $data['principle_company_website'] : '' }}" name="principle_company_website">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-7 col-md-offset-1">
                        <p class="no-margin-top">Principle Bio</p>
                        <textarea name="principle_website">{{ isset($data['principle_website']) ? $data['principle_website'] : '' }}</textarea>
                        <div class="btn margin-top-m small">+ Principal</div>
                    </div>
                    <div class="col-xs-12 col-sm-1 margin-top-m-sm"><img src="/img/icon-large-arrow-right.svg"></div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-footer">
                            <div class="row center-xs">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="content-footer-step">
                                        <div class="row">
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item"></div>
                                            </div>
                                        </div>
                                        <div class="step-divider"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-button-next">
                                <input type="submit" value="Next" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection