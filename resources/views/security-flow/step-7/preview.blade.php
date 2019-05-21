@extends('security-flow.step-7.main-template')
@section('title', $title )

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Preview & Submit</h5>
    </div>
    <div class="card-content">
        <h5>You’re nearly there!</h5>
        <p>Hit preview to review all information to ensure it is correct. You may EDIT if need be by pressing the EDIT button at the start of each section; your information will automatically re-save when you hit submit at the bottom of the page..</p>
        <div class="card">
            <div class="card-title dust has-button">
                <h5>Digital Security Details</h5>
                <div class="btn">Edit</div>
            </div>
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="porperty-image margin-bottom-m-sm">
                            <div class="image-close"></div><img src="/img/img-demo-1.jpg">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="porperty-image margin-bottom-m-sm">
                            <div class="image-close"></div><img src="/img/img-demo-2.jpg">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-4">
                        <div class="porperty-image">
                            <div class="image-close"></div><img src="/img/img-demo-3.jpg">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <div class="content-footer">
                    <div class="footer-button-next">
                        <a href="/security-flow/preview" class="btn color-white">Preview</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection