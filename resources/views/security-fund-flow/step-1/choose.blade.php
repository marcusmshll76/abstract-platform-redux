@extends('security-fund-flow.step-1.main-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/bio/create" method="post">
@csrf
<div class="card margin-top-m">
<div class="card-title blue">
        <h5> Import Security Details</h5>
    </div>
    <div class="card-content">
        <p>I am creating and servicing digital securities for a:</p>
        <div class="card grey margin-top-m card-black">
            <div class="card-content">
                <div class="row center-xs text-center long">
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="card equal-padding dust">
                            <img src="/img/icon-building-white.svg" />
                        </div>
                        <a href="/security-flow/step-1/upload-photos" class="btn margin-top-m color-white">Property</a>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <div class="card equal-padding dust margin-top-m-sm">
                        <img src="/img/icon_-stock-market-portfolio-white.svg" />
                        </div>
                        <a href="/security-fund-flow/step-1/upload-photos" class="btn margin-top-m color-white">Fund</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-footer">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection