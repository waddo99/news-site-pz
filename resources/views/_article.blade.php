<div class="col p-1 mx-3" style="width: 367px;">
    <a href="{{ route('article.show', [ 'article' => $article->id ]) }}" class="link text-secondary text-decoration-none">
        <img class="img-fluid mw-100 pop" src="{{ asset('storage') . '/' .  $article->image_path}}" style="width: 367px;"/>
        <p class="fs-4 fw-bold">{{ $article->title }}</p>
    </a>
    {{ $article->summary}}
</div>
