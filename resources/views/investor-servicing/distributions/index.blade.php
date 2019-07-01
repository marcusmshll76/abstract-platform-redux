@extends('investor-servicing.distributions.main-template')
@section('title', "Distributions > Investor Servicing")
<style>.pad-bottom-open {padding-bottom: 40px;}</style>

@section('body')
@if( isset( $success ) && $success )
<popup-component
    title="Please Wait While We Update Your Distributions "
    type="recurring"
    user="{{ Auth::id() }}"
    info="<h5>You will be able to view this document in excel or CSV form shortly.  Within 48 hours we will post the distributions via PDF to  your Investors Servicing Portal for their viewing. </h5>"
    action="Got It!"
    url="{{'/investor-servicing/distributions/preview/'. $type. '/'.strtolower(str_random(100)). '/' .$id }}">
</popup-component>
@endif
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Distribution History</h5>
    </div>
    <div class="card-content">
        @if(sizeof($history) > 1)
            <p>This property has no historical distributions.</p>
        @else
            <table class="rwd-table">
                <thead>
                    <th>Name</th>
                    <th>Date</th>
                    <th>Yield Period</th>
                    <th>Total Amount</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach($history as $h)
                        <tr>
                            <td>{{$h->name}}</td>
                            <td>{{$h->date}}</td>
                            <td>{{$h->yield}}</td>
                            <td>{{$h->totalAmount}}</td>
                            <td><a href="{{Storage::url($h->file)}}">Download CSV</a> | <a href="/investor-servicing/distributions/nacha/{{$h->type}}/{{rand()}}/{{$h->id}}">Download NACHA</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>New Distribution</h5></div>
    <div class="card-content">
        <p>Fill in the Pro Rata data inputs, then hit submit to preview or immediately download a CSV file.  Abstract will alert you within 48 hours when distributions reports are uploaded to the Investor Servicing Portal and ready for your investors to view.</p>
        <div class="card grey pad-bottom-open margin-top-m">
            <div class="card-content">
                <form action="/distributions/create/new" method="post">
                @csrf
                <input type="hidden" name="did" value="{{$id}}" />
                <input type="hidden" name="tid" value="{{$type}}" />
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 text-center">
                            <div class="distribution-icon-container">
                                <div class="row">
                                    <div class="col-xs-12">
                                        <div class="square-icon"><img src="/img/icon-water-tap.svg"></div>
                                        <p>Allocate Pro-Rata</p>  
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-9">
                            <div class="content-form">
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Description / Name</p>
                                        @if($errors->has('name'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('name') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['name']) ? $data['name'] : '' }}" name="name">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Date</p>
                                        @if($errors->has('date'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('date') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['date']) ? $data['date'] : '' }}" name="date">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p class="no-margin-top">Yield Period</p>
                                        @if($errors->has('yield'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('yield') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['yield']) ? $data['yield'] : '' }}" name="yield">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Cash Flow Type</p>
                                        @if($errors->has('cashFlowtype'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('cashFlowtype') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['cashFlowtype']) ? $data['cashFlowtype'] : '' }}" name="cashFlowtype">
                                    </div>
                                    <div class="col-xs-12 col-sm-4">
                                        <p>Total Amount</p>
                                        @if($errors->has('totalAmount'))
                                            <br/>
                                            <small class="error-small"><em>*</em> <span> {{ $errors->first('totalAmount') }} </span></small>
                                        @endif
                                        <input type="text" value="{{ isset($data['totalAmount']) ? $data['totalAmount'] : '' }}" name="totalAmount">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="content-footer">
                                <div class="row center-xs margin-top-m">
                                    <input type="submit" value="Submit">
                                </div>
                                <br/>
                                <div class="row center-xs">
                                    <div class="col-xs-12 col-sm-6 col-md-4">
                                        <div class="content-footer-step">
                                            <div class="row">
                                                <div class="col-xs">
                                                    <div class="step-item active"></div>
                                                </div>
                                                <div class="col-xs">
                                                    <div class="step-item"></div>
                                                </div>
                                                <div class="col-xs">
                                                    <div class="step-item"></div>
                                                </div>
                                                <div class="col-xs">
                                                    <div class="step-item"></div>
                                                </div>
                                                <div class="col-xs">
                                                    <div class="step-item"></div>
                                                </div>
                                            </div>
                                            <div class="step-divider"></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="footer-button-next">
                                    <input type="submit" value="Next">
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <br/><br/><br/>
        </div>
    </div>
</div>
@endsection
<!-- @todo Ben 
/dashboard/investor-servicing/distributions-v2-view-CSV/
-->