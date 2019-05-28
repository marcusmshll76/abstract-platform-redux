@extends('investor-servicing.investor-K-1.main-template')
@section('title', "Investor K-1s > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Investor K-1s</h5>
    </div>
    <div class="card-content">
        <p>Upload Organization’s Prepared K-1, clarify the K-1s year, and then choose a date for our team to email this deal’s K-1 to ALL positions tied to the deal.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row middle-xs">
                        <div class="col-xs-12 col-md-6 text-center margin-bottom-m-md">
                            <div class="row center-xs">
                                <div class="col-xs-12 col-md-8">
                                    <div class="file-upload-box margin-bottom-m"><img src="/img/icon-upload.svg">
                                        <h5>Upload organizations K-1</h5>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left">
                                            <p>K-1 Year:</p>
                                        </div>
                                        <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9"><select class="no-margin-top">
                                                <option value="" disabled="disabled" selected="selected">Select an option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                            </select></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row center-xs">
                                <div class="col-xs-12 col-md-8">
                                    <p class="no-margin-top">You can choose a date at least 2 days after you upload your K-1. Abstract will email this deal’s K-1 to ALL posiitions tied to the deal.</p><input type="text" id="datepicker">
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
                                    <div class="footer-button-next"><input type="submit" value="Save"></div>
                                </div>
                            </div>
                        </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection