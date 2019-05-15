@extends('account-settings.verification-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/bio" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Account Verification</h5>
    </div>
    <div class="card-content">
        <h5>About the Sponsor</h5>
        <p>Connect your Sponsor Bio now and this information can automaically be connected to the digital securities you create for Abstract’s Marketplace. Investors will look at your Sponsor Bio to learn more about your company’s history.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-3">
                        <div class="file-upload-box"><img src="/img/icon-upload.svg">
                            <h5>Upload Company Logo </h5>
                        </div>
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12">
                                    <p>Company Name</p>
                                    
                                    @if($errors->has('company_name'))
                                        <br/>
                                        <small class="error-small"><em>*</em> <span> {{ $errors->first('company_name') }} </span></small>
                                    @endif

                                    <input type="text" value="{{ $data['company_name'] }}" name="company_name">
                                </div>
                                <div class="col-xs-12">
                                    <p>Company Website</p>

                                    @if($errors->has('company_website'))
                                        <br/>
                                        <small class="error-small"><em>*</em> <span> {{ $errors->first('company_website') }} </span></small>
                                    @endif

                                    <input type="text" value="{{ $data['company_website'] }}" name="company_website">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-9">
                        <div class="content-form">
                            <div class="row">
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">First Name</p>

                                            @if($errors->has('first_name'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('first_name') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ $data['first_name'] }}" name="first_name">
                                        </div>
                                        <div class="col-xs-12">

                                            <p>Work Phone</p>

                                            @if($errors->has('work_phone'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('work_phone') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['work_phone'] }}" name="work_phone">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Company Address</p>

                                            @if($errors->has('company_address'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('company_address') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['company_address'] }}" name="company_address">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Company Address</p>
                                            
                                            @if($errors->has('company_address_2'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('company_address_2') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['company_address_2'] }}" name="company_address_2">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Last Name</p>
                                            
                                            @if($errors->has('last_name'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('last_name') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['last_name'] }}" name="last_name">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Mobile Phone</p>
                                            
                                            @if($errors->has('mobile'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('mobile') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['mobile'] }}" name="mobile">
                                        </div>
                                        <div class="col-xs-12">
                                            <div class="row">
                                                <div class="col-xs-12 col-sm-7 col-md-8">
                                                    <p>City</p>
                                                    
                                                    @if($errors->has('city'))
                                                        <br/>
                                                        <small class="error-small"><em>*</em> <span> {{ $errors->first('city') }} </span></small>
                                                    @endif

                                                    <input type="text" value="{{ $data['city'] }}" name="city">
                                                </div>
                                                <div class="col-xs-12 col-sm-5 col-md-4">
                                                    <p>State</p>
                                                    
                                                    @if($errors->has('state'))
                                                        <br/>
                                                        <small class="error-small"><em>*</em> <span> required </span></small>
                                                    @endif

                                                    <input type="text" value="{{ $data['state'] }}" name="state">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xs-12">
                                            <p>ZIP Code</p>
                                            
                                            @if($errors->has('zip'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('zip') }} </span></small>
                                            @endif

                                            <input type="text" value="{{ $data['zip'] }}" name="zip">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p class="no-margin-top">Email</p>
                                            @if($errors->has('email'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('email') }} </span></small>
                                            @endif

                                            <input type="email" value="{{ $data['email'] }}" name="email">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Job Title</p>
                                            
                                            @if($errors->has('job_title'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('job_title') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['job_title'] }}" name="job_title">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Sponsor EIN/TIN</p>
                                            
                                            @if($errors->has('tin'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('tin') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['tin'] }}" name="tin">
                                        </div>
                                        <div class="col-xs-12">
                                            <p>Country</p>
                                            
                                            @if($errors->has('country'))
                                                <br/>
                                                <small class="error-small"><em>*</em> <span> {{ $errors->first('country') }} </span></small>
                                            @endif
                                            
                                            <input type="text" value="{{ $data['country'] }}" name="country">
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