@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 mb-2">
            <passport-clients></passport-clients>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <passport-authorized-clients></passport-authorized-clients>
        </div>
    </div>
    <div class="row">
        <div class="col-12 mb-2">
            <passport-personal-access-tokens></passport-personal-access-tokens>
        </div>
    </div>
</div>
@endsection
