@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-2" id="nav">
            <h1>{{$nav['header']}}</h1>
            <ul>
                @foreach( $nav['links'] as $l )
                    <li
                        @if( $l['current'] == true )
                                class="current"
                            @endif
                    >
                        <a href="{{$l['href']}}">{{$l['text']}}</a>
                    </li>
                @endforeach
            </ul>
        </div>
        <div class="col-md-10">
            <div class="row">
                <div class="col-md-12" id="pane-nav">
                    <img src="/img/nav/account-settings.png">
                    <img src="/img/nav/my-properties.png">
                    <img src="/img/nav/investor-servicing-selected.png">
                    <img src="/img/nav/create-digital-security.png">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="body-frame">
                    @yield('body')
                </div>
            </div>
        </div>
    </div>
    <script src="/js/app.js"></script>
@endsection