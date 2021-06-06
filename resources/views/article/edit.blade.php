@extends('layout.main')

@section('content')

    @if(!is_null($article))
        <h2>Edit a Site</h2>

        @include('layout._back')
        @include('layout._errors')

        <form method="POST" action="{{ route('article.update', [ 'article' => $article->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @include('article._form')
        </form>
    @else
        <div class="alert alert-danger" role="alert">
            <h4 class="alert-heading">Permission denied!</h4>
            <p class="mb-0">You are not the owner of this article!</p>

        </div>
    @endif

@endsection
