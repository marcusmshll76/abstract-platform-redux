@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/references/create" method="post">
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
                                <!-------
                                    -------------- Reference 1 -------------
                                -------->
                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p>

                                            @if($errors->has('reference_type_1'))
                                                <small class="error-small"><em>*</em> <span> Please select an option </span></small>
                                            @endif

                                            <select name="reference_type_1">

                                                <!-- default select value -->
                                                <option value="{{ isset($data['reference_type_1']) ? $data['reference_type_1'] : '' }}" selected="selected">
                                                    @if(isset($data['reference_type_1']))

                                                    @switch($data['reference_type_1'])
                                                        @case('cre')
                                                                CRE Broker
                                                            @break

                                                        @case('cmb')
                                                            Commercial Mortgage Broker
                                                            @break
                                                        
                                                        @case('bank')
                                                                Bank Reference
                                                            @break

                                                        @default
                                                            
                                                    @endswitch

                                                    @else
                                                        Select an option
                                                    @endif   
                                                </option>


                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p>

                                            @if($errors->has('reference_name_1'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> This field is required </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_name_1']) ? $data['reference_name_1'] : '' }}" name="reference_name_1">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p>
                                            
                                            @if($errors->has('reference_phone_1'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_phone_1') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_phone_1']) ? $data['reference_phone_1'] : '' }}" name="reference_phone_1">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p>
                                            
                                            @if($errors->has('reference_email_1'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_email_1') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_email_1']) ? $data['reference_email_1'] : '' }}" name="reference_email_1">
                                        </div>
                                    </div>
                                </div>

                                <!-------
                                    -------------- Reference 2 -------------
                                -------->

                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p>

                                            @if($errors->has('reference_type_2'))
                                                <small class="error-small"><em>*</em> <span> Please select an option </span></small>
                                            @endif

                                            <select name="reference_type_2">
                                                
                                                <!-- default select value -->
                                                <option value="{{ isset($data['reference_type_2']) ? $data['reference_type_2'] : '' }}" selected="selected">
                                                    @if(isset($data['reference_type_2']))

                                                    @switch($data['reference_type_2'])
                                                        @case('cre')
                                                                CRE Broker
                                                            @break

                                                        @case('cmb')
                                                            Commercial Mortgage Broker
                                                            @break
                                                        
                                                        @case('bank')
                                                                Bank Reference
                                                            @break

                                                        @default
                                                            
                                                    @endswitch

                                                    @else
                                                        Select an option
                                                    @endif   
                                                </option>

                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p>
                                            
                                            @if($errors->has('reference_name_2'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> This field is required </span></small>
                                            @endif
                                                
                                            <input type="text" value="{{ isset($data['reference_name_2']) ? $data['reference_name_2'] : '' }}" name="reference_name_2">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p>
                                            
                                            @if($errors->has('reference_phone_2'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_phone_2') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_phone_2']) ? $data['reference_phone_2'] : '' }}" name="reference_phone_2">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p>
                                            
                                            @if($errors->has('reference_email_2'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_email_2') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_email_2']) ? $data['reference_email_2'] : '' }}" name="reference_email_2">
                                        </div>
                                    </div>
                                </div>

                                <!-------
                                    -------------- Reference 3 -------------
                                -------->

                                <div class="col-xs-12 col-sm-3 margin-bottom-m-sm">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p>
                                            
                                            @if($errors->has('reference_type_3'))
                                                <small class="error-small"><em>*</em> <span> Please select an option </span></small>
                                            @endif

                                            <select name="reference_type_3">
                                                
                                                <!-- default select value -->
                                                <option value="{{ isset($data['reference_type_3']) ? $data['reference_type_3'] : '' }}" selected="selected">
                                                    @if(isset($data['reference_type_3']))

                                                    @switch($data['reference_type_3'])
                                                        @case('cre')
                                                                CRE Broker
                                                            @break

                                                        @case('cmb')
                                                            Commercial Mortgage Broker
                                                            @break
                                                        
                                                        @case('bank')
                                                                Bank Reference
                                                            @break

                                                        @default
                                                            
                                                    @endswitch

                                                    @else
                                                        Select an option
                                                    @endif   
                                                </option>

                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p>
                                            
                                            @if($errors->has('reference_name_3'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> This field is required </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_name_3']) ? $data['reference_name_3'] : '' }}" name="reference_name_3">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p>
                                            
                                            @if($errors->has('reference_phone_3'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_phone_3') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_phone_3']) ? $data['reference_phone_3'] : '' }}" name="reference_phone_3">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p>
                                            
                                            @if($errors->has('reference_email_3'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_email_3') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_email_3']) ? $data['reference_email_3'] : '' }}" name="reference_email_3">
                                        </div>
                                    </div>
                                </div>

                                <!-------
                                    -------------- Reference 4 -------------
                                -------->

                                <div class="col-xs-12 col-sm-3">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Reference Type</p>
                                            
                                            @if($errors->has('reference_type_4'))
                                                <small class="error-small"><em>*</em> <span> Please select an option </span></small>
                                            @endif

                                            <select name="reference_type_4">
                                                
                                                <!-- default select value -->
                                                <!-- default select value -->
                                                <option value="{{ isset($data['reference_type_4']) ? $data['reference_type_4'] : '' }}" selected="selected">
                                                    @if(isset($data['reference_type_4']))

                                                    @switch($data['reference_type_4'])
                                                        @case('cre')
                                                                CRE Broker
                                                            @break

                                                        @case('cmb')
                                                            Commercial Mortgage Broker
                                                            @break
                                                        
                                                        @case('bank')
                                                                Bank Reference
                                                            @break

                                                        @default
                                                            
                                                    @endswitch

                                                    @else
                                                        Select an option
                                                    @endif   
                                                </option>

                                                <option value="cmb">Commercial Mortgage Broker</option>
                                                <option value="cre">CRE Broker</option>
                                                <option value="bank">Bank Reference</option>
                                            </select>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>First, Last Name</p>

                                            @if($errors->has('reference_name_4'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> This field is required </span></small>
                                            @endif
                                            <input type="text" value="{{ isset($data['reference_name_4']) ? $data['reference_name_4'] : '' }}" name="reference_name_4">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Phone Number</p>
                                            
                                            @if($errors->has('reference_phone_4'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_phone_2') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_phone_4']) ? $data['reference_phone_4'] : '' }}" name="reference_phone_4">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Email</p>
                                            
                                            @if($errors->has('reference_email_4'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('reference_email_4') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ isset($data['reference_email_4']) ? $data['reference_email_4'] : '' }}" name="reference_email_4">
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