<div class="card">
    <div class="px-3 pt-4 pb-2">
        <form action="{{route('users.update',$user->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="d-flex align-items-center justify-content-between">
            <div class="d-flex align-items-center">
                <img style="width:150px" class="me-3 avatar-sm rounded-circle"
                    src="{{$user->getImageURL()}}" alt="Mario Avatar">
                <div>
                    <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                    @error('name')
                        <span class="text-dabger fs-6">{{ $message }}</span>
                    @enderror
                </div>
            </div>
            <div>
                @auth
                    @if (Auth::id() === $user->id)
                        <a href="{{ route('users.show', $user->id) }}">View</a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="mt-4">
            <lable>Profile Picture</lable>
            <input type="file" class="form-control" name="image">
            @error('image')
               <span class="text-dabger fs-6">{{ $message }}</span>
            @enderror
        </div>
        <div class="px-2 mt-4">
            <h5 class="fs-5"> Bio : </h5>
            <div class="mb-3">
                <label for="exampleFormControlTextarea1" class="form-label">Bio</label>
                <textarea class="form-control" name="bio" id="exampleFormControlTextarea1" rows="3" placeholder="Add Bio">{{ $user->bio }}</textarea>
                @error('bio')
                    @include('shared.error-message')
                @enderror
                <button class="btn btn-dark btn-sm mt-2">Save</button>
            </div>
            <div class="d-flex justify-content-start">
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-user me-1">
                    </span> 0 Followers </a>
                <a href="#" class="fw-light nav-link fs-6 me-3"> <span class="fas fa-brain me-1">
                    </span> {{ $user->idea()->count() }} </a>
                <a href="#" class="fw-light nav-link fs-6"> <span class="fas fa-comment me-1">
                    </span> {{ $user->comment()->count() }} </a>
            </div>
        </div>
    </form>
    </div>
</div>
<hr>
