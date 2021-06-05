@if (Session::has('success'))
    <div class="row">
        <div class="col">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {!! Session::get('success') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if (Session::has('warning'))
    <div class="row">
        <div class="col">
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
                {!! Session::get('warning') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif

@if (Session::has('danger'))
    <div class="row">
        <div class="col">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {!! Session::get('danger') !!}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    </div>
@endif
