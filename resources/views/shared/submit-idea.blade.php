
<div class="row">
    <form action="{{route('idea.create')}}" method="post">
        @csrf
        <div class="mb-3">
            <textarea name="idea" id="idea" cols="50" rows="3"></textarea>
        </div>
        <div class="mb-3">

            <button type="submit" class="btn btn-dark">Share</button>
        </div>
    </form>
</div>

