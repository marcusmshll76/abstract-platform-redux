@extends('security-flow.step-6.main-template')
@section('title', $title )

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Meet the Sponsors</h5>
    </div>
    <div class="card-content">
        <form action="/security-flow/step-6/create/meetSponsors" method="post">
        @csrf
            <h5>Team is Everything</h5>
            <p>Share the bios and backgrounds of your key team members. Let the investors know they’re in good hands!</p>
            <principal-form 
                next="yes" 
                url="security-flow/step-6/create/meetSponsors" 
                data="{{ isset($data['principles']) ? $data['principles'] : '' }}"
                user="{{Auth::id()}}"
                map="security-flow-files">
            </principal-form>
        </form>
    </div>
</div>
<!-- /account-settings/verification/principles/create -->
@endsection