@extends('layout.app')
@section('content')

<div class="container text-center">
<h4>Share your ideas</h4>

@session('success')
@include('shared.success-message')
@endsession
<div class="row text-center">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="col-12">
    @include('shared.submit-idea')
    </div>
    @session('delete')
    @include('shared.deleted-message')
    @endsession
</div>

<div class="row">
    <div class="col-3">

    </div>
    <div class="col-6">
        @foreach ($ideas as $idea)
        @include('shared.idea-card')
        @endforeach
    </div>
    <div class="col-3">
        @include('shared.search-bar')
    </div>
</div>

{!! $ideas->withQueryString()->links('pagination::bootstrap-5') !!}
</div>
@endsection

