@extends('marketplace.mcg-template')
@section('title', $title )

@section('body')
<form action="/security-fund-flow/step-7/create/preview" method="post">
@csrf
<div class="col-xs-12 col-sm-12 col-md-12">
    <div class="card grey margin-top-m">
        <div class="card-title blue">
            <h5>Marketplace</h5></div>
        <div class="card-content">
            <div class="row">
            @if (!$data->isEmpty())
            @foreach ($data as $key=>$property)
            <div class="col-xs-12 col-sm-4">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>{{ $property->name }}</h5>
                                <p>@if (isset($property->fakeType) &&  $property->fakeType === 'property')
                                            Property digital security

                                        @elseif (isset($property->fakeType) &&  $property->fakeType === 'sproperty')
                                            Property
                                        @else
                                            Fund digital security
                                        @endif</p>
                            </div>
                            @if ($property->fakeType === 'fund')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="fund-digital-security"
                                            path="/digital-security/fund/photo-gallery/"
                                            index="0"
                                            section="security-fund-flow-files">
                                        </file-preview>
                                    </div>

                                    @elseif ($property->fakeType === 'property')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="digital-security"
                                            path="/digital-security/photo-gallery/"
                                            index="0"
                                            section="security-flow-files">
                                        </file-preview>
                                    </div>
                                    
                                    @elseif ($property->fakeType === 'sproperty')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="property-image"
                                            path="/property/images/"
                                            index="0"
                                            section="investor-servicing-files">
                                        </file-preview>
                                    </div>
                                    
                                @endif

                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="{{'/marketplace/details/'.$property->fakeType.'/'.strtolower(str_random(30)).'/'.$property->id}}" class="btn full-width color-white">Learn More</a>
                        </div>
                    </div>
                </div>     
            @endforeach
        @endif
        <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-3.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-2.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-3.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div> 
                <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-2.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-1.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-4 margin-top-m">
                    <div class="card">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-3.jpg"></div>
                        <div class="marketplace-card-info">
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Investor IRR</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>22.8%</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Tareted Equity Multiple </p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>1.8x</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Targeted Invesetment Period</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>3yrs</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Minimum Investment</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>$25,000</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xs-12 col-sm-8">
                                    <p>Project Type</p>
                                </div>
                                <div class="col-xs-12 col-sm-4">
                                    <p>MultiFamily</p>
                                </div>
                            </div>
                        </div>
                        <div class="marketplace-card-button">
                            <a href="/marketplace/details/learn-more" class="btn full-width">Learn More</a>
                        </div>
                    </div>
                </div> 
            <div class="row">
                <div class="col-xs-12"></div>
            </div>
        </div>
    </div>
</div>


@endsection