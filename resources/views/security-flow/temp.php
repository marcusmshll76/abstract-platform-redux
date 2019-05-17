@extends('security-flow.step-2.main-template')
@section('title', $title )

@section('body')
<form action="/account-settings/verification/bio/create" method="post">
@csrf

</form>
@endsection