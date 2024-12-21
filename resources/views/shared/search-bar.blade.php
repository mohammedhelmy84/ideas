
    <div class="card mb-2">
        <div class="card-header">
            <div class="d-flex justify-content-between">
                <div>
                    <form action="{{route('dashboard')}}" method="GET">
                        @method('GET')
                        @csrf
                        <input type="text" name="search" placeholder="Search">
                        <button class="btn btn-danger my-2 btn-sm ms-2">Search</button>
                    </form>
                </div>
            </div>
        </div>
        <div class="card-body">

        </div>
    </div>

