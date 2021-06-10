<div class="well well-sm">
    <form action="{{ route($searchRoute) }}" method="POST">
        @csrf
        <div class="input-group mb-3">
            <input
                    type="text"
                    class="form-control"
                    placeholder="Search..."
                    value="{!! isset($search) ? $search : '' !!}"
                    name="search"
                    id="search"
                    autofocus="autofocus"
            />
            <div class="input-group-append">
                <button class="btn btn-info" type="submit">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </div>
    </form>
</div>
