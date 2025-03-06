@extends('layout.app')
@section('navbar')
@include('layout.nav')
@endsection
@section('content')
@session('success')
@include('shared.success-message')
@endsession

@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
    <div class="card mt-2">
        <div class="card-header">
            <p>&#128204;</p>
            <div class="d-flex justify-content-between">
                <div>&#128578; {{ $idea->id }}</div>
                <div>
                    <a href="{{ route('dashboard') }}" style="font-size:16px; text-decoration:none;">&#128073; Back</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <h5 class="card-title">Post</h5>
               @include('shared.likebutton')
            <p>{{ $idea->created_at }}</p>
            @if ($editing ?? false)
                <div class="row">
                    <form action="{{ route('idea.update',$idea->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <textarea name="content" id="idea" cols="50" rows="3">{{ $idea->content }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-dark">Share</button>
                        </div>
                    </form>
                </div>
            @else
                <p class="card-text">{{ $idea->content }}</p>
            @endif
        </div>
    </div>
@endsection
