<x-layout>
    @if (session()->has('message'))
        <div class="alert alert-success text-center m-0">
            {{ session('message') }}
        </div>
    @endif

    <div class="container-fluid text-center bg-body-tertiary">
        <div class="row vh-100 justify-content-center align-items-center">
            <div class="col-12">
                <h1 class="display-4">
                    Presto.it
                </h1>

                <div class="my-3">
                    @auth
                        <a href="{{ route('create.article') }}" class="btn btn-dark">Pubblica un articolo</a>
                    @endauth
                </div>
            </div>
        </div>
    </div>

    <section class="container pb-5">
        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-2">
            <div>
                <h2 class="fw-bold mb-1">Articoli recenti</h2>
                <p class="text-muted mb-0">Gli ultimi 6 articoli approvati dai revisori.</p>
            </div>
        </div>

        <div class="row g-4">
            @forelse ($articles as $article)
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card h-100 border shadow-sm rounded-4 overflow-hidden">
                        <img src="https://picsum.photos/seed/{{ $article->id }}/600/400"
                            class="card-img-top img-fluid object-fit-cover" alt="{{ $article->title }}">

                        <div class="card-body d-flex flex-column p-4">
                            <div class="mb-2">
                                <span class="badge text-bg-light border">Articolo approvato</span>
                            </div>

                            <h5 class="card-title fw-bold">{{ $article->title }}</h5>

                            <p class="card-text text-muted flex-grow-1">
                                {{ \Illuminate\Support\Str::limit($article->description, 90) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="fs-5 fw-bold text-body">{{ $article->price }} €</span>
                                <a href="{{ route('article.show', compact('article')) }}"
                                    class="btn btn-outline-secondary">
                                    Dettagli
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="p-5 text-center bg-body-tertiary rounded-4 border shadow-sm">
                        <h3 class="h4 fw-bold mb-2">Nessun articolo disponibile</h3>
                        <p class="text-muted mb-0">
                            Al momento non ci sono articoli approvati da mostrare in homepage.
                        </p>
                    </div>
                </div>
            @endforelse
        </div>
    </section>
</x-layout>
