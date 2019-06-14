@extends('subdomain.investor-servicing.cap.main-template')
@section('title', "Cap Table > Investor Servicing")

@section('body')

<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Ownership Distribution & Performance</h5></div>
    <div class="card-content">
        <p>Below is a quick overview of Ownership Details, distribution and performance. Choose next to view other reports.</p>
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
                        <div class="stats-container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card margin-top-m-sm">
                                        <div class="card-title blue">
                                            <h5>Percentage OwnerShip</h5></div>
                                        <div class="card-content">
                                            <h4>1.22%</h4></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card grey margin-top-m">
                                        <div class="card-title blue">
                                            <h5>Performance Overview</h5></div>
                                        <div class="card-content">
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding">
                                                        <p>Capital Contributed</p>
                                                        <h4>$1,000,000</h4></div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-md">
                                                        <p>Cash Flow to Date </p>
                                                        <h4>$136,554</h4></div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-lg">
                                                        <p>Capital Contributed</p>
                                                        <h4>$1,000,000</h4></div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-lg">
                                                        <p>Cash Flow to Date </p>
                                                        <h4>$136,554</h4></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card grey margin-top-m">
                                        <div class="card-title blue">
                                            <h5>Distributions Overview</h5></div>
                                        <div class="card-content">
                                            <div class="distributions-chart"></div>
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