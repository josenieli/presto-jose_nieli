<div class="card mx-auto mb-4 shadow rounded-4 overflow-hidden text-center border border-2" style="width: 18rem;">
    <img src="{{$article->images->isNotEmpty() ? Storage::url($article->images->first()->path) : 'https://picsum.photos/200'}}"
        class="card-img-top object-fit-cover"
        alt="Immagine dell'articolo {{ $article->title }}">

    <div class="card-body p-4">
        <h4 class="card-title fw-bold mb-1">{{ $article->title }}</h4>
        <h6 class="card-subtitle text-body-secondary fw-normal mb-4">{{ $article->price }}</h6>

        <div class="d-grid gap-2">
            <a href="{{ route('article.show', compact('article')) }}" class="btn btn-primary rounded-pill">
                Dettaglio
            </a>
            <a href="{{ route('byCategory', ['category' => $article->category]) }}" class="btn btn-outline-secondary rounded-pill">
                {{ $article->category->name }}
            </a>
        </div>
    </div>
</div>