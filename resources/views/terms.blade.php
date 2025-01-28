@extends('layout.app')
@section('navbar')
@include('layout.nav')
@endsection
@section('content')
<div class="row">
    <div class="col-3">
       @include('shared.left-sidebar')
    </div>
    <div class="col-6">
        
    </div>
    <div class="col-3">
        @include('shared.search-bar')
        @include('shared.follow-box')
    </div>
</div>
@endsection