@extends('security-fund-flow.step-1.main-template')
@section('title', $title )

@section('body')
<form action="/security-fund-flow/step-1/create/highlights" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5> Import Digital Security Details</h5>
    </div>
    <div class="card-content">
        <h5>Quick View Highlights</h5>
        <p>Enter the following data to give investors a quick view of pertinent deal highlights.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="card">
                        <div class="card-title dust">
                            <h5>Deal Highlights</h5>
                        </div>
                        <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Investor IRR</p><input type="text" name="target-investor-irr" value="{{ isset($data['target-investor-irr']) ? $data['target-investor-irr'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Investment Profile</p><input type="text" name="investment-profile" value="{{ isset($data['investment-profile']) ? $data['investment-profile'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Funds Due</p><input type="text" name="funds-due" value="{{ isset($data['funds-due']) ? $data['funds-due'] : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Equity Multiple</p><input type="text" name="target-equity-multiple" value="{{ isset($data['target-equity-multiple']) ? $data['target-equity-multiple'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Minimum Investment</p><input name="minimum-investment" type="text" value="{{ isset($data['minimum-investment']) ? $data['minimum-investment'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Distribution Period</p><input name="distribution-period" type="text" value="{{ isset($data['distribution-period']) ? $data['distribution-period'] : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Investment Period</p><input name="target-investment-period" type="text" value="{{ isset($data['target-investment-period']) ? $data['target-investment-period'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Property Type</p><input name="property-type" value="{{ isset($data['property-type']) ? $data['property-type'] : '' }}" type="text">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Sponsor Co-Investment</p><input name="sponsor-co-investment" value="{{ isset($data['sponsor-co-investment']) ? $data['sponsor-co-investment'] : '' }}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Avg Investor Cash Yield</p><input name="target-avg-investor-cash-yield" type="text" value="{{ isset($data['target-avg-investor-cash-yield']) ? $data['target-avg-investor-cash-yield'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Offers Due</p><input name="offers-due" type="text" value="{{ isset($data['offers-due']) ? $data['offers-due'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Distribution Commencement</p><input name="distribution-commencement" type="text" value="{{ isset($data['distribution-commencement']) ? $data['distribution-commencement'] : '' }}">
                                            </div>
                                        </div>
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
                                <div class="footer-button-next"><input type="submit" value="Next"></div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</form>
@endsection