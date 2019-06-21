@extends('investor-servicing.reports.main-template')
@section('title', "Reports > Investor Servicing")

@section('body')
<div class="card margin-top-m">
                    <div class="card-title blue">
                        <h5>Reports</h5></div>
                    <div class="card-content">
                        <div class="row middle-xs">
                            <div class="col-xs-12 col-md-6">
                                <div class="marketplace-card-image porperty-image">
                                    <div class="marketplace-card-image-description">
                                        <h5>{{!empty($data) ? $data->name : '' }}</h5>
                                        <p class="color-white">@if (isset($type) &&  $type === 'property')
                                            Property digital security

                                        @elseif (isset($type) &&  $type === 'sproperty')
                                            Property
                                        @else
                                            Fund digital security
                                        @endif</p>
                                    </div>
                                    @if ($type === 'fund')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="fund-digital-security"
                                            path="/digital-security/fund/photo-gallery/"
                                            index="0">
                                        </file-preview>
                                    @elseif ($type === 'property')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="digital-security"
                                            path="/digital-security/photo-gallery/"
                                            index="0">
                                        </file-preview>
                                    @elseif ($type === 'sproperty')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="property-image"
                                            path="/property/images/"
                                            index="0">
                                        </file-preview>
                                @endif
                            </div>
                            </div>
                            <div class="col-xs-12 col-md-6 text-center">
                                <h2>Investor Report</h2>
                                <p>Investor: {{ Auth::user()->first_name. ' ' .Auth::user()->last_name }}</p>
                                <p>{{ date('Y-m-d') }}</p>
                            </div>
                        </div>
                        <div class="card grey margin-top-m">
                            <div class="card-title blue">
                                <h5>DST Financial Report:</h5></div>
                            <div class="card-content">
                                <div class="table-grid">
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Rental Income</h3></div>
                                        <div class="col-xs-12 col-md-4 hide-sm">
                                            <h5>Current</h5></div>
                                        <div class="col-xs-12 col-md-4 hide-sm">
                                            <h5>YTD</h5></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Base Rent</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$166,061</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$485,615</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Aannual Rent</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$81,375</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$244,125</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Percentage Rent</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$609</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$2,025</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Rental Income</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$284,045</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$731,765</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Expenses</h3></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Interest Expense</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$137,898</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$400,350</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Real Estate Taxes</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$7,321</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$21,962</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Insurance</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$7,419</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$23,509</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Lender Reserves</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$3,883</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$11,649</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Signatory Trustee Fee</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$9,540</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$2,815</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Inndependent Trustee Fee</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$166,061</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$485,615</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Expenses</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Net Income beore Depreciation/Amrortization*</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                </div>
                                <p>*Depreciation must be calculated at the trustee level due to the nature of initial investments that may, oor may not, have utilized IRC Section 1031 to defer gaines on prior investment(s). Please consult your tax advisor for an estimate of this amount.</p>
                            </div>
                        </div>
                        <div class="card grey margin-top-m">
                            <div class="card-title blue">
                                <h5>Operational Highlights</h5></div>
                            <div class="card-content">
                                <div class="table-grid">
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Mortgage Information</h3></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Current Principal Balance</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$144,043</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Annual Interest Rate</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>4.71%</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Maturity Date</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>7/1/2028</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Reserve Balances</h3></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Tax Escrow</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$54,543</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Insurance Escrow</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$54,543</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Replacement Reserve Escrow</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$54,543</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Lender Reserves</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$355,654</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>DST Reserves</h3></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Trust Reserve</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$54,543</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total DST Reserves</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$355,654</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Reserves</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$355,654</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Occupancy Rate</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$96%</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card grey margin-top-m">
                            <div class="card-title blue">
                                <h5>Property Financial Highlights</h5></div>
                            <div class="card-content">
                                <div class="table-grid">
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Rental Income</h3></div>
                                        <div class="col-xs-12 col-md-4 hide-sm">
                                            <h5>Current</h5></div>
                                        <div class="col-xs-12 col-md-4 hide-sm">
                                            <h5>YTD</h5></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Rental Income</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$144,043</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$144,043</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Other Rental Income</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$590</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$590</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-m">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Rental Income</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs margin-bottom-s">
                                        <div class="col-xs-12 col-md-4">
                                            <h3>Operating Costs:</h3></div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Administrative</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$144,043</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$144,043</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Payroll</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$45,333</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$45,333</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Marketing</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$590</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$590</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Utilities</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Repairs & Maintenance</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$590</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$590</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Grounds</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Other Operating</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Licenses & Permits</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Property Management Fees</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>RE Taxes</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Insurance</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Capital Activity</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Total Operating Costs</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                    <div class="row middle-xs">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Net Operating Costs</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 current">
                                            <p>$345,234</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4 ytd">
                                            <p>$345,234</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card grey margin-top-m">
                            <div class="card-title blue">
                                <h5>Cash Distributions Summary</h5></div>
                            <div class="card-content">
                                <div class="table-grid">
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>1. Cumulative Cash Distributions</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$144,043</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>2. Cumulative Annualized Cash Distribution as a % of original investment</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>4.71%</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>3. Pre-Tax Cumulative Annualized Cash Distributions as a % of original investment</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>6%</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>4. Current Month Cash Distribution</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$64,646</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>5. Current Month Annualized Cash Distributions as a % of original investment</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>5%</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>Insurance Escrow</p>
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>$54,543</p>
                                        </div>
                                    </div>
                                    <div class="row margin-bottom-s">
                                        <div class="col-xs-12 col-md-8">
                                            <p>Pre-Tax Returns calculated using the highest Federal Marginal tax rate of 37% plus an 8% allowance for state and local tax</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="btn full-width margin-bottom-m-sm"><a href="/img/dst-report.pdf" style="color: #fff !important;" target="_blank">PDF</a></div>
                                                </div>
                                                <div class="col-xs-12 col-sm-6">
                                                    <div class="btn dust full-width">CSV</div>
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