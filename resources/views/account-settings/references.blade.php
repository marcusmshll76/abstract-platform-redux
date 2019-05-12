@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/diligence" method="post">
@csrf

<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>Professional References </h5>
        <p>We will need 4 references from your team. (1) Commercial Mortgage Broker, (2) Bank References, and (1) CRE Broker. </p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p><select>
                                                <option value="" disabled="disabled" selected="selected" name="reference_type_1">Select an option</option>
                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p><input type="text" name="reference_name_1">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p><input type="text" name="reference_phone_1">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p><input type="text" name="reference_email_1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p><select>
                                                <option value="" disabled="disabled" selected="selected" name="reference_type_2">Select an option</option>
                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p><input type="text" name="reference_name_2">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p><input type="text" name="reference_phone_2">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p><input type="text" name="reference_email_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p><select>
                                                <option value="" disabled="disabled" selected="selected" name="reference_type_3">Select an option</option>
                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p><input type="text" name="reference_name_3">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p><input type="text" name="reference_phone_3">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p><input type="text" name="reference_email_3">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p><select>
                                                <option value="" disabled="disabled" selected="selected" name="reference_type_4">Select an option</option>
                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p><input type="text" name="reference_name_4">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p><input type="text" name="reference_phone_4">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p><input type="text" name="reference_email_4">
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
                            <div class="row center-xs">
                                <div class="col-xs-12 col-sm-6 col-md-4">
                                    <div class="content-footer-step">
                                        <div class="row">
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
                                            </div>
                                            <div class="col-xs">
                                                <div class="step-item active"></div>
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

</form>
@endsection