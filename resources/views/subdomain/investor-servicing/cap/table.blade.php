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
                                <h5>{{!empty($property_details) ? $property_details->opportunity_name : '' }}</h5>
                                <p class="color-white">
                                        @if (isset($type) &&  $type === 'property')
                                            Property (Digital Security)

                                        @elseif (isset($type) &&  $type === 'sproperty')
                                            Property
                                        @else
                                            Fund (Digital Security)
                                        @endif
                                </p>
                            </div>
                            @if ($type === 'fund')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="fund-digital-security"
                                            path="/digital-security/fund/photo-gallery/"
                                            section="security-fund-flow-files"
                                            index="0">
                                        </file-preview>
                                    @elseif ($type === 'property')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="digital-security"
                                            path="/digital-security/photo-gallery/"
                                            section="security-flow-files"
                                            index="0">
                                        </file-preview>
                                    @elseif ($type === 'sproperty')
                                        <file-preview
                                        iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="property-image"
                                            path="/property/images/"
                                            index="0"
                                            section="investor-servicing-files">
                                        </file-preview>
                                @endif
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="stats-container">
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card margin-top-m-sm">
                                        <div class="card-title blue">
                                            <h5>Percentage Ownership</h5>
                                        </div>
                                        <div class="card-content">
                                            <h4>{{ round( $investment_details->share * 100, 2 ) }}%</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="card grey margin-top-m">
                                        <div class="card-title blue">
                                            <h5>Performance Overview</h5>
                                        </div>
                                        <div class="card-content overview-card">
                                            <div class="row margin-bottom-m">
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding">
                                                        <p>Capital Contributed</p>
                                                        <h4>$5,500,000 <!-- {{ number_format( $investment_details->investment_amount ) }} --></h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-md">
                                                        <p>Cumulative Return</p>
                                                        <h4>4.9%</h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-lg">
                                                        <p>Current Annualized</p>
                                                        <h4>8.1%</h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-3">
                                                    <div class="card equal-padding margin-top-m-lg">
                                                        <p>Current Occupancy</p>
                                                        <h4>95%</h4>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-xs-12 col-md-6 col-lg-4">
                                                    <div class="card equal-padding">
                                                        <p>Investment Date</p>
                                                        <h4><!-- {{ $investment_details->contributed }} --> 11/30/2018</h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-4">
                                                    <div class="card equal-padding margin-top-m-md">
                                                        <p>Cash Flow To Date</p>
                                                        <h4>$133,700</h4>
                                                    </div>
                                                </div>
                                                <div class="col-xs-12 col-md-6 col-lg-4">
                                                    <div class="card equal-padding margin-top-m-lg">
                                                        <p>Current Cash Flow</p>
                                                        <h4>$23,000</h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12">
                                    <div class="card grey margin-top-m">
                                        <div class="card-title blue">
                                            <h5>Distributions Overview</h5>
                                        </div>
                                        <div class="card-content">
                                            <div>
                                                <bar-chart data="{{
                                                    json_encode(array('distributions'=>json_encode($distributions),
                                                        'investment'=>json_encode($investment_details)))
                                                }}" type="manual"></bar-chart>
                                            </div>
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
                            <a href="/investor-servicing/choose-investment" class="footer-button-back"><img src="/img/icon-arrow-back.svg">
                                <h5>Back</h5></a>
                            <div class="row center-xs">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                <div class="content-footer-step">
                                        <div class="row">
                                            <div class="col-xs">
                                                <div class="step-item"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
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
                                <a href="{{'/tax-documents/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}" class="btn color-white">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection