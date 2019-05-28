@extends('investor-servicing.choose.main-template')
@section('title', "Choose Investment > Investor Servicing")

@section('body')
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
                    <!-- <div class="item">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-1.jpg">
                        </div>
                        <div class="btn full-width margin-top-s">Select</div>
                    </div>
                    
                    <div class="item">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-3.jpg">
                        </div>
                        <div class="btn full-width margin-top-s">Select</div>
                    </div>
                    <div class="item">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-4.jpg">
                        </div>
                        <div class="btn full-width margin-top-s">Select</div>
                    </div>
                    <div class="item">
                        <div class="marketplace-card-image porperty-image">
                            <div class="marketplace-card-image-description">
                                <h5>Mullbery Place Portland, OR</h5>
                                <p>Mixed Family</p>
                            </div><img src="/img/img-demo-5.jpg">
                        </div>
                        <div class="btn full-width margin-top-s">Select</div>
                    </div> -->

                    @foreach ($data as $key=>$investment)
                        <div class="item">
                            <div class="marketplace-card-image porperty-image">
                                <div class="marketplace-card-image-description">
                                    <h5>{{ $investment->name }}</h5>
                                    <p>{{ isset($investment->p) ? 'Property digital security' : 'Fund digital security' }}</p>
                                </div>
                                @if ($investment->f)
                                    <file-preview
                                        iname="Single" 
                                        scope="private"
                                        user="{{Auth::id()}}"
                                        path="/digital-security/fund/photo-gallery/"
                                        index="{{ $key }}">
                                    </file-preview>
                                </div>
                                <a href="{{'/investor-servicing/cap-table-mgmt/fund/'.$investment->id}}" class="btn full-width margin-top-s color-white">Select</a>
                                @else
                                <file-preview
                                    iname="Single" 
                                    scope="private"
                                    user="{{Auth::id()}}"
                                    path="/digital-security/photo-gallery/"
                                    index="$key">
                                </file-preview>
                                
                            </div>
                            <a href="{{'/investor-servicing/cap-table-mgmt/property/'.$investment->id}}" class="btn full-width margin-top-s color-white">Select</a>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('jquery-js')
    <script src="/js/owl.carousel.min.js"></script>
@stop