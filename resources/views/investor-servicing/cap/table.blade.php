@extends('investor-servicing.cap.main-template')
@section('title', "Cap Table > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Cap Table Management</h5>
    </div>
    <div class="card-content">
        <h5>Real Time Investor Cap Table</h5>
        <p>Download a PDF or CSV file below.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <div class="card-title blue">
                                <h5>Ownership Allocation for Castle Stone</h5>
                            </div>
                            <div class="card-content">
                                <pie-chart></pie-chart>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="card">
                            <div class="card-title blue">
                                <h5>Investor Cap Table</h5>
                            </div>
                            <table class="rwd-table">
                                <tbody>
                                    <tr class="head-row">
                                        <th>Investor Name</th>
                                        <th>% Held</th>
                                        <th>Digital Securities Held</th>
                                        <th>Price Per</th>
                                        <th>Value</th>
                                    </tr>
                                    <tr>
                                        <td data-th="Investor Name">Carl Berg</td>
                                        <td data-th="% Held">45</td>
                                        <td data-th="Digital Securities Held">45,000,000</td>
                                        <td data-th="Price Per">$0.1</td>
                                        <td data-th="Value">$450,000</td>
                                    </tr>
                                    <tr>
                                        <td data-th="Investor Name">Carl Berg</td>
                                        <td data-th="% Held">45</td>
                                        <td data-th="Digital Securities Held">45,000,000</td>
                                        <td data-th="Price Per">$0.1</td>
                                        <td data-th="Value">$450,000</td>
                                    </tr>
                                    <tr>
                                        <td data-th="Investor Name">Carl Berg</td>
                                        <td data-th="% Held">45</td>
                                        <td data-th="Digital Securities Held">45,000,000</td>
                                        <td data-th="Price Per">$0.1</td>
                                        <td data-th="Value">$450,000</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="row margin-top-m">
                            <div class="col-xs-12 col-sm-6">
                                <div class="btn full-width">PDF</div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="btn full-width dust">CSV</div>
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
                            <div class="footer-button-next">
                                <div class="btn">Next</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jquery-js')
    <script src="/js/owl.carousel.min.js"></script>
@stop