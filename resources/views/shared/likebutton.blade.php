<div>
    @auth()
    @if(Auth::user()->likesIdea($idea))
    <form action="{{route('ideas.like',$idea->id)}}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6 border-0 bg-transparent">
            <span><i class="las la-thumbs-up" style="color:cornflowerblue; font-size:16px;"></i>{{ $idea->likes_count }}</span>
        </button>
    </form>
   @else
    <form action="{{route('ideas.unlike',$idea->id)}}" method="POST">
        @csrf
        <button type="submit" class="fw-light nav-link fs-6 border-0 bg-transparent">
            <span><i class="las la-thumbs-up" style="color:cornflowerblue; font-size:16px;"></i>{{ $idea->likes_count }}</span>
        </button>
    </form>
    @endif
    @endauth
    
    @guest
    <a href="{{route('login')}}" class="fw-light nav-link fs-6 border-0 bg-transparent">
        <span><i class="las la-thumbs-up" style="color:cornflowerblue; font-size:16px;"></i>{{ $idea->likes_count }}</span>
    </a>
    @endguest
</div>