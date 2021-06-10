@extends('layout.main')

@section('content')

    <h2>Log</h2>

    @include('log._search')

    <div class="table-responsive">
        <table class="table table-striped table-bordered table-condensed table-hover">
            <tr>
                <th width="15%">Time</th>
                <th>Object ID</th>
                <th>Object Type</th>
                <th width="15%">User</th>
                <th width="39%">Action</th>
                <th width="29%">Comment</th>
            </tr>

            <?php $date = ''; ?>

            @foreach($logs as $row)
                @if($date != substr($row["created_at"], 0, 11))
                    <tr>
                        <th colspan="6">{!! substr($row["created_at"], 0, 11)  !!}</th>
                    </tr>
                @endif
                <tr>
                    <td>{!! $row["created_at"] !!}</td>
                    <td>{!! $row["article_id"] !!}</td>
                    <td>
                            {!! $row->user->name !!}

                    </td>
                    <td>{!! $row["action"] !!}</td>
                    <td>{!! $row["comment"] !!}</td>
                </tr>
                <?php $date = substr($row["created_at"], 0, 11); ?>
            @endforeach
        </table>
    </div>

    <div class="row">
        {{ $logs->appends(['search' => $search])->links() }}
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var dataTables = $('#types').DataTable({
                "order": [[0, "asc"]],
            });

            $(".alert").delay(5000).slideUp(200, function() {
                $(this).alert('close');
            });
        });

    </script>
@endsection
