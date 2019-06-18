@extends('subdomain.investor-servicing.tax.main-template')
@section('title', "Tax Documents > Investor Servicing")
<style>
.prop-new .content-footer{
    margin:50px 0;
}
</style>
@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Task Documents</h5></div>
    <div class="card-content">
        <p class="no-margin-top">Pick a year and choose between Preview or Download for your K1. Choose next to view other reports. </p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-4">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-1.jpg"></div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="card">
                            <div class="card-content">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                        <p>Select Year:</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                        <select class="no-margin-top">
                                            <option value="" disabled="disabled" selected="selected">Select an option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row margin-top-m">
                            <div class="col-xs-12 col-sm-6">
                                <div class="btn full-width margin-bottom-m-md">Preview</div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="btn dust full-width">Download</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-footer">
                            <div class="footer-button-back"><img src="/img/icon-arrow-back.svg">
                                <h5>Back</h5></div>
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
@endsection

<!-- @todo Ben
upload  -->