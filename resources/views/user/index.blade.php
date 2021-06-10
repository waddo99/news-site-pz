@extends('layout.main')

@section('title', 'Editors')
@section('content')

    <div class="cotainer-fuid">
        <div class="row">
            <h2 class="col-5 mx-5 my-3 text-center">Editors</h2>
        </div>
        @include('layout._flash')
        <div class="row justify-content-center">
            <div class="col-7">
                <table id="users" class="table table-striped table-bordered table-hover">
                    <thead class="table-light">
                    <tr>
                        <th width="40%">Name</th>
                        <th width="40%">e-mail</th>
                        <th width="10%">Role</th>
                        <th width="10%">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($users as $user)
                        <tr @if((count($user->role) > 0) && ($user->role->first()->role == 'disabled')) class="table-danger" @endif>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>@if(count($user->role) > 0)
                                    {{ $user->role->first()->label }}
                                @endif
                            </td>
                            <td>
                                <a href="{{ route('user.edit', [ 'user' => $user->id]) }}" class="btn btn-primary" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var dataTables = $('#users').DataTable({
                order: [0, 'asc'],
                pageLength: 25,
                responsive: false
            });

            $(".alert").delay(5000).slideUp(200, function () {
                $(this).alert('close');
            });
        });

    </script>
@endsection
