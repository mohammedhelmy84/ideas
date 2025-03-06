
    

    
@forelse ($idea->comments as $comment)
<div class="card-header">
    <div class="d-flex justify-content-between">
        <div><img width="30px" height="30px" class="rounded-circle" src="{{$comment->user->getImageURL()}}"> {{$comment->user->name}}</div>
        <div>
            <span>{{$comment->created_at->diffForHumans()}}</span>
        </div>

    </div>
</div>
<div class="card-body">
    <strong>comment</strong>
    <p class="card-text">{{$comment->content}}</p>
</div>
@empty
<p class="card-text">Not Found</p>
@endforelse
