@extends('investor-servicing.tax.main-template')
@section('title', "Tax Documents > Investor Servicing")
<style>
.prop-new .content-footer{
    margin:50px 0;
}
</style>
@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Tax Documents</h5></div>
    <div class="card-content">
        <p>Choose which tax document you are uploading, choose the year, upload the tax document then hit Submit. Your investor tax documents will be uploaded to the Investor Servicing portal within 48 hours for viewing.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <form>
                    <div class="row middle-xs">
                        <div class="col-xs-12 col-md-6">
                            <div class="card equal-padding margin-bottom-m">
                                <div class="row middle-xs">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                        <p class="no-margin">Choose Tax Document:</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                        <select class="no-margin-top">
                                            <option value="" disabled="disabled" selected="selected">Select an option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card equal-padding">
                                <div class="row middle-xs">
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-4 text-left">
                                        <p class="no-margin">Choose Document Year:</p>
                                    </div>
                                    <div class="col-xs-12 col-sm-6 col-md-8 col-lg-8">
                                        <select class="no-margin-top">
                                            <option value="" disabled="disabled" selected="selected">Select an option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <p>or</p>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="content-form">
                                        <p>Choose an Available Tax Document:</p>
                                        <select>
                                            <option value="" disabled="disabled" selected="selected">Select an option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                            <option value="option">option</option>
                                        </select>
                                    </div>
                                    <div class="row margin-top-m">
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="btn full-width margin-bottom-m-sm">PDF</div>
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <div class="btn dust full-width margin-bottom-m-sm">CSV</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row center-xs">
                                <div class="col-xs-12 col-md-8">
                                    <uploads-component
                                        title="Upload Tax Document"
                                        action="/files"
                                        elname="image"
                                        scope="private"
                                        path="/property/"
                                        type="single">
                                    </uploads-component>
                                </div>
                            </div>
                        </div>
                        <div class="row"></div>
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
                                    <input type="submit" value="Save">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

<!-- @todo Ben
upload  -->