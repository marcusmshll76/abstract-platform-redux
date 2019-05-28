@extends('investor-servicing.distributions.main-template')
@section('title', "Distributions > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Investor Cap Table</h5>
    </div>
    <div class="card-content">
        <p>Select a new Distribution Type, fill in the data inputs, then create and preview or hit send. Distributions will be sent to ALL positions tied to the deal.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 text-center">
                            <p class="no-margin">Select New Distribution Type</p>
                            <div class="distribution-icon-container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="square-icon"><img src="/img/icon-water-tap.svg"></div>
                                        <p>Allocate Waterfall</p>
                                    </div>
                                    <div class="col-xs-12">
                                        <div class="square-icon"><img src="/img/icon-globe.svg"></div>
                                        <p>Allocate Waterfall</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Description / Name</p><input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Date</p><input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Yield Period</p><input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Cash Flow Type</p><input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Total Amount</p><input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p>*This Distribution will be sent to 7 positions tied to the deal. </p>
                                    </div>
                                </div>
                                <div class="row margin-top-m">
                                    <div class="col-xs-12"><input type="submit" value="Create &amp; Preview"></div>
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
                                <div class="footer-button-next"><input type="submit" value="Next"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection