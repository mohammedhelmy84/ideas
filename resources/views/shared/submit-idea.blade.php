@auth()
<div class="card my-2">
<div class="card-header">
<div class="card-body">
<div class="row">
    <form action="{{route('idea.store')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="content" id="idea" cols="100" rows="5"></textarea>
        </div>
        <div class="mb-3">

            <button type="submit" class="btn btn-dark">Share</button>
        </div>
    </form>
</div>
</div>
</div>
</div>
@endauth
@guest()
<h4>Login to share your ideas</h4>
@endguest

