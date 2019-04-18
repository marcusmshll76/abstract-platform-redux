@extends('layouts.panes')
@section('title', "Investor K-1s > Investor Servicing")

@section('body')
    <h1>Investor K-1s</h1>
    <div class="pane">
        <p>Upload Organization’s Prepared K-1, clarify the K-1s year, and then choose a date for our team to email this deal’s K-1 to ALL positions tied to the deal.</p>
        <div class="frame">
            <div class="inner">
                <div class="left">
                    <img src="/img/nav/upload-btn.png">
                    <fieldset>
                        <label>K-1 Year</label>
                        <input type="text">
                    </fieldset>
                </div>
                <div class="right">
                    <p>You can choose a date at least 2 days after you upload your K-1.  Abstract will email this deal’s K-1 to ALL posiitions tied to
the deal.</p>
                    <fieldset>
                        <label>Send Date</label>
                        <input type="text">
                    </fieldset>
                </div>
            </div>
            <div class="nav">
                <img src="/img/nav/bottom-nav.png">
            </div>
        </div>
        <div class="action">
            <a class="button">Save</a>
        </div>
    </div>
@endsection