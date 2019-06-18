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
    user="{{ Auth::id() }}"
    info="<h5>Thank you, your property has been uploaded. </h5><p>Please allow 48 hours for our team to review and approve. Once approved, you will receive an email with instructions on how to easily invite your investors to join and view performance reports on Abstract’s Investor Servicing portal.</p>"
    action="Got It!"
    url="/investor-servicing/choose-investment">
</popup-component>
@endif
<form action="/property/create/new" method="post">
@csrf
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
                                type="single"
                                action="/files"
                                elname="image"
                                scope="private"
                                field="property-image"
                                multi="no"
                                path="/property/images/">
                            </uploads-component>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <p class="no-margin-top">Property / Opportunity Name</p>
                                        @if($errors->has('opportunity_name'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('opportunity_name') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['opportunity_name']) ? $data['opportunity_name'] : '' }}" name="opportunity_name">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-6">
                                        <p>Property Address</p>
                                        @if($errors->has('opportunity_address'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('opportunity_address') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['opportunity_address']) ? $data['opportunity_address'] : '' }}" name="opportunity_address">
                                    </div>
                                    <div class="col-xs-12 col-sm-6">
                                        <p>City</p>
                                        @if($errors->has('city'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('city') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['city']) ? $data['city'] : '' }}" name="city">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p>State</p>
                                        @if($errors->has('state'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('state') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['state']) ? $data['state'] : '' }}" name="state">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>ZipCode</p>
                                        @if($errors->has('zipcode'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('zipcode') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['zipcode']) ? $data['zipcode'] : '' }}" name="zipcode">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Country</p>
                                        @if($errors->has('country'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('country') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['country']) ? $data['country'] : '' }}" name="country">
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
                                title="Upload Cap Table"
                                type="single"
                                action="/files"
                                elname="file"
                                scope="private"
                                field="property-cap"
                                multi="no"
                                section="captable"
                                path="/property/cap/">
                            </uploads-component>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <div class="content-form">
                                <div class="row margin-bottom-l-md">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Full Name</p>
                                        @if($errors->has('investor-full-name'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-full-name') }} </span></small>
                                        @endif
                                        <input value="{{ isset($data['investor-full-name']) ? $data['investor-full-name'] : '' }}" name="investor-full-name" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Entity Name If Applicable</p>
                                        @if($errors->has('investor-entity-name'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-entity-name') }} </span></small>
                                        @endif
                                        <input name="investor-entity-name" value="{{ isset($data['investor-entity-name']) ? $data['investor-entity-name'] : '' }}" type="text">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p>
                                        @if($errors->has('ownership'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('ownership') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['ownership']) ? $data['ownership'] : '' }}" name="ownership">
                                    </div>
                                </div>
                                <div class="row margin-bottom-l-md">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Full Name</p>
                                        @if($errors->has('investor-full-name-1'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-full-name-1') }} </span></small>
                                        @endif
                                        <input value="{{ isset($data['investor-full-name-1']) ? $data['investor-full-name-1'] : '' }}" type="text" name="investor-full-name-1">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Entity Name If Applicable</p>
                                        @if($errors->has('investor-entity-name-1'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-entity-name-1') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['investor-entity-name-1']) ? $data['investor-entity-name-1'] : '' }}" name="investor-entity-name-1">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p>
                                        @if($errors->has('ownership-1'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('ownership-1') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['ownership-1']) ? $data['ownership-1'] : '' }}" name="ownership-1">
                                    </div>
                                </div>
                                <div class="row margin-bottom-l-sm">
                                    <div class="col-xs-12 col-md-4">
                                        <p>Investor Full Name</p>
                                        @if($errors->has('investor-full-name-2'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-full-name-2') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['investor-full-name-2']) ? $data['investor-full-name-2'] : '' }}" name="investor-full-name-2">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>Entity Name If Applicable</p>
                                        @if($errors->has('investor-entity-name-2'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('investor-entity-name-2') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['investor-entity-name-2']) ? $data['investor-entity-name-2'] : '' }}" name="investor-entity-name-2">
                                    </div>
                                    <div class="col-xs-12 col-md-4">
                                        <p>% Ownership</p>
                                        @if($errors->has('ownership-2'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('ownership-2') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['ownership-2']) ? $data['ownership-2'] : '' }}" name="ownership-2">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row margin-bottom-m padding-bottom-m border-bottom middle-xs">
                <div class="col-xs-12 col-sm-9">
                    <p class="no-margin">Are the providing routing numbers for ACH Electronic Transaction or for wire transfer?</p>
                    @if($errors->has('bankTransfer'))
                        <small class="error-small"><em>*</em> <span> {{ $errors->first('bankTransfer') }} </span></small>
                    @endif
                </div>
                <div class="col-xs-12 col-sm-3">
                    <select class="no-margin" name="bankTransfer">
                        <option value="{{ isset($data['bankTransfer']) ? $data['bankTransfer'] : '' }}" selected="selected">{{ isset($data['bankTransfer']) ? $data['bankTransfer'] : 'Select an option' }}</option>
                        <option value="ACH">ACH</option>
                        <option value="wire">Wire Transfer</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <h5>Investors Signed Subscription Documents</h5>
                    <p>Please drag and drop your individual investors’ signed subscription Documents in the folder below:</p>
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
</form>
@endsection

<!-- @todo Ben -->