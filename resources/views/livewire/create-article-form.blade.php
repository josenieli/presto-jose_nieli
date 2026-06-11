@if (session()->has('message'))
    <div class="alert alert-success text-center shadow-sm rounded-3 my-4">
        {{ session('message') }}
    </div>
@endif

<form class="container my-5" wire:submit="save">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-dark text-white text-center py-4">
                    <h2 class="mb-0 fw-bold">Crea il tuo articolo</h2>
                </div>

                <div class="card-body p-4 p-md-5 bg-body-tertiary">
                    <div class="row g-4">
                        <div class="col-12">
                            <label for="title" class="form-label fw-semibold">Titolo</label>
                            <input
                                type="text"
                                id="title"
                                wire:model.blur="title"
                                class="form-control form-control-lg @error('title') is-invalid @enderror"
                            >
                            @error('title')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="description" class="form-label fw-semibold">Descrizione</label>
                            <textarea
                                id="description"
                                rows="6"
                                wire:model.blur="description"
                                class="form-control @error('description') is-invalid @enderror"
                            ></textarea>
                            @error('description')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="price" class="form-label fw-semibold">Prezzo</label>
                            <div class="input-group">
                                <input
                                    type="text"
                                    id="price"
                                    wire:model.blur="price"
                                    class="form-control @error('price') is-invalid @enderror"
                                >
                                <span class="input-group-text">€</span>
                            </div>
                            @error('price')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="category" class="form-label fw-semibold">Categoria</label>
                            <select
                                id="category"
                                wire:model.blur="category"
                                class="form-select @error('category') is-invalid @enderror"
                            >
                                <option value="" disabled selected>Seleziona una categoria</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                            @error('category')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="col-12">
                            <label for="temporary_images" class="form-label fw-semibold">Immagini</label>
                            <input
                                id="temporary_images"
                                type="file"
                                wire:model.live="temporary_images"
                                multiple
                                class="form-control shadow-sm @error('temporary_images.*') is-invalid @enderror"
                            >
                            @error('temporary_images.*')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                            @error('temporary_images')
                                <p class="fst-italic text-danger small mt-2 mb-0">{{ $message }}</p>
                            @enderror
                        </div>

                        @if (!empty($images))
                            <div class="col-12">
                                <p>Photo preview:</p>

                                <div class="row border border-4 border-success rounded shadow py-4">
                                    @foreach ($images as $key => $image)
                                        <div class="col d-flex flex-column align-items-center my-3">
                                            <div
                                                class="img-preview mx-auto shadow rounded"
                                                style="background-image: url('{{ $image->temporaryUrl() }}');"
                                            ></div>

                                            <button
                                                type="button"
                                                class="btn mt-1 btn-danger"
                                                wire:click="removeImage({{ $key }})"
                                            >
                                                X
                                            </button>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div class="col-12 pt-2">
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg rounded-3 shadow-sm">
                                    Crea
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>