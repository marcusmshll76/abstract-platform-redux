@extends('investor-servicing.reports.main-template')
@section('title', "Reports > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Reports</h5></div>
    <div class="card-content">
        <p>First, define report period’s month or quarter, define its’ year, then hit Submit. Quarterly reports will available to view in your Investor Servicing portal witin 48 hours.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row middle-xs">
                        <div class="col-xs-12 col-md-6 margin-bottom-m-md">
                            <div class="card equal-padding margin-bottom-m">
                                <div class="row middle-xs">
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="row middle-xs">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                                <p class="no-margin">Month:</p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                                <input type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-sm-2 text-center">
                                        <p class="no-margin">or</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-5">
                                        <div class="row middle-xs">
                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                                <p class="no-margin">Quarter:</p>
                                            </div>
                                            <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                                <input style="margin-left:5px;" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card equal-padding margin-bottom-m">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                        <p>Report Year:</p>
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
                            <div class="content-form">
                                <p>Choose an Available Tax Document:</p>
                                <select>
                                    <option value="" disabled="disabled" selected="selected">Select an option</option>
                                    <option value="option">option</option>
                                    <option value="option">option</option>
                                    <option value="option">option</option>
                                    <option value="option">option</option>
                                </select>
                            </div>
                            <div class="row margin-top-m">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="btn full-width margin-bottom-m-sm">PDF</div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="btn dust full-width">CSV</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row center-xs">
                                <div class="col-xs-12 col-md-8">
                                    <div class="file-upload-box margin-bottom-m"><img src="/img/icon-upload.svg">
                                        <h5>Upload Investor Report</h5></div>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
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
                                    <input type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection