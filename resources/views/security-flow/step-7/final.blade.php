@extends('security-flow.step-7.main-template')
@section('title', $title )

@section('body')
<form action="#" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Preview & Submit</h5></div>
    <div class="card-content">
            <h5>Final Review</h5>
            <p>Plesae review and ensure all information provided it is correct. To make changes, click the Edit link in the section you wish to change. Hit Submit at the bottom of the page when you are ready to send in your digital security for review.</p>
            <div class="card grey margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Presented By:</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="card equal-padding">
                        <div class="row">
                            <div class="col-xs-12 col-sm-4">
                                <div class="presented-company"></div>
                            </div>
                            <div class="col-xs-12 col-sm-8">
                                <div class="presented-description">
                                    <p class="color-white">Cephas Partners is a private equity firm specializing in alternative investments with a primary focus on real estate related opportunities. Cephas was originally formed in 2012 to assist affiliates of The Blackstone Group in managing complex real estate transactions on three different continents. Cephas Partners seeks to maximize opportunities for its investors, partners and employees and leave a legacy of generosity.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Digital Security Details</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="porperty-image large margin-bottom-m-md">
                                <div class="image-close"></div><img src="/img/img-demo-1.jpg"></div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="row margin-bottom-m">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="porperty-image margin-bottom-m-md">
                                        <div class="image-close"></div><img src="/img/img-demo-2.jpg"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="porperty-image">
                                        <div class="image-close"></div><img src="/img/img-demo-3.jpg"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <div class="porperty-image margin-bottom-m-md">
                                        <div class="image-close"></div><img src="/img/img-demo-4.jpg"></div>
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <div class="porperty-image">
                                        <div class="image-close"></div><img src="/img/img-demo-5.jpg"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grey margin-bottom-m margin-top-m">
                <div class="card-title blue has-button">
                    <h5>Deal Highlights</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                            <div class="row">
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Investor IRR</p><input type="text" name="target-investor-irr" value="{{ isset($data['target-investor-irr']) ? $data['target-investor-irr'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Investment Profile</p><input type="text" name="investment-profile" value="{{ isset($data['investment-profile']) ? $data['investment-profile'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Funds Due</p><input type="text" name="funds-due" value="{{ isset($data['funds-due']) ? $data['funds-due'] : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Equity Multiple</p><input type="text" name="target-equity-multiple" value="{{ isset($data['target-equity-multiple']) ? $data['target-equity-multiple'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Minimum Investment</p><input name="minimum-investment" type="text" value="{{ isset($data['minimum-investment']) ? $data['minimum-investment'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Distribution Period</p><input name="distribution-period" type="text" value="{{ isset($data['distribution-period']) ? $data['distribution-period'] : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3 margin-bottom-l-md">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Investment Period</p><input name="target-investment-period" type="text" value="{{ isset($data['target-investment-period']) ? $data['target-investment-period'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Property Type</p><input name="property-type" type="text">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Sponsor Co-Investment</p><input name="sponsor-co-investment" value="{{ isset($data['sponsor-co-investment']) ? $data['sponsor-co-investment'] : '' }}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xs-12 col-md-3">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12">
                                                <p>Target Avg Investor Cash Yield</p><input name="target-avg-investor-cash-yield" type="text" value="{{ isset($data['target-avg-investor-cash-yield']) ? $data['target-avg-investor-cash-yield'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Offers Due</p><input name="offers-due" type="text" value="{{ isset($data['offers-due']) ? $data['offers-due'] : '' }}">
                                            </div>
                                            <div class="col-xs-12">
                                                <p>Distribution Commencement</p><input name="distribution-commencement" type="text" value="{{ isset($data['distribution-commencement']) ? $data['distribution-commencement'] : '' }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grey margin-bttom-m margin-top-m">
                <div class="card-title blue has-button">
                    <h5>Property Details</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="content-form">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-7">
                                            <p class="no-margin-top">Property / Opportunity Name</p><input value="{{ isset($data['property']) ? $data['property'] : '' }}" name="property" type="text">
                                        </div>
                                        <div class="col-xs-12 col-md-5">
                                            <p class="no-margin-top margin-top-s-md">Opportunity Type</p>
                                            <select name="opportunity_type">
                                                <option value="{{ isset($data['opportunity_type']) ? $data['opportunity_type'] : '' }}" selected="selected">Select an option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                                <option value="option">option</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <p>Short Description of Opportunity</p>
                                            <textarea name="opportunity_description">{{ isset($data['opportunity_description']) ? $data['opportunity_description'] : '' }}</textarea>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Property Address</p><input value="{{ isset($data['property_address']) ? $data['property_address'] : '' }}" name="property_address" type="text">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>City</p><input name="city" value="{{ isset($data['city']) ? $data['city'] : '' }}" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>State</p><input name="state" value="{{ isset($data['state']) ? $data['state'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Zip Code</p><input name="zip" value="{{ isset($data['zip']) ? $data['zip'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Country</p><input name="country" value="{{ isset($data['country']) ? $data['country'] : '' }}" type="text">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="content-form">
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p class="no-margin-top">Vacancy Rate</p><input name="vacancy_rate" value="{{ isset($data['vacancy_rate']) ? $data['vacancy_rate'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p class="no-margin-top">Current NOI</p><input name="current_noi" value="{{ isset($data['current_noi']) ? $data['current_noi'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p class="no-margin-top">Annual Cash Flow</p><input name="annual_cash_flow" value="{{ isset($data['annual_cash_flow']) ? $data['annual_cash_flow'] : '' }}" type="text">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>1031 Exchange</p><input type="text" name="1031_exchange" placeholder="Y or N?" value="{{ isset($data['1031_exchange']) ? $data['1031_exchange'] : '' }}">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Market Value</p><input name="market_value" type="text" value="{{ isset($data['market_value']) ? $data['market_value'] : '' }}">
                                        </div>
                                        <div class="col-xs-12 col-md-4">
                                            <p>Square Footage</p><input name="square_footage" type="text" value="{{ isset($data['square_footage']) ? $data['square_footage'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-md-4">
                                            <p>Property Class</p><input type="text" name="property_class" placeholder="A, B or C" value="{{ isset($data['property_class']) ? $data['property_class'] : '' }}">
                                        </div>
                                    </div>
                                    <div class="row margin-top-m">
                                        <div class="col-xs-12">
                                            <h6>Loan Information:</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Total Debt</p><input name="total_debt" value="{{ isset($data['total_debt']) ? $data['total_debt'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Payoff Date</p><input name="payoff_date" value="{{ isset($data['payoff_date']) ? $data['payoff_date'] : '' }}" type="text">
                                        </div>
                                    </div>
                                    <div class="row margin-top-s">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Amortizing</p><input type="radio" 
                                            <?php 
                                                if(isset($data['loan-type']) && $data['loan-type'] === 'Amortizing'){
                                                    echo 'Checked';
                                                }
                                            ?>
                                             value="" name="loan-type">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Interest Only</p><input type="radio" 
                                            <?php 
                                            if(isset($data['loan-type']) && $data['loan-type'] === 'Interest Only'){
                                                echo 'Checked';
                                            }
                                            ?>
                                            value="Interest Only" name="loan-type">
                                        </div>
                                    </div>
                                    <div class="row margin-top-m">
                                        <div class="col-xs-12">
                                            <h6>Is the Property Developed?</h6>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Yes</p><input type="radio" 
                                            <?php 
                                            if(isset($data['developed']) && $data['developed'] === 'yes'){
                                                echo 'Checked';
                                            }
                                            ?> value="yes" name="developed">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>No</p><input type="radio" 
                                            <?php 
                                            if(isset($data['developed']) && $data['developed'] === 'no'){
                                                echo 'Checked';
                                            }
                                            ?>
                                            value="no" name="developed">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
            <div class="card grey margin-bttom-m margin-top-m">
                <div class="card-title blue has-button">
                    <h5>Investment Details</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <h5>Existing Investor Ownership</h5>
                                <p>Please upload your cap table; our preferred method of data transfer. However, if you have 3 or less investors on your cap table, you may enter their information mannually below. </p>
                                <uploads-component 
                                    type="single-dust"
                                    action="//jsonplaceholder.typicode.com/posts/"
                                    title="Upload Cap Table"
                                    flat="true">
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
                                            <p>% Ownership</p><input type="text" value="{{ isset($data['investor-ownership-1']) ? $data['investor-ownership-1'] : '' }}" name="ownership-1">
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
                                            <p>% Ownership</p><input type="text" value="{{ isset($data['investor-ownership-2']) ? $data['investor-ownership-2'] : '' }}" name="ownership-2">
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
                                                <option value="{{ isset($data['distribution-frequency']) ? $data['distribution-frequency'] : '' }}" selected="selected">Select an option</option>
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
            </div>
            </div>
            <div class="card grey margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Diligence & Deal Documents</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="breadcrumb">
                                <p>All Files <img src="/img/icon-arrow-right.svg"> Cephas Partners Diligence & Deal Documents</p>
                            </div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <input type="search">
                        </div>
                    </div>
                    <div class="row">
                        <file-tree></file-tree>
                    </div>
                </div>
            </div>
            <div class="card grey margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Capital Stack</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12 col-md-6">
                            <div class="capital-chart"></div>
                        </div>
                        <div class="col-xs-12 col-md-6">
                            <div class="card">
                                <div class="card-content">
                                    <div class="content-form">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="no-margin-top">Preferred Equity</p><input name="preferred-equity" value="{{ isset($data['preferred-equity']) ? $data['preferred-equity'] : '' }}" type="text">
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <p class="no-margin-top margin-top-s-sm">Common Equity</p><input name="common-equity" value="{{ isset($data['common-equity']) ? $data['common-equity'] : '' }}" type="text">
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-6">
                                                <p>Mezzanine Debt</p><input name="mezzanine-debt" value="{{ isset($data['mezzanine-debt']) ? $data['mezzanine-debt'] : '' }}" type="text">
                                            </div>
                                            <div class="col-xs-12 col-sm-6">
                                                <p>Senior Debt</p><input name="senior-debt" value="{{ isset($data['senior-debt']) ? $data['senior-debt'] : '' }}" type="text">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grey margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Key Deal Points</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="row">
                        <div class="col-xs-12">
                            {{ isset($data['key-point']) ? $data['key-point'] : '' }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="card grey margin-bottom-m">
                <div class="card-title blue has-button">
                    <h5>Meet the Principles</h5>
                    <div class="btn">Edit</div>
                </div>
                <div class="card-content">
                    <div class="card">
                        <div class="card-content">
                            <div class="row margin-top-l">
                                <div class="col-xs-12 col-sm-4">
                                    <uploads-component 
                                        type="single"
                                        action="//jsonplaceholder.typicode.com/posts/"
                                        title="Upload Photo">
                                    </uploads-component>
                                </div>
                                <div class="col-xs-12 col-sm-8">
                                    <p class="no-margin-top">Principle Bio</p>
                                    <textarea name="principle-bio" value="{{ isset($data['principle-bio']) ? $data['principle-bio'] : '' }}"></textarea>
                                    <div class="row">
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Principle Full Name</p><input name="principle-full-name" value="{{ isset($data['principle-full-name']) ? $data['principle-full-name'] : '' }}" type="text">
                                        </div>
                                        <div class="col-xs-12 col-sm-6">
                                            <p>Principle Title</p><input name="principle-title" value="{{ isset($data['principle-title']) ? $data['principle-title'] : '' }}" type="text">
                                        </div>
                                    </div>
                                    <div class="btn small margin-top-m">+ Add Principle</div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12">
                                    <div class="content-footer">
                                        <div class="footer-button-next"><input type="submit" value="Next"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12">
                    <div class="card margin-bottom-m">
                        <div class="card-title">
                            <h5>Edit or Submit</h5></div>
                        <div class="card-content">
                            <p class="no-margin-top">Once you submit your digital security diligence, you will receive an email from our team confirming receipt. Our diligence team will be in touch via email within 2-3 days to let you know if you’re digital security is ready to complete. Congrats!</p>
                            <input type="submit" value="Submit">
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>

</form>
@endsection