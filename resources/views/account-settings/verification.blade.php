@extends('layouts.panes')
@section('title', "Account Settings -> Account Verification")

@section('body')
    <script>
        window.FormBody = @json($form);
    </script>
    <div id="vue-app">
        <form-container></form-container>
    </div>
@endsection