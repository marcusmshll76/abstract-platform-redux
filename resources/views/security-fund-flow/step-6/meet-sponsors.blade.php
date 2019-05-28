@extends('security-fund-flow.step-6.main-template')
@section('title', $title )

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Meet the Sponsors</h5>
    </div>
    <div class="card-content">
        <form action="/security-fund-flow/step-6/create/meetSponsors" method="post">
        @csrf
            <h5>Team is Everything</h5>
            <p>Share the bios and backgrounds of your key team members. Let the investors know they’re in good hands!</p>
            
            <div class="card grey card-black margin-top-m">
                <div class="card-content">
                    <principal-form next="yes" url="security-fund-flow/step-6/create/meetSponsors" data="{{ json_encode($data) }}"></principal-form>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection