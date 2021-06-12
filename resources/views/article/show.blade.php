@extends('layout.main')

@section('title', 'Home')

@section('content')

    @include('layout._flash')

    <div class="container-sm mx-auto" style="max-width: 1080px">
        <div class ="row">
            <h1 class="fw-bold text-center my-2">{{ $article->title }}</h1>
            <p class="fs-6 text-secondary text-center">Last updated: {{ $article->updated_at->format('d.m.Y. H:i')  }}<br />
                Author: {{ $article->owner->name }}</p>
        </div>
        @if(Auth::check() && $isOwner)
            <div class="row justify-content-right mb-3">
                <div class="col text-end">
                    <a class="btn btn-success" href="{{ route('article.edit', [ 'article' => $article->id ]) }}"
                       role="button" id="newBtn">
                        <i class="fas fa-edit"></i>
                        Edit
                    </a>
                </div>
            </div>
        @endif
        <div class="row justify-content-sm-center my-3">
                <img class="img-fluid pop" src="{{ asset('storage') . '/' .  $article->image_path}}" style="max-width: 700px"/>
        </div>

        <div class=" fs-5 d-flex justify-content-center my-3 mx-5" style="text-align: justify;">
            {!! $article->text !!}
        </div>

    </div>
@stop

@section('script')
    <script>
        $(document).ready(function () {
            $(".alert").delay(5000).slideUp(200, function () {
                $(this).alert('close');
            });
        });
    </script>
@endsection
