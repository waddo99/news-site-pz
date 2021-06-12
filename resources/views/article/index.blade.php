@extends('layout.main')

@section('title', 'Articles')

@section('content')

    <h2>Articles</h2>

    @include('layout._flash')

    <div class="row justify-content-left mb-3">
        <div class="col-4">
            <a class="btn btn-success" href="{{ route('article.create') }}" role="button" id="newBtn">
                <i class="fas fa-plus-square"></i>
                New Article
            </a>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col col-12">
            <table id="articles" class="table table-striped table-bordered table-hover">
                <thead class="table-light">
                <tr>
                    <th width="15%">Article Title</th>
                    <th width="5%">Category</th>
                    <th>Summary</th>
                    <th width="10%">Updated Date</th>
                    <th width="10%">Created Date</th>
                    <th width="5%">Activity Status</th>
                    <th width="10%">Owner</th>
                    <th width="5%">Preview</th>
                    <th width="5%">Edit</th>
                    <th width="5%">Delete</th>
                </tr>
                </thead>
                <tbody>
                @foreach($articles as $article)
                    <tr  @if($article->active == 0) class="table-danger" @endif>
                        <td>{{$article->title}}</td>
                        <td>{{$article->category->description}}</td>
                        <td>{!! $article->summary !!}</td>
                        <td>{{$article->updated_at}}</td>
                        <td>{{$article->created_at}}</td>
                        <td class="text-center">
                            @if($article->active == 1)
                                <i class="fas fa-check text-success"></i>
                            @else
                                <i class="fas fa-times text-danger"></i>
                            @endif
                        </td>
                        <td>{{$article->owner->name}}</td>
                        <td>
                            <a href="{{ route('article.show', [ 'article' => $article->id, 'force' => 1]) }}" class="btn btn-secondary form-control" title="Preview"><i
                                    class="fas fa-search"></i> </a>
                        </td>
                        <td>
                            <a href="{{ route('article.edit', [ 'article' => $article->id]) }}" class="btn btn-primary form-control" title="Edit"><i
                                    class="fas fa-edit"></i> </a>
                        </td>
                        <td>
                            <a href="javascript:void(0);"
                               class="btn btn-danger form-control"
                               title="Delete"
                               onclick="if(confirm('Are you sure?')){$(this).find('form').submit();}">
                                <form action="{{ route('article.destroy', [ 'article' => $article->id]) }}"
                                      method="post">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE">
                                </form>
                                <i class="fas fa-trash-alt"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            var dataTables = $('#articles').DataTable({
                order: [[ 2, 'desc' ], [0, 'asc']],
                pageLength: 25
            });

            $(".alert").delay(5000).slideUp(200, function () {
                $(this).alert('close');
            });
        });
    </script>
@endsection
