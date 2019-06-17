@extends('investor-servicing.distributions.main-template')
@section('title', "Distributions > Investor Servicing")
<style>.pad-bottom-open {padding-bottom: 40px;}</style>

@section('body')
@if( isset( $success ) && $success )
<popup-component
    title="Please Wait While We Update Your Distributions "
    type="recurring"
    user="{{ $userid }}"
    info="<h5>You will be able to view this document in excel or CSV form shortly.  Within 48 hours we will post the distributions via PDF to  your Investors Servicing Portal for their viewing. </h5>"
    action="Got It!"
    url="custom url cap table">
</popup-component>
@endif
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Distributions</h5></div>
    <div class="card-content">
        <p> Fill in the Pro Rata data inputs, then create and preview to download a esv file immediately. Abstract will alert you within 48 hours when distributions report will be uploaded to the investor servicing portal, ready to view and/or send to all positions tied to the deal.</p>
        <div class="card grey pad-bottom-open margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 text-center">
                            <div class="distribution-icon-container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="square-icon"><img src="/img/icon-globe.svg"></div>
                                        <p>Allocate Pro Rata</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Description / Name</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Date</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Yield Period</p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Cash Flow Type</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Total Amount</p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content-footer">
                                <div class="row center-xs margin-top-m">
                                    <input type="submit" value="Submit">
                                </div>
                                <br/>
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
            <br/><br/><br/>
        </div>
    </div>
</div>
@endsection
<!-- @todo Ben 
/dashboard/investor-servicing/distributions-v2-view-CSV/
-->