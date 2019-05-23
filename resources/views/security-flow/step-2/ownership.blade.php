@extends('security-flow.step-2.main-template')
@section('title', $title )

@section('body')
<form action="/security-flow/step-2/create/ownership" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Investment Details</h5>
    </div>
    <div class="card-content">
        <h5>Investment Ownership</h5>
        <p>Property & investment details, beyond basic info, are only viewable to Abstract Tokenization's KYC/AML identified investors.</p>
        <div class="card grey card-black margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <h5>Existing Investor Ownership</h5>
                            <p>Please upload your cap table; our preferred method of data transfer. However, if you have 3 or less investors on your cap table, you may enter their information mannually below. </p>
                            <uploads-component
                                title="Upload Cap Table"
                                action="/files"
                                elname="file"
                                scope="private"
                                path="/ownership/"
                                flat="true"
                                type="single-dust">
                            </uploads-component>

                            <div class="content-form">
                                <div class="row margin-bottom-l-md">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor First Name</p><input value="{{ isset($data['investor-first-name']) ? $data['investor-first-name'] : '' }}" name="investor-first-name" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Last Name</p><input name="investor-last-name" value="{{ isset($data['investor-last-name']) ? $data['investor-last-name'] : '' }}" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p><input type="text" value="{{ isset($data['ownership']) ? $data['ownership'] : '' }}" name="ownership">
                                    </div>
                                </div>
                                <div class="row margin-bottom-l-md">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor First Name</p><input value="{{ isset($data['investor-first-name-1']) ? $data['investor-first-name-1'] : '' }}" type="text" name="investor-first-name-1">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Last Name</p><input type="text" value="{{ isset($data['investor-last-name-1']) ? $data['investor-last-name-1'] : '' }}" name="investor-last-name-1">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p><input type="text" value="{{ isset($data['ownership-1']) ? $data['ownership-1'] : '' }}" name="ownership-1">
                                    </div>
                                </div>
                                <div class="row margin-bottom-l-sm">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor First Name</p><input type="text" value="{{ isset($data['investor-first-name-2']) ? $data['investor-first-name-2'] : '' }}" name="investor-first-name-2">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Last Name</p><input type="text" value="{{ isset($data['investor-last-name-2']) ? $data['investor-last-name-2'] : '' }}" name="investor-last-name-2">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p><input type="text" value="{{ isset($data['ownership-2']) ? $data['ownership-2'] : '' }}" name="ownership-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p class="no-margin-top">Pro forma NOI</p><input value="{{ isset($data['pro-frorma-noi']) ? $data['pro-frorma-noi'] : '' }}" name="pro-frorma-noi" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <p class="no-margin-top margin-top-s-md">Distribution frequency</p>
                                        <select name="distribution-frequency">
                                            <option value="{{ isset($data['distribution-frequency']) ? $data['distribution-frequency'] : '' }}" selected="selected">{{ isset($data['distribution-frequency']) ? $data['distribution-frequency'] : 'Select an option' }}</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p>Equity Raise Floor Amount</p><input type="text" name="equity-raise-floor-amount" value="{{ isset($data['equity-raise-floor-amount']) ? $data['equity-raise-floor-amount'] : '' }}">
                                        <p class="light">*Required Minimum of 25% of Total Capital Structure.</p>
                                    </div>
                                    <div class="col-xs-12 col-md-6">
                                        <p>Total Capital Required</p><input type="text" name="total-capital-required" value="{{ isset($data['total-capital-required']) ? $data['total-capital-required'] : '' }}">
                                        <p class="light">*Total amount of capital that needs to be raised incl. equity & debt.</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-6">
                                        <p>Equity Raise Hard Cap</p><input type="text" value="{{ isset($data['equity-raise-hard-cap']) ? $data['equity-raise-hard-cap'] : '' }}" name="equity-raise-hard-cap">
                                        <p class="light">*Maximum of 100%</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content-footer">
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