@extends('investor-servicing.cap.main-template')
@section('title', "Cap Table > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Cap Table Management</h5></div>
    <div class="card-content">
        <h5>Real Time Investor Cap Table</h5>
        <p>Download a PDF or CSV file below, if your cap table has changed, please upload a new one and we will contact you as soon as it has been re-approved and updated in our system.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <div class="card-title blue">
                                <h5>Ownership Allocation for Castle Stone</h5></div>
                            <div class="card-content">
                                <!-- type="cap table" -->
                                <pie-chart type="empty" data="{{ isset($data) ? json_encode($data) : '' }}"></pie-chart>
                            </div>
                        </div>
                        <p>Has your cap table changed?</p>
                        <uploads-component
                                title="Upload New Captable"
                                action="/files"
                                elname="file"
                                scope="private"
                                path="/ownership/"
                                type="text">
                            </uploads-component>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="card">
                            <div class="card-title blue">
                                <h5>Investor Cap Table</h5></div>
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