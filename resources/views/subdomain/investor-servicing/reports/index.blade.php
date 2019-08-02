@extends('subdomain.investor-servicing.reports.main-template')
@section('title', "Reports > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Reports</h5></div>
    <div class="card-content">
        <p class="no-margin-top">Choose an available quarterly Report to view in PDF or CSV format. The quarterly reports include: DST Financials, Operational Highlights, Property Financial Highlights, and Cash Distributions Summary. </p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row center-xs">
                    <div class="col-xs-12 col-sm-4">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                    <h5>{{!empty($data) ? $data->name : '' }}</h5>
                                    <p class="color-white">
                                        @if (isset($type) &&  $type === 'property')
                                            Property digital security

                                        @elseif (isset($type) &&  $type === 'sproperty')
                                            Property
                                        @else
                                            Fund digital security
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
                                            section="investor-servicing-files"
                                            index="0">
                                        </file-preview>
                                @endif    
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                    <div class="card">
                                            <div class="card-content">
                                                <div class="row">
                                                    <div class="col-xs-12 col-sm-6">
                                                        <div class="row">
                                                            <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 text-left"></div>
                                                        </div>
                                                        <p>Choose an Available Report:</p>
                                                    </div>
                                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-9">
                                                        <select class="no-margin-top">
                                                            <option value="" disabled="disabled" selected="selected">Select an option</option>
                                                            <option value="option">Q1'18</option>
                                                            <option value="option">Q2'18</option>
                                                            <option value="option">Q3'18</option>
                                                            <option value="option">04'18</option>
                                                            <option value="option">Q1'19</option>
                                                        </select>
                                                        <div class="row"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <div class="row margin-top-m">
                            <div class="col-xs-12 col-sm-6">
                                <a href="{{'/investor-servicing/reports/dt/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}" class="btn full-width margin-bottom-m-md color-white">View</a>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <a href="/28912SAIAS232/dst-report.pdf" class="btn full-width margin-bottom-m-md color-white" download>Download</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-footer">
                            <div class="footer-button-back">
                                <a href="{{'/tax-documents/'. $type. '/'.strtolower(str_random(30)). '/' .$id }}" class="footer-button-back">
                                <img src="/img/icon-arrow-back.svg"><h5>Back</h5></a>
                               </div>
                            <div class="row center-xs">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="content-footer-step">
                                        <div class="row">
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
                                                <div class="step-item active"></div>
                                            </div>
                                        </div>
                                        <div class="step-divider"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="footer-button-next">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection