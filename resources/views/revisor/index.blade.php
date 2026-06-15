<x-layout>
    @if (session()->has('message'))
        <div class="container mt-4">
            <div class="alert alert-success alert-dismissible fade show shadow-sm text-center" role="alert">
                {{ session('message') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
    @endif

    <div class="container py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-lg-8">
                <div class="bg-body-tertiary rounded-4 shadow-sm border text-center p-4">
                    <h1 class="display-5 mb-0">Revisor dashboard</h1>
                </div>
            </div>
        </div>

        @if (session()->has('last_review_action'))
            <div class="row justify-content-center mb-4">
                <div class="col-12 col-lg-8 text-center">
                    <form action="{{ route('revisor.undo') }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-warning px-4 py-2 fw-bold">
                            Annulla ultima operazione
                        </button>
                    </form>
                </div>
            </div>
        @endif

        @if ($article_to_check)
            <div class="row g-4 align-items-start">
                <div class="col-12 col-lg-7">
                    <div class="row g-3">
                        @forelse ($article_to_check->images as $key => $image)
                            <div class="col-12">
                                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                    <div class="row g-0 align-items-start">
                                        <div class="col-12 col-md-4">
                                            <img src="{{ $image->getUrl(300, 300) }}" class="img-fluid w-100"
                                                alt="Immagine {{ $key + 1 }} dell'articolo {{ $article_to_check->title }}">
                                        </div>

                                        <div class="col-12 col-md-5 ps-md-3">
                                            <div class="card-body">
                                                <h5>Labels</h5>
                                                @if ($image->labels)
                                                    @foreach ($image->labels as $label)
                                                        #{{ $label }},
                                                    @endforeach
                                                @else
                                                    <p class="fst-italic">No labels</p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-12 col-md-3">
                                            <div class="card-body">
                                                <h5 class="">Ratings</h5>

                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->adult }}"></div>
                                                    </div>
                                                    <div class="col-10">adult</div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->violence }}"></div>
                                                    </div>
                                                    <div class="col-10">violence</div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->spoof }}"></div>
                                                    </div>
                                                    <div class="col-10">spoof</div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->racy }}"></div>
                                                    </div>
                                                    <div class="col-10">racy</div>
                                                </div>

                                                <div class="row justify-content-center">
                                                    <div class="col-2">
                                                        <div class="text-center mx-auto {{ $image->medical }}"></div>
                                                    </div>
                                                    <div class="col-10">medical</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            @for ($i = 0; $i < 6; $i++)
                                <div class="col-6 col-md-4">
                                    <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                                        <img src="https://picsum.photos/200?random={{ $i }}"
                                            alt="Immagine segnaposto" class="img-fluid w-100">
                                    </div>
                                </div>
                            @endfor
                        @endforelse
                    </div>
                </div>

                <div class="col-12 col-lg-5">
                    <div class="card border-0 shadow-sm rounded-4 h-100">
                        <div class="card-body p-4 d-flex flex-column">
                            <h2 class="fw-bold mb-3">{{ $article_to_check->title }}</h2>
                            <h5 class="mb-2">Autore: {{ $article_to_check->user->name }}</h5>
                            <h5 class="mb-2">{{ $article_to_check->price }} €</h5>
                            <h6 class="fst-italic text-muted mb-3">#{{ $article_to_check->category->name }}</h6>
                            <p class="mb-4">{{ $article_to_check->description }}</p>

                            <div class="mt-auto">
                                <div class="d-grid gap-3 d-md-flex">
                                    <form action="{{ route('reject', ['article' => $article_to_check]) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-danger w-100 py-2 fw-bold">
                                            Rifiuta
                                        </button>
                                    </form>

                                    <form action="{{ route('accept', ['article' => $article_to_check]) }}" method="POST"
                                        class="w-100">
                                        @csrf
                                        @method('PATCH')
                                        <button class="btn btn-success w-100 py-2 fw-bold">
                                            Accetta
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="row justify-content-center text-center py-5">
                <div class="col-12 col-lg-8">
                    <div class="card border-0 shadow-sm rounded-4 p-5">
                        <h1 class="fst-italic display-5 mb-4">Nessun articolo da revisionare</h1>
                        <a href="{{ route('home') }}" class="btn btn-success px-4">
                            Torna all'homepage
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</x-layout>