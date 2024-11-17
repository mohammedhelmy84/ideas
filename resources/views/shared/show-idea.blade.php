@extends('layout.app')
@section('content')
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
            <span><i class="las la-thumbs-up" style="color:cornflowerblue; font-size:16px;"></i>{{ $idea->likes }}</span>
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
