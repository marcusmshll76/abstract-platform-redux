@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/bio" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>About the Sponsor</h5>
        <p>Connect your Sponsor Bio now and this information can automaically be connected to the digital securities you create for Abstract’s Marketplace. Investors will look at your Sponsor Bio to learn more about your company’s history.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="file-upload-box"><img src="/img/icon-upload.svg">
                            <h5>Upload Company Logo </h5>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Company Name</p><input type="text" name="company_name">
                                </div>
                                <div class="col-xs-12">
                                    <p>Company Website</p><input type="text" name="company_website">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">First Name</p><input type="text" name="first_name">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Work Phone</p><input type="text" name="work_phone">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Company Address</p><input type="text" name="company_address">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Company Address</p><input type="text" name="company_address_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Last Name</p><input type="text" name="last_name">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Mobile Phone</p><input type="text" name="mobile">
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                    <p>City</p><input type="text" name="city">
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                    <p>State</p><input type="text" name="state">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>ZIP Code</p><input type="text" name="zip">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Email</p><input type="email" name="email">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Job Title</p><input type="text" name="job_title">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Sponsor EIN/TIN</p><input type="text" name="tin">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Country</p><input type="text" name="country">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
                                                <div class="step-item"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item"></div>
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
                                <input type="submit" value="Next">
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