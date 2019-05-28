@extends('security-flow.step-4.main-template')
@section('title', $title )

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Key Deal Points</h5>
    </div>
    <div class="card-content">
            <h5>Enter Key Points</h5>
            <p>Cut and paste key deal points from your PPM or offering memerandum. Enter up to 5 key deal points, starting each new deal point with a bullet or astrix.</p>  
            <key-points url="security-flow/step-4/create/keyPoints" data="{{ isset($data['key-point']) ? $data['key-point'] : '' }}" next="yes"></key-points>
    </div>
</div>
@endsection