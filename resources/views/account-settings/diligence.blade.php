@extends('account-settings.verification-template')
@section('title', $title )
<style>
.mrg-right{
    margin-right: 10px;
}
</style>
@section('body')
@if( isset( $saved ) && $saved )
<popup-component
    title="Save and Come Back"
    type="recurring"
    user="{{ $userid }}"
    info="<h5>If you need more time, all your information will be saved until you preview and submit your account registration. Please note, you cannot begin to create a digital security until your Account Settings/Sponsor Due Diligence has been completed and reviewed by our team. This process takes no more than 48 hours upon full submission.</h5>"
    action="Got It!">
</popup-component>
@endif

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
                                    <p>All Files<img src="/img/icon-arrow-right.svg"> Diligence Documents </p>
                                </div>
                            </div>
                            <div class="card-content">
                            <box-component struc="account-settings"></box-component>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row center-xs margin-top-m">
            <a class="btn dark-btn mrg-right">Save For Now</a>
            <input class="btn" type="submit" value="Preview Sponsor Diligence">
        </div>
    </div>
</div>

</form>
@endsection

<!-- @todo Ben -->