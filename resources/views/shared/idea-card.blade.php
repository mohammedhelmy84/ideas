
        <div class="card mb-2">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    <div>&#128578; {{ $idea->id }}</div>
                    <div>
                        <form action="{{route('idea.destroy',$idea->id)}}" method="POST">
                            <a href="{{route('idea.edit',$idea->id)}}">Edit</a>
                            <a href="{{route('idea.show',$idea->id)}}">More</a>
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm ms-2">X</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Post</h5>
                <span><i class="las la-thumbs-up" style="color:cornflowerblue; font-size:16px;"></i>{{ $idea->likes }}</span>
                <p>{{ $idea->created_at }}</p>
                <p class="card-text">{{ $idea->content }}</p>
            </div>
            @include('shared.comments')
        </div>




