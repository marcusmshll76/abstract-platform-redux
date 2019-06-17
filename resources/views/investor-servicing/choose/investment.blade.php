@extends('investor-servicing.choose.main-template')
@section('title', "Choose Investment > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Choose or Upload New Property</h5></div>
    <div class="card-content">
        <p>Add a new Property or choose an Approved Property below to utilize our automated Investor Servicing portal.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 slider-upload">
                        <a href="/investor-servicing/upload-new-property">
                            <div class="marketplace-card-image porperty-image"><img src="/img/icon-circle-plus.svg" class="icon-plus"></div>
                        </a>
                        <a  href="/investor-servicing/upload-new-property" class="btn full-width margin-top-s color-white">Upload New</a>
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        @if (!empty($data))
                        <div class="owl-carousel owl-theme slider-two-item">
                            @foreach ($data as $key=>$investment)
                            <div class="item">
                                <div class="marketplace-card-image porperty-image">
                                    <div class="marketplace-card-image-description">
                                        <h5>{{ $investment->name }}</h5>
                                        <p>{{ isset($investment->fakeType) &&  $investment->fakeType === 'property' ? 'Property digital security' : 'Fund digital security' }}</p>
                                    </div>
                                    @if ($investment->fakeType !== 'property')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="fund-digital-security"
                                            path="/digital-security/fund/photo-gallery/"
                                            index="0">
                                        </file-preview>
                                    </div>
                                    <a href="{{'/investor-servicing/cap-table-mgmt/'. $investment->fakeType. '/'.strtolower(str_random(100)). '/' .$investment->id }}" class="btn full-width margin-top-s color-white">Select</a>
                                    @else
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="digital-security"
                                            path="/digital-security/photo-gallery/"
                                            index="0">
                                        </file-preview>

                                </div>
                                <a href="{{'/investor-servicing/cap-table-mgmt/'. $investment->fakeType. '/'.strtolower(str_random(100)). '/' .$investment->id }}" class="btn full-width margin-top-s color-white">Select</a>
                                @endif
                            </div>
                            @endforeach
                        </div>
                        @else
                        <p class="no-margin-top margin-left-s">Choose Approved Property or Digital Security:</p>
                        <p class="margin-left-s margin-top-l">You have no APPROVED Properties or Digital Securities.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Choose an Investment</h5>
    </div>
    <div class="card-content">
        <h5>Choose a Live Property or Fund</h5>
        <p>Select any investments below to view Investor Servicing and send reports to all positions tied to the investment.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="owl-carousel owl-theme default-slider">
                </div>
            </div>
        </div>
    </div>
</div>
-->
<popup-component
    title="Abstract Investor Servicing"
    type="basic" 
    user="{{ $userid }}"
    info="<h5>We listened  to our Sponsor Network’s feedback and created a simplified Investor Servicing portal. </h5><p>Once you upload the relavent documentation, we will pass your property or fund through our diligenprocess in 48 hours or less. Next, you will receive an email with instructions on how to invite your investoto login to your personal portal and view investor servicing reporting.</p>"
    action="Got It!">
</popup-component>
@endsection
@section('jquery-js-top')
    <script src="/js/owl.carousel.min.js"></script>
@stop