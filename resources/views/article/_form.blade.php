@csrf

@if(isset($article->id))
    <input type="hidden" name="id" value="{{ $article->id }}"/>
@endif


<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Title</label>
    </div>
    <div class="col-9 my-1">
        <div>
            <input class="form-control @if($errors->has('title'))is-invalid @endif"
                   type="text"
                   name="title"
                   id="title"
                   value="{{ old('title') ?? $article->title ?? '' }}"
            />
        </div>
    </div>
</div>


<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Category</label>
    </div>
    <div class="col-9 my-1">

        <select name="category" id="category" class="form-select @if($errors->has('category'))is-invalid @endif">
            @foreach($categories as $id => $name)
                <option value="{{ $id }}" @if(isset($article->active) && ($article->category_id == $id)) selected="selected" @endif>{{ $name }}</option>
            @endforeach
        </select>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Image</label>
    </div>
    <div class="col-9 my-1">
        <div class="my-1" >
            @if(isset($article))
                <img class="img-fluid mw-100 pop my-1" src="{{ asset('storage') . '/' .  $article->image_path}}" style="width: 367px;"/>
            @endif
        </div>
        <div class="custom-file">
            <input name="image" id="image" type="file" class="custom-file-input form-control @if($errors->has('image'))is-invalid @endif"/>
        </div>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Summary</label>
    </div>
    <div class="col-9 my-1">
        <textarea
            class="form-control @if($errors->has('summary'))is-invalid @endif"
            name="summary"
            id="summary"
        >{{ old('summary') ?? $article->summary ??  '' }}</textarea>
    </div>
</div>

<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Text</label>
    </div>
    <div class="col-9 my-1">
        <textarea
            class="form-control @if($errors->has('text'))is-invalid @endif"
            name="text"
            id="text"
        >{{ old('text') ?? $article->text ?? '' }}</textarea>
    </div>
</div>


<div class="row justify-content-md-center">
    <div class="col-1 fw-bold fs-5">
        <label>Active</label>
    </div>
    <div class="col-9 my-1">
        <input
            type="checkbox"
            name="active"
            id="active"
            value="active"
            @if(isset($article->active) && ($article->active == 1))checked="checked" @endif
            data-toggle="toggle" data-onstyle="outline-success" data-offstyle="outline-danger" data-size="sm">
    </div>
</div>


<div class="row justify-content-md-center">
    <div class="col-10 my-5">
        <a href="javascript:history.back();">
            <button type="button" name="cancel" class="btn btn-warning">
                <i class="fas fa-times"></i> Cancel
            </button>
        </a>

        <button type="submit" name="submit" class="btn btn-success">
            <i class="fas fa-check"></i> Submit
        </button>
    </div>
</div>


@section('body_script')
    <script>
        // Replace the <textarea id="body"> and <textarea id="excerpt"> with a Froala
        // instance.

        var editor1 = new FroalaEditor('#summary', { heightMax: 50 });
        var editor2 = new FroalaEditor('#text', { height: 300 });

        $('#active').bootstrapToggle({
            on: 'Show',
            off: 'Hide'
        });

        $(document).ready(function () {
            $("#image").on("change", function () {
                var fileName = $(this).val().split("\\").pop();
                $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
            });
        });

    </script>
@stop
