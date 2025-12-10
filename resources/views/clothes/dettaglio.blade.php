@section('title', $title)
<x-layout>
    <div class="container my-5">
        <!-- Breadcrumb -->
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" class="text-macri">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('collection') }}" class="text-macri">Collezione</a></li>
                <li class="breadcrumb-item active" aria-current="page">{{ $clothe->name }}</li>
            </ol>
        </nav>

        <div class="row">
            <!-- Colonna Immagini -->
            <div class="col-lg-6 mb-4">
                <div class="sticky-top" style="top: 100px;">
                    @if ($clothe->images->isNotEmpty())
                        <!-- Immagine Principale -->
                        <div class="mb-3 border rounded overflow-hidden shadow-sm">
                            <img id="mainImage"
                                src="{{ $clothe->primaryImage ? $clothe->primaryImage->url : $clothe->images->first()->url }}"
                                class="img-fluid w-100" alt="{{ $clothe->name }}"
                                style="max-height: 600px; object-fit: cover;">
                        </div>

                        <!-- Miniature (se ci sono più immagini) -->
                        @if ($clothe->images->count() > 1)
                            <div class="d-flex gap-2 flex-wrap justify-content-center">
                                @foreach ($clothe->images as $image)
                                    <img src="{{ $image->url }}"
                                        class="img-thumbnail cursor-pointer border-2 miniatura-hover"
                                        style="width: 100px; height: 100px; object-fit: cover; cursor: pointer;"
                                        onclick="document.getElementById('mainImage').src='{{ $image->url }}'"
                                        alt="{{ $clothe->name }}">
                                @endforeach
                            </div>
                        @endif
                    @else
                        <!-- Placeholder se non ci sono immagini -->
                        <div class="bg-light rounded d-flex align-items-center justify-content-center border"
                            style="height: 500px;">
                            <div class="text-center">
                                <i class="bi bi-image text-muted" style="font-size: 5rem;"></i>
                                <p class="text-muted mt-3">Immagine non disponibile</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            <!-- Colonna Dettagli -->
            <div class="col-lg-6">
                <div class="ps-lg-4">
                    <!-- Nome Prodotto -->
                    <h1 class="titolo-custom mb-3">{{ $clothe->name }}</h1>

                    <!-- Marca -->
                    @if ($clothe->brand)
                        <p class="text-muted mb-3 fs-5">
                            <i class="bi bi-tag-fill text-macri"></i> {{ $clothe->brand }}
                        </p>
                    @endif

                    <!-- Badge Nuovo -->
                    @if ($clothe->created_at && $clothe->created_at->diffInDays(now()) < 30)
                        <span class="badge bg-success mb-3">
                            <i class="bi bi-stars"></i> Novità
                        </span>
                    @endif

                    <hr class="my-4">

                    <!-- Prezzo -->
                    <div class="mb-4">
                        <h2 class="text-macri mb-0">
                            €{{ number_format($clothe->price, 2, ',', '.') }}
                        </h2>
                    </div>

                    <hr class="my-4">

                    <!-- Descrizione -->
                    @if ($clothe->description)
                        <div class="mb-4">
                            <h5 class="text-dark mb-3">
                                <i class="bi bi-file-text text-macri"></i> Descrizione
                            </h5>
                            <p class="text-muted" style="line-height: 1.8;">
                                {{ $clothe->description }}
                            </p>
                        </div>
                    @endif

                    <!-- Dettagli Tecnici -->
                    <div class="mb-4">
                        <h5 class="text-dark mb-3">
                            <i class="bi bi-info-circle text-macri"></i> Dettagli
                        </h5>
                        <ul class="list-unstyled">
                            @if ($clothe->material)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-macri me-2 mt-1"></i>
                                    <div>
                                        <strong>Materiale:</strong> {{ $clothe->material }}
                                    </div>
                                </li>
                            @endif

                            @if ($clothe->category)
                                <li class="mb-3 d-flex align-items-start">
                                    <i class="bi bi-check-circle-fill text-macri me-2 mt-1"></i>
                                    <div>
                                        <strong>Categoria:</strong> {{ $clothe->category }}
                                    </div>
                                </li>
                            @endif

                            <li class="mb-3 d-flex align-items-start">
                                <i class="bi bi-check-circle-fill text-macri me-2 mt-1"></i>
                                <div>
                                    <strong>Codice:</strong> #{{ str_pad($clothe->id, 5, '0', STR_PAD_LEFT) }}
                                </div>
                            </li>
                        </ul>
                    </div>

                    <hr class="my-4">

                    <!-- Call to Action -->
                    <div class="alert alert-info border-0 shadow-sm">
                        <h5 class="alert-heading">
                            <i class="bi bi-shop"></i> Disponibile in negozio
                        </h5>
                        <p class="mb-0">
                            Vieni a trovarci per provare questo capo e scoprire tutte le taglie e colori disponibili!
                        </p>
                    </div>

                    <!-- Bottoni Azioni -->
                    <div class="d-flex flex-wrap gap-2 mt-4">
                        <a href="{{ route('dove') }}" class="btn btn-macri btn-lg flex-grow-1">
                            <i class="bi bi-geo-alt"></i> Come raggiungerci
                        </a>
                        <a href="{{ route('contatti') }}" class="btn btn-outline-macri btn-lg flex-grow-1">
                            <i class="bi bi-telephone"></i> Contattaci
                        </a>
                    </div>

                    <a href="javascript:history.back()" class="btn btn-link text-macri mt-3 text-decoration-none">
                        <i class="bi bi-arrow-left"></i> Torna alla collezione
                    </a>
                </div>
            </div>
        </div>

        <!-- Prodotti Correlati -->
        @php
            $relatedClothes = \App\Models\Clothe::where('category', $clothe->category)
                ->where('id', '!=', $clothe->id)
                ->whereNull('deleted_at')
                ->with('primaryImage')
                ->limit(3)
                ->get();
        @endphp

        @if ($relatedClothes->isNotEmpty())
            <div class="mt-5 pt-5 border-top">
                <h3 class="text-center mb-4 titolo-custom">Prodotti Simili</h3>
                <div class="row g-4">
                    @foreach ($relatedClothes as $related)
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm card-hover">
                                <div class="position-relative overflow-hidden" style="height: 300px;">
                                    @if ($related->primaryImage)
                                        <img src="{{ $related->primaryImage->url }}" class="card-img-top w-100 h-100"
                                            alt="{{ $related->name }}" style="object-fit: cover;">
                                    @else
                                        <div
                                            class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                            <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $related->name }}</h5>
                                    <p class="text-macri fw-bold fs-5">
                                        €{{ number_format($related->price, 2, ',', '.') }}
                                    </p>
                                    <a href="{{ route('clothe.show', $related->id) }}"
                                        class="btn btn-outline-macri btn-sm w-100">
                                        Vedi dettagli <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    <style>
        .text-macri {
            color: #ce9352 !important;
        }

        .btn-macri {
            background-color: #ce9352;
            border-color: #ce9352;
            color: white;
        }

        .btn-macri:hover {
            background-color: #b8834a;
            border-color: #b8834a;
            color: white;
        }

        .btn-outline-macri {
            border-color: #ce9352;
            color: #ce9352;
        }

        .btn-outline-macri:hover {
            background-color: #ce9352;
            border-color: #ce9352;
            color: white;
        }

        .miniatura-hover {
            transition: all 0.3s ease;
        }

        .miniatura-hover:hover {
            transform: scale(1.1);
            border-color: #ce9352 !important;
            box-shadow: 0 4px 8px rgba(206, 147, 82, 0.3);
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(206, 147, 82, 0.2) !important;
        }

        .titolo-custom {
            color: #3d2c18;
            font-weight: 600;
        }

        .sticky-top {
            position: sticky;
        }
    </style>
</x-layout>
