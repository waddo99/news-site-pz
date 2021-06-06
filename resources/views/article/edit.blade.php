@extends('layout.main')

@section('content')

    <h2>Edit a Site</h2>

    @include('layout._back')
    @include('layout._errors')

    <form method="POST" action="{{ route('article.update', [ 'article' => $article->id]) }}" enctype="multipart/form-data">
        @method('PUT')
        @include('article._form')
    </form>

@endsection
