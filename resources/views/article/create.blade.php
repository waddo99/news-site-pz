@extends('layout.main')

@section('content')

    <h2>Add an Article</h2>

    @include('layout._back')
    @include('layout._errors')

    <form method="POST" action="{{ route('article.store') }}" enctype="multipart/form-data">
        @csrf

        @include('article._form')
    </form>

@endsection
