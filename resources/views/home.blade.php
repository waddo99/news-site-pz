@extends('layout.main')

@section('title', 'Home')

@section('content')

    <div class="container-sm mx-auto">
    @foreach($categories as $category)
        <h1>{{ $category->description }}</h1>
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3">
        @foreach($category->articles->take(3) as $article)
            @include('_article')
        @endforeach
        </div>
            <hr>
    @endforeach
    </div>
@stop
