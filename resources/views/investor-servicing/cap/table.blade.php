@extends('investor-servicing.cap.main-template')
@section('title', "Cap Table > Investor Servicing")

@section('body')
<div class="card margin-top-m">
    <div class="card-title blue">
        <h5>Cap Table Management</h5></div>
    <div class="card-content">
        <h5>Real Time Investor Cap Table</h5>
        <p>Download a PDF or CSV file below, if your cap table has changed, please upload a new one and we will contact you as soon as it has been re-approved and updated in our system.</p>
        <div class="card grey margin-top-m">
            <div class="card-content">
                <div class="row">
                    <div class="col-xs-12 col-sm-4">
                        <div class="card">
                            <div class="card-title blue remove-list-height">
                                <h5>Ownership Allocation for {{ isset($data) ? $data->name : '' }}</h5></div>
                            <div class="card-content">
                                <!-- type="cap table" -->
                                <pie-chart type="captable" cap="{{ !empty(json_decode($data->captables)) ? $data->captables : '' }}" data="{{ isset($data) ? json_encode($data) : '' }}"></pie-chart>
                            </div>
                        </div>
                        <p>Has your cap table changed?</p>
                        <uploads-component
                        @if ($type === 'fund')
                            <uploads-component
                                title="Upload New Cap Table"
                                action="/files"
                                elname="file"
                                scope="private"
                                field="fund-cap-property"
                                path="/ownership/"
                                multi="no"
                                section="captable"
                                type="text"
                                refresh="true">
                            </uploads-component>
                        @else
                            <uploads-component
                                title="Upload New Cap Table"
                                action="/files"
                                elname="file"
                                scope="private"
                                field="cap-property"
                                path="/ownership/"
                                multi="no"
                                section="captable"
                                type="text"
                                refresh="true">
                            </uploads-component>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-8">
                        <div class="card">
                            <div class="card-title blue">
                                <h5>Investor Cap Table</h5></div>
                            <table class="rwd-table">
                                <tbody>
                                    <tr class="head-row">
                                        <th>Investor Name</th>
                                        <!-- <th>Entity Name if Applicable</th> -->
                                        <th>% Held</th>
                                        <!-- <th>Digital Securities Held</th>
                                        <th>Price Per</th>
                                        <th>Value</th> -->
                                    </tr>
                                    @if (isset($data->fn))
                                    <tr>
                                        <td data-th="Investor Name">{{ $data->fn.  ' '  .$data->ln }}</td>
                                        <!-- <td data-th="Entity Name if Applicable"></td> -->
                                        <td data-th="% Held">{{ $data->ow }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($data->fn1))
                                    <tr>
                                        <td data-th="Investor Name">{{ $data->fn1.  ' '  .$data->ln1 }}</td>
                                        <!-- <td data-th="Entity Name if Applicable"></td> -->
                                        <td data-th="% Held">{{ $data->ow1 }}</td>
                                    </tr>
                                    @endif
                                    @if (isset($data->fn2))
                                    <tr>
                                        <td data-th="Investor Name">{{ $data->fn2.  ' '  .$data->ln2 }}</td>
                                        <!-- <td data-th="Entity Name if Applicable"></td> -->
                                        <td data-th="% Held">{{ $data->ow2 }}</td>
                                        <!-- <td data-th="Digital Securities Held">45,000,000</td>
                                        <td data-th="Price Per">$0.1</td>
                                        <td data-th="Value">$450,000</td> -->
                                    </tr>
                                    @endif
                                    @if (isset($data->captables))
                                        @foreach (json_decode($data->captables)->original->response->rows as $cap)
                                            @if (!empty($cap))
                                                <tr>
                                                    @foreach ($cap as $key => $m)
                                                        @if ($key < 2)
                                                            @if ($key == 1) 
                                                                <td>{{ $m ? sprintf("%.2f%%", $m * 100) : $m }}</td>
                                                            @else
                                                                <td>{{ $m }}</td>
                                                            @endif
                                                        @endif
                                                    @endforeach
                                                </tr>
                                            @endif
                                        @endforeach
                                    @endif
                                    
                                </tbody>
                            </table>
                        </div>
                        <div class="row margin-top-m">
                            <div class="col-xs-12 col-sm-6">
                                <div class="btn full-width">PDF</div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                            @if ($type === 'fund')
                                <file-preview
                                    iname="filebutton"
                                    scope="private"
                                    user="{{Auth::id()}}"
                                    field="fund-cap-property"
                                    path="/ownership/"
                                    title="CSV">
                                </file-preview>
                            @else
                                <file-preview
                                    iname="filebutton"
                                    title="CSV"
                                    scope="private"
                                    user="{{Auth::id()}}"
                                    field="cap-property"
                                    path="/ownership/">
                                </file-preview>
                            @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="content-footer">
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
                                <a href="{{'/investor-servicing/distributions/'. $type. '/'.strtolower(str_random(100)). '/' .$id }}" class="btn color-white">Next</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection