
        <div class="card mb-2 border-dark">
            <div class="card-header">
                <div class="d-flex justify-content-between">
                    @can('delete',$idea)   
                    <div><button class="btn btn-danger btn-sm ms-2">X</button></div>
                    @endcan
                    <div>
                        <form action="{{route('idea.destroy',$idea->id)}}" method="POST">
                            @can('update',$idea)   
                            <a href="{{route('idea.edit',$idea->id)}}">Edit</a>
                            @endcan
                            <a href="{{route('idea.show',$idea->id)}}">More</a>
                            @method('DELETE')
                            @csrf
                        </form>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <h5 class="card-title">Post</h5>
                <p>{{ $idea->created_at->diffForHumans() }}</p>
                <div class="d-flex justify-content-start"><img style="width:100px; height:100px;" class="me-3 avatar-sm rounded-circle" src="{{$idea->user->getImageURL()}}"><strong class="my-5">{{ $idea->user->name }}</strong></div>
                <p class="card-text">{{ $idea->content }}</p>
                 @include('shared.likebutton')   
                                                                                                                                                                                 
            </div>                                          
            <div class="card-body">
                <form action="{{route('idea.comments.store',$idea->id)}}" method="post">
                    @csrf
                      <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Comment</label>
                        <textarea class="form-control" name="content" id="exampleFormControlTextarea1" rows="1" placeholder="Add Comment"></textarea>
                      </div>
                      <div class="row mb-3 align-items-end">
                        <div class="col-2">
                            <button type="submit" class="btn btn-dark btn-sm">Save</button>
                        </div>
                        @auth
         

                        
                        <div class="mt-3">
                            @if (Auth::user()->id !==$idea->user_id)
                            <form method="POST" action="{{route('users.unfollow',$user->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"> UnFollow </button>
                            </form>
                           
                            <form method="POST" action="{{route('users.follow',$user->id)}}">
                                @csrf
                                <button type="submit" class="btn btn-dark btn-sm"> Follow </button>
                            </form>
                            @endif
                        </div>
                     
                        @endauth
                      </div>
                 </form>
            </div>
            <hr>
            <strong class="mb-2">Post Comments</strong>


            @include('shared.comments')
        </div>




