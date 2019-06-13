@extends('investor-servicing-sub.reports.main-template')
@section('title', "Reports > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Reports</h5></div>
    <div class="card-content">
        <p class="no-margin-top">Specify a time period to Preview or Downlowd quarterly reports for this investment. Reporting includes: DST Financials, Operational Highlights, Property Financial Highlights, and Cash Distributions Summary. </p>
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
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                                <p>Select Year:</p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
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
                                    <div class="col-xs-12 col-sm-6">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                                <p>Select Quarter:</p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection