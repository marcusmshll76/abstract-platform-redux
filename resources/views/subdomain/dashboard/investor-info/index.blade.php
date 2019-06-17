@extends('subdomain.dashboard.electronic-consent.main-template')
@section('title', "Investor Information > Investor Servicing")
<style>
.prop-new .content-footer{
    margin:50px 0;
}
</style>
@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Investor Information</h5></div>
    <div class="card-content">
        <form>
            <h5>Due Diligence</h5>
            <p>Should you choose to invest in a digital security, we have partnered with North Capaital for Investor Compliance and Due Diligence. Standard investor diligence will apply once you choose an opporutnity to invest. For now, let’s keep it simple.</p>
            <div class="content-form">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <p>First Name</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Last Name</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Email</p>
                        <input type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <p>Work Phone</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Mobile Phone</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Job Title</p>
                        <input type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <p>Address</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="row">
                            <div class="col-xs-12 col-sm-8">
                                <p>City</p>
                                <input type="text">
                            </div>
                            <div class="col-xs-12 col-sm-4">
                                <p>State</p>
                                <input type="text">
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Country</p>
                        <input type="text">
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <p>Address Line 2</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Post Code</p>
                        <input type="text">
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <p>Are you an Accredited Investor?</p>
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <p>Yes</p>
                                <input type="radio" name="accredited">
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <p>No</p>
                                <input type="radio" name="accredited">
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
        </form>
    </div>
</div>
@endsection

<!-- @todo Ben
upload  -->