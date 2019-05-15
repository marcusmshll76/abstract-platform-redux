@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/diligence/create" method="post">
@csrf

<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>Sponsor Diligence with Ease</h5>
        <p>Abstract ensures that our marketplace consists only of institutional grade, high quality properties, funds and Sponsors. Providing the following diligence will help us quickly qualify you. We’re powered by Box.com to ensure top level security and a succinct diligence hand off between our team and yours. Simply drag and drop the speciific DD files into their individual folders below.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="card">
                            <div class="card-title">
                                <div class="breadcome">
                                    <p>All Files<img src="/img/icon-arrow-right.svg">Cephasa Partneres Sponsor Diligence </p>
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
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                        </div>
                                        <div class="step-divider"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-button-next">
                                <input class="btn" type="submit" value="Finish">
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