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
            
            <div class="card grey card-black margin-top-m">
                <div class="card-content">
                    <!-- <div class="row margin-top-l">
                        <div class="col-xs-12 col-sm-4">
                            <uploads-component 
                                type="single"
                                action="/files"
                                elname="image"
                                scope="private"
                                title="Upload Photo"
                                path="/principles/">
                            </uploads-component>
                        </div>
                        <div class="col-xs-12 col-sm-8">
                            <p class="no-margin-top">Principle Bio</p>
                            <textarea name="principle-bio">{{ isset($data['principle-bio']) ? $data['principle-bio'] : '' }}</textarea>
                            <div class="row">
                                <div class="col-xs-12 col-sm-6">
                                    <p>Principle Full Name</p><input name="principle-full-name" value="{{ isset($data['principle-full-name']) ? $data['principle-full-name'] : '' }}" type="text">
                                </div>
                                <div class="col-xs-12 col-sm-6">
                                    <p>Principle Title</p><input name="principle-title" value="{{ isset($data['principle-title']) ? $data['principle-title'] : '' }}" type="text">
                                </div>
                            </div>
                            <div class="btn small margin-top-m">+ Add Principle</div>
                        </div>
                    </div> -->
                    <principal-form></principal-form>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content-footer">
                                <div class="footer-button-next"><input type="submit" value="Next"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection