
@section('title', $title)
<x-layout>
    <div class="container my-5">
        <!-- Header Collezione -->
        <div class="text-center mb-5">
            <h1 class="titolo-custom mb-3" style="color: white;">{{ $category }}</h1>
            <p class="lead">Scopri la nostra selezione</p>
        </div>

        <!-- Filtri e Ordinamento -->
        <div class="card shadow-sm border-0 mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('collection') }}" id="filterForm">
                    <!-- Mantieni la ricerca quando usi i filtri -->
                    @if (request()->filled('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif

                    <div class="row g-3">
                        <!-- Filtro Brand -->
                        <div class="col-md-4">
                            <label for="brand" class="form-label">
                                <i class="bi bi-tag-fill text-macri"></i> Brand
                            </label>
                            <select name="brand" id="brand" class="form-select"
                                onchange="document.getElementById('filterForm').submit()">
                                <option value="">Tutti i brand</option>
                                @foreach ($brands ?? [] as $brand)
                                    <option value="{{ $brand }}"
                                        {{ ($selectedBrand ?? '') == $brand ? 'selected' : '' }}>
                                        {{ $brand }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Filtro Categoria -->
                        <div class="col-md-4">
                            <label for="category" class="form-label">
                                <i class="bi bi-folder-fill text-macri"></i> Categoria
                            </label>
                            <select name="category" id="category" class="form-select"
                                onchange="document.getElementById('filterForm').submit()">
                                <option value="">Tutte le categorie</option>
                                @foreach ($categories ?? [] as $cat)
                                    <option value="{{ $cat }}"
                                        {{ ($selectedCategory ?? '') == $cat ? 'selected' : '' }}>
                                        {{ $cat }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Ordinamento -->
                        <div class="col-md-4">
                            <label for="sort" class="form-label">
                                <i class="bi bi-sort-down text-macri"></i> Ordina per
                            </label>
                            <select name="sort" id="sort" class="form-select"
                                onchange="document.getElementById('filterForm').submit()">
                                <option value="newest" {{ ($selectedSort ?? 'newest') == 'newest' ? 'selected' : '' }}>
                                    Più recenti
                                </option>
                                <option value="price_asc" {{ ($selectedSort ?? '') == 'price_asc' ? 'selected' : '' }}>
                                    Prezzo crescente
                                </option>
                                <option value="price_desc"
                                    {{ ($selectedSort ?? '') == 'price_desc' ? 'selected' : '' }}>
                                    Prezzo decrescente
                                </option>
                                <option value="name" {{ ($selectedSort ?? '') == 'name' ? 'selected' : '' }}>
                                    Nome A-Z
                                </option>
                            </select>
                        </div>
                    </div>

                    <!-- Bottone Reset Filtri -->
                    @if (request()->has('brand') || request()->has('category') || request()->has('sort'))
                        <div class="mt-3 text-center">
                            <a href="{{ route('collection') }}{{ request()->filled('search') ? '?search=' . request('search') : '' }}"
                                class="btn btn-outline-macri btn-sm">
                                <i class="bi bi-x-circle"></i> Rimuovi filtri
                            </a>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <!-- Box Informativo -->
        <div class="alert alert-info border-0 shadow-sm mb-4" role="alert">
            <div class="d-flex align-items-start">
                <div class="me-3">
                    <i class="bi bi-info-circle-fill fs-3" style="color: #0dcaf0;"></i>
                </div>
                <div class="flex-grow-1">
                    <h5 class="alert-heading mb-3">
                        <i class="bi bi-exclamation-triangle"></i> Informazioni Importanti
                    </h5>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-rulers me-2 mt-1" style="color: #0a58ca;"></i>
                                <div>
                                    <strong>Taglie Disponibili:</strong>
                                    <p class="mb-0 small">Da XS a XL</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-palette me-2 mt-1" style="color: #0a58ca;"></i>
                                <div>
                                    <strong>Colori:</strong>
                                    <p class="mb-0 small">In base alla disponibilità in negozio</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="d-flex align-items-start">
                                <i class="bi bi-tag me-2 mt-1" style="color: #0a58ca;"></i>
                                <div>
                                    <strong>Prezzi:</strong>
                                    <p class="mb-0 small">Possono variare in base a sconti attivi in negozio</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr class="my-3">
                    <p class="mb-0 small">
                        <i class="bi bi-telephone-fill me-1"></i>
                        Per maggiori informazioni su taglie, colori e prezzi contattaci al
                        <strong>06 9522 9823</strong> o visita il nostro negozio.
                    </p>
                </div>
            </div>
        </div>

        <!-- Contatore Risultati e Tag Attivi -->
        <div class="mb-4">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <p class="text-muted mb-0">
                    <i class="bi bi-grid-3x3-gap"></i>
                    {{ $clothes->count() }} {{ $clothes->count() === 1 ? 'prodotto trovato' : 'prodotti trovati' }}
                </p>

                <!-- Tag Filtri Attivi -->
                <div class="d-flex flex-wrap gap-2">
                    @if (request()->filled('search'))
                        <span class="badge bg-macri badge-pill">
                            <i class="bi bi-search"></i> "{{ Str::limit(request('search'), 20) }}"
                            <a href="{{ route('collection') }}?{{ http_build_query(array_filter(request()->except('search'))) }}"
                                class="text-white text-decoration-none ms-1" title="Rimuovi ricerca">
                                <i class="bi bi-x"></i>
                            </a>
                        </span>
                    @endif

                    @if (request()->filled('brand'))
                        <span class="badge bg-macri badge-pill">
                            <i class="bi bi-tag"></i> {{ request('brand') }}
                            <a href="{{ route('collection') }}?{{ http_build_query(array_filter(request()->except('brand'))) }}"
                                class="text-white text-decoration-none ms-1" title="Rimuovi filtro brand">
                                <i class="bi bi-x"></i>
                            </a>
                        </span>
                    @endif

                    @if (request()->filled('category'))
                        <span class="badge bg-macri badge-pill">
                            <i class="bi bi-folder"></i> {{ request('category') }}
                            <a href="{{ route('collection') }}?{{ http_build_query(array_filter(request()->except('category'))) }}"
                                class="text-white text-decoration-none ms-1" title="Rimuovi filtro categoria">
                                <i class="bi bi-x"></i>
                            </a>
                        </span>
                    @endif

                    @if (request()->anyFilled(['search', 'brand', 'category', 'sort']))
                        <a href="{{ route('collection') }}" class="btn btn-sm btn-outline-danger"
                            title="Rimuovi tutti i filtri">
                            <i class="bi bi-x-circle"></i> Cancella tutto
                        </a>
                    @endif
                </div>
            </div>
        </div>

        <!-- Griglia Prodotti -->
        @if ($clothes->isEmpty())
            <div class="alert alert-info text-center border-0 shadow-sm">
                <i class="bi bi-info-circle fs-1 d-block mb-3 text-macri"></i>
                <h4>Nessun prodotto trovato</h4>
                @if (request()->filled('search'))
                    <p>Nessun risultato per "<strong>{{ request('search') }}</strong>"</p>
                    <p class="text-muted">Prova con parole diverse o rimuovi i filtri</p>
                @else
                    <p>Prova a modificare i filtri di ricerca</p>
                @endif
                <div class="mt-4">
                    <a href="{{ route('collection') }}" class="btn btn-outline-macri">
                        <i class="bi bi-arrow-clockwise"></i> Vedi tutti i prodotti
                    </a>
                </div>
            </div>
        @else
            <div class="row g-4">
                @foreach ($clothes as $clothe)
                    <div class="col-md-6 col-lg-4">
                        <div class="card h-100 border-0 shadow-sm card-hover">
                            <!-- Immagine Prodotto -->
                            <div class="position-relative overflow-hidden" style="height: 400px;">
                                @if ($clothe->primaryImage)
                                    <img src="{{ $clothe->primaryImage->url }}" class="card-img-top w-100 h-100"
                                        alt="{{ $clothe->name }}"
                                        style="object-fit: cover; transition: transform 0.3s ease;"
                                        onmouseover="this.style.transform='scale(1.05)'"
                                        onmouseout="this.style.transform='scale(1)'"
                                        onerror="this.parentElement.innerHTML='<div class=\'w-100 h-100 d-flex align-items-center justify-content-center bg-light\'><i class=\'bi bi-image text-muted\' style=\'font-size: 4rem;\'></i></div>'">
                                @else
                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                        <div class="text-center">
                                            <i class="bi bi-image text-muted" style="font-size: 4rem;"></i>
                                            <p class="text-muted mt-2">Nessuna immagine</p>
                                        </div>
                                    </div>
                                @endif

                                <!-- Badge Nuovo -->
                                @if ($clothe->created_at && $clothe->created_at->diffInDays(now()) < 30)
                                    <span class="position-absolute top-0 start-0 m-3 badge bg-success">
                                        Novità
                                    </span>
                                @endif
                            </div>

                            <!-- Info Prodotto -->
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title mb-2">{{ $clothe->name }}</h5>

                                @if ($clothe->brand)
                                    <p class="text-muted small mb-2">
                                        <i class="bi bi-tag"></i> {{ $clothe->brand }}
                                    </p>
                                @endif

                                @if ($clothe->description)
                                    <p class="card-text text-muted flex-grow-1">
                                        {{ Str::limit($clothe->description, 100) }}
                                    </p>
                                @endif

                                @if ($clothe->material)
                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-info-circle"></i> {{ $clothe->material }}
                                    </p>
                                @endif

                                @if ($clothe->category)
                                    <p class="text-muted small mb-3">
                                        <i class="bi bi-folder"></i> {{ $clothe->category }}
                                    </p>
                                @endif

                                <!-- Prezzo -->
                                <div class="d-flex justify-content-between align-items-center mt-auto">
                                    <span class="h4 mb-0" style="color: #ce9352;">
                                        €{{ number_format($clothe->price, 2, ',', '.') }}
                                    </span>

                                    <a href="{{ route('clothe.show', $clothe->id) }}"
                                        class="btn btn-outline-macri btn-sm btn-hover-effect">
                                        <span>Dettagli</span>
                                        <i class="bi bi-arrow-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <!-- Bottone Torna Su -->
    <button id="backToTop" class="btn-back-to-top" title="Torna su">
        <i class="bi bi-arrow-up-circle-fill"></i>
    </button>

    <style>
        .text-macri {
            color: #ce9352 !important;
        }

        .bg-macri {
            background-color: #ce9352 !important;
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

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(206, 147, 82, 0.2) !important;
        }

        .btn-hover-effect {
            position: relative;
            overflow: hidden;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            transition: all 0.3s ease;
        }

        .btn-hover-effect i {
            transition: transform 0.3s ease, opacity 0.3s ease;
            opacity: 0;
            transform: translateX(-10px);
        }

        .btn-hover-effect:hover i {
            opacity: 1;
            transform: translateX(0);
        }

        .btn-hover-effect:hover {
            transform: translateX(5px);
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

        .titolo-custom {
            color: #3d2c18;
            font-weight: 600;
        }

        .form-select:focus,
        .form-control:focus {
            border-color: #ce9352;
            box-shadow: 0 0 0 0.25rem rgba(206, 147, 82, 0.25);
        }

        .badge-pill {
            padding: 0.5rem 0.75rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .badge a:hover {
            opacity: 0.8;
        }

        /* Animazione per i badge */
        .badge {
            animation: fadeIn 0.3s ease-in;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-5px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* Stili per l'alert informativo */
        .alert-info {
            background-color: #cff4fc;
            border-left: 4px solid #0dcaf0;
        }

        .alert-info .alert-heading {
            color: #055160;
        }

        .alert-info strong {
            color: #055160;
        }

        .alert-info .small {
            color: #087990;
        }

        .alert-info hr {
            border-color: rgba(13, 202, 240, 0.3);
        }

        /* Bottone Torna Su */
        .btn-back-to-top {
            position: fixed;
            bottom: 30px;
            right: 30px;
            width: 50px;
            height: 50px;
            background-color: #ce9352;
            color: white;
            border: none;
            border-radius: 50%;
            font-size: 2rem;
            cursor: pointer;
            opacity: 0;
            visibility: hidden;
            transition: all 0.3s ease;
            z-index: 1000;
            box-shadow: 0 4px 15px rgba(206, 147, 82, 0.4);
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 0;
        }

        .btn-back-to-top.show {
            opacity: 1;
            visibility: visible;
        }

        .btn-back-to-top:hover {
            background-color: #b8834a;
            transform: translateY(-5px);
            box-shadow: 0 6px 20px rgba(206, 147, 82, 0.6);
        }

        .btn-back-to-top:active {
            transform: translateY(-3px);
        }

        .btn-back-to-top i {
            line-height: 1;
        }

        /* Animazione icona */
        @keyframes bounce-up {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-5px);
            }
        }

        .btn-back-to-top:hover i {
            animation: bounce-up 0.6s ease infinite;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .btn-back-to-top {
                width: 45px;
                height: 45px;
                font-size: 1.75rem;
                bottom: 20px;
                right: 20px;
            }
        }
    </style>

    <script>
        // Bottone Torna Su
        const backToTopButton = document.getElementById('backToTop');

        // Mostra/nascondi il bottone quando si scrolla
        window.addEventListener('scroll', () => {
            if (window.pageYOffset > 300) {
                backToTopButton.classList.add('show');
            } else {
                backToTopButton.classList.remove('show');
            }
        });

        // Scroll smooth quando si clicca il bottone
        backToTopButton.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    </script>
</x-layout>
