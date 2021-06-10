@csrf

<div class="row justify-content-md-center">
    <div class="col-2">
        <label>E-mail</label>
    </div>
    <div class="col-8">
        <div>
            <input class="form-control"
                   type="text"
                   name="email"
                   id="email"
                   value="{{ $user->email }}"
                   readonly/>
        </div>
    </div>

</div>

<div class="row justify-content-md-center">
    <div class="col-2">
        <label>Name</label>
    </div>
    <div class="col-8">
        <div>
            <input class="form-control"
                   type="text"
                   name="name"
                   id="name"
                   value="{{ $user->name }}"
                   readonly/>
        </div>
    </div>

</div>

<div class="row justify-content-md-center">
    <div class="col-2">
        <label>Role</label>
    </div>
    <div class="col-8">

        <select name="role_id" id="role_id" class="custom-select">
            @foreach($roles as $id => $name)
                <option value="{{ $id }}" @if(strcmp($id, $user->role->first()->id) == 0) selected="selected" @endif>{{ $name }}</option>
            @endforeach
        </select>
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
