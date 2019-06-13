@extends('investor-servicing.property.main-template')
@section('title', "Upload New Property > Investor Servicing")
<style>
.prop-new .content-footer{
    margin:50px 0;
}
</style>
@section('body')
@if( isset( $success ) && $success )
<popup-component
    title="Upload Complete"
    type="recurring" 
    user="{{ $userid }}"
    info="<h5>Thank you, your property has been uploaded. </h5><p>Please allow 48 hours for our team to review and approve. Once approved, you will receive an email with instructions on how to easily invite your investors to join and view performance reports on Abstract’s Investor Servicing portal.</p>"
    action="Got It!"
    url="custom url cap table">
</popup-component>
@endif
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>New Upload</h5></div>
    <div class="card-content">
        <form>
            <div class="row margin-bottom-m padding-bottom-m border-bottom">
                <div class="col-xs-12">
                    <h5>Property Details:</h5>
                    <p>Fill in the below property details and upload one photo of the property.</p>
                    <div class="row margin-top-m">
                        <div class="col-xs-12 col-sm-4">
                            <uploads-component
                                title="Upload Property Photo"
                                action="/files"
                                elname="image"
                                scope="private"
                                path="/property/"
                                type="single">
                            </uploads-component>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="no-margin-top">Property / Opportunity Name</p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <p>Property Address</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <p>City</p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p>State</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>ZipCode</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Country</p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-m padding-bottom-m border-bottom">
                <div class="col-xs-12">
                    <h5>Cap Table:</h5>
                    <p>Fill in the below property details and upload one photo of the property.</p>
                    <div class="row margin-top-m">
                        <div class="col-xs-12 col-sm-4">
                            <uploads-component
                                title="Upload CapTable"
                                action="/files"
                                elname="image"
                                scope="private"
                                path="/ownership/"
                                type="single">
                            </uploads-component>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <p class="no-margin-top">Investor Full Name </p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p class="no-margin-top">Entity Name If Applicable</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p class="no-margin-top">% Ownership</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p class="no-margin-top">Investment Date</p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <p>Investor Full Name </p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>Entity Name If Applicable</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>% Ownership</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>Investment Date</p>
                                        <input type="text">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-md-3">
                                        <p>Investor Full Name </p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>Entity Name If Applicable</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>% Ownership</p>
                                        <input type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-3">
                                        <p>Investment Date</p>
                                        <input type="text">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-m padding-bottom-m border-bottom middle-xs">
                <div class="col-xs-12 col-sm-9">
                    <p class="no-margin">Investor bank routing Number for ACH Electronic Transaction or for WIRE TRANSFER?</p>
                </div>
                <div class="col-xs-12 col-sm-3">
                    <select class="no-margin">
                        <option value="" disabled="disabled" selected="selected">Select an option</option>
                        <option value="option">option</option>
                        <option value="option">option</option>
                        <option value="option">option</option>
                        <option value="option">option</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h5>Investors Signed Subscription Documents</h5>
                    <p>Please drap and drop your individual investors’ signed subscription Documents in the folder below:</p>
                    <div class="breadcrumb margin-top-m">
                        <p>All Files<img src="/img/icon-arrow-right.svg">Sponsor Company Name<img src="/img/icon-arrow-right.svg">Investor Servicing<img src="/img/icon-arrow-right.svg">Subscription Documents</p>
                    </div>
                    <box-component></box-component>
                </div>
            </div>
            <div class="row prop-new">
                <div class="col-xs-12">
                    <div class="content-footer">
                        <div class="row center-xs">
                            <input type="submit" value="Submit">      
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

<!-- @todo Ben -->