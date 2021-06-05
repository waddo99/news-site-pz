@extends('layout.main')

@section('content')

    <h2>Edit a Site</h2>

    @include('layout._back')
    @include('layout._errors')

    <form method="POST" action="{{ route('article.update', [ 'article' => $article->id]) }}">
        @method('PUT')
        @include('article._form')
    </form>

@endsection

@section('script')
    <script>
        $(document).ready(function () {
            $(".alert").delay(5000).slideUp(200, function () {
                $(this).alert('close');
            });
        });

    </script>
@endsection
