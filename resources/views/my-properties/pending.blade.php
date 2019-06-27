@extends('my-properties.properties-template')
@section('title', $title )

@section('body')
<form method="post">
@csrf
<div class="card margin-top-m">
        <div class="card-title blue">
            <h5>Pending</h5></div>
        <div class="card-content">
            <h5>Choose a pending Property or Fund </h5>
            <p>These properties are pending due to incomplete or missing information. Use the EDIT button, under the property of your choice, to edit content / finish completing your digital security offering.</p>
            <div class="card grey margin-top-m">
                <div class="card-content">
                @if (!$data->isEmpty())
                    <div class="owl-carousel owl-theme default-slider">
                        @foreach ($data as $key=>$property)
                            <div class="item">
                                <div class="marketplace-card-image porperty-image">
                                    <div class="marketplace-card-image-description">
                                        <h5>{{ $property->name }}</h5>
                                        <p>
                                        @if (isset($property->fakeType) &&  $property->fakeType === 'property')
                                            Property digital security

                                        @elseif (isset($property->fakeType) &&  $property->fakeType === 'sproperty')
                                            Property
                                        @else
                                            Fund digital security
                                        @endif
                                        </p>
                                    </div>
                                    @if ($property->fakeType === 'fund')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="fund-digital-security"
                                            path="/digital-security/fund/photo-gallery/"
                                            index="0">
                                        </file-preview>
                                    </div>
                                    <a href="{{ '/edit/security-flow/' . $property->fakeType . '/' . $property->id }}" class="btn full-width margin-top-s color-white">Edit</a>
                                    @elseif ($property->fakeType === 'property')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="digital-security"
                                            path="/digital-security/photo-gallery/"
                                            index="0">
                                        </file-preview>
                                    </div>
                                    <a href="{{ '/edit/security-flow/' . $property->fakeType . '/' . $property->id }}" class="btn full-width margin-top-s color-white">Edit</a>
                                    @elseif ($property->fakeType === 'sproperty')
                                        <file-preview
                                            iname="Single"
                                            scope="private"
                                            user="{{Auth::id()}}"
                                            field="property-image"
                                            path="/property/images/"
                                            index="0">
                                        </file-preview>
                                    </div>
                                    <a href="{{ '/edit/security-flow/' . $property->fakeType . '/' . $property->id }}" class="btn full-width margin-top-s color-white">Edit</a>
                                @endif
                            </div>
                            @endforeach
                    </div>
                    @else
                        <p class="margin-left-s">You have no PENDING Digital Securities.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
@section('jquery-js-top')
    <script src="/js/owl.carousel.min.js"></script>
@stop