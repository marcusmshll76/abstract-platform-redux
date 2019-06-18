@extends('investor-servicing.investor-K-1.main-template')
@section('title', "Tax Documents > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Tax Documents</h5>
    </div>
    <div class="card-content">
        <p>Upload Organization’s Prepared K-1, clarify the K-1s year, and then choose a date for our team to email this deal’s K-1 to ALL positions tied to the deal.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row middle-xs">
                        <reports-component></reports-component>
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