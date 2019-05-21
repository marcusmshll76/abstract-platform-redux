@extends('security-flow.step-4.main-template')
@section('title', $title )

@section('body')
<form action="/security-flow/step-4/create/keyPoints" method="post">
@csrf
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Key Deal Points</h5>
    </div>
    <div class="card-content">
        <form>
            <h5>Enter Key Points</h5>
            <p>Cut and paste key deal points from your PPM or offering memerandum. Enter up to 5 key deal points, starting each new deal point with a bullet or astrix.</p>
            <textarea name="key-point" class="textarea-large">{{ isset($data['key-point']) ? $data['key-point'] : '' }}</textarea>
            <div class="row">
                <div class="col-xs-12">
                    <div class="content-footer">
                        <div class="footer-button-next"><input type="submit" value="Next"></div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
</form>
@endsection