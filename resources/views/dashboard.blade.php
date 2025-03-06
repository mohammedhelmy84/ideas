@extends('layout.app')
@section('title')
  dashboard
@endsection
@section('navbar')
@include('layout.nav')
@endsection
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
                @include('shared.left-sidebar')
            </div>
            <div class="col-6">
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

    </div>
@endsection
