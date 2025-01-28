@extends('layout.app')
@section('navbar')
@include('layout.nav')
@endsection
@section('content')
    <div class="row my-3">
        <div class="col-3">
            @include('shared.left-sidebar')
        </div>
        <div class="col-6">
                @include('shared.user-edit-card')
            <hr>
            @forelse ($ideas as $idea)
                @include('shared.idea-card')
            @empty
                <p class="text-center my-3">No Results Found.</p>
            @endforelse
                {{ $ideas->withQueryString()->links('pagination::bootstrap-5') }}
        </div>
        <div class="col-3">
            @include('shared.search-bar')
            @include('shared.follow-box')
        </div>
    </div>
@endsection
