@extends('layout.main')

@section('title', 'Home')

@section('content')

    <div class="container-sm mx-auto" style="max-width: 1080px">
        <h1 class="fw-bold text-center my-2">{{ $article->title }}</h1>
        <p class="fs-6 text-secondary text-center ">Last updated: {{ $article->updated_at->format('d.m.Y. H:i')  }}<p>
        <div class="row justify-content-sm-center my-3">
                <img class="img-fluid pop" src="{{ asset('storage') . '/' .  $article->image_path}}" style="max-width: 700px"/>
        </div>

        <div class=" fs-5 d-flex justify-content-center my-3 mx-5" style="text-align: justify;">
            {!! $article->text !!}
        </div>

    </div>
@stop
