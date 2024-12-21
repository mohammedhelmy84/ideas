
<div>
    <a href="{{route('idea.show',$idea->id)}}">Add Comment</a>
 </div>
@foreach ($idea->comments as $comment)
<div class="card-header">
    <div class="d-flex justify-content-between">
        <div>&#128578;</div>
        <div>
            <span>{{$comment->created_at}}</span>
        </div>

    </div>
</div>
<div class="card-body">
    <strong>{{$comment->id}}</strong>
    <p class="card-text">{{$comment->content}}</p>
</div>
@endforeach
