@section('title', $title)
<x-layout>
    <!-- Banner della collezione -->
    <div class="position-relative my-5">
        <img src="{{ asset('media/banner-primavera.jpg') }}" class="img-fluid w-100"
            style="max-height: 40vh; object-fit: cover;" alt="Collezione Primavera">
        <div class="position-absolute top-50 start-50 translate-middle text-center p-3 p-md-4"
            style="background-color: rgba(255,255,255,0.85); border-radius: 10px; max-width: 500px;">
            <h1 class="titolo-custom">Collezione Primavera</h1>
        </div>
    </div>

    <div class="container my-5 mt-5">
        <!-- Introduzione alla collezione -->
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 text-center">
                <p class="lead">La nostra collezione Primavera 2025 è caratterizzata da tonalità fresche e vivaci,
                    stampe floreali e tessuti leggeri che accompagnano il risveglio della natura.</p>
            </div>
        </div>

        <!-- Filtri -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-4">
                                <label for="categoriaFilter" class="form-label mb-md-0">Categoria</label>
                                <select class="form-select" id="categoriaFilter">
                                    <option value="" selected>Tutte le categorie</option>
                                    <option value="abiti">Abiti</option>
                                    <option value="gonne">Gonne</option>
                                    <option value="camicie">Camicie</option>
                                    <option value="accessori">Accessori</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="colorFilter" class="form-label mb-md-0">Colore</label>
                                <select class="form-select" id="colorFilter">
                                    <option value="" selected>Tutti i colori</option>
                                    <option value="pastello">Pastello</option>
                                    <option value="floreale">Floreale</option>
                                    <option value="neutro">Neutro</option>
                                </select>
                            </div>
                            <div class="col-md-4 d-flex align-items-end">
                                <button class="btn btn-outline-macri w-100 mt-md-3">Filtra</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prodotti in evidenza -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-4" style="color: #3d2c18;">In evidenza</h2>
            </div>
        </div>

        <div class="row g-4 mb-5">
            <!-- Prodotto 1 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/primavera-1.jpg') }}" class="card-img-top" alt="Abito floreale">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">Bestseller</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Abito floreale</h5>
                        <p class="card-text text-muted">Vestito leggero con motivi floreali</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bold">89,90 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Prodotto 2 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/primavera-2.jpg') }}" class="card-img-top" alt="Gonna plissettata">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gonna plissettata</h5>
                        <p class="card-text text-muted">In chiffon, colore pastello</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bold">59,90 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Prodotto 3 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/primavera-3.jpg') }}" class="card-img-top" alt="Camicia in lino">
                        <span class="badge bg-success position-absolute top-0 end-0 m-2">Nuovo</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Camicia in lino</h5>
                        <p class="card-text text-muted">Leggera e traspirante</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bold">65,00 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Prodotto 4 -->
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/primavera-4.jpg') }}" class="card-img-top" alt="Giacca leggera">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Giacca leggera</h5>
                        <p class="card-text text-muted">Perfetta per le serate fresche</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bold">79,90 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Tema della collezione -->
        <div class="row align-items-center mb-5 bg-light p-4 rounded">
            <div class="col-md-6">
                <h3 style="color: #3d2c18;">La rinascita della natura</h3>
                <p>La nostra collezione Primavera 2025 si ispira ai colori della natura che si risveglia. Abbiamo
                    selezionato tessuti naturali e sostenibili per creare capi che combinano eleganza e comfort.</p>
                <p>Le stampe floreali e le tonalità pastello sono protagoniste di questa stagione, insieme a linee
                    morbide che valorizzano la femminilità.</p>
            </div>
            <div class="col-md-6">
                <img src="{{ asset('media/primavera-tema.jpg') }}" class="img-fluid rounded shadow"
                    alt="Tema Primavera 2025">
            </div>
        </div>

        <!-- Altri prodotti della collezione -->
        <div class="row mb-4">
            <div class="col-12">
                <h2 class="mb-4" style="color: #3d2c18;">Esplora la collezione</h2>
            </div>
        </div>

        <div class="row g-4">
            <!-- Altri 8 prodotti (2 righe da 4) -->
            @for ($i = 1; $i <= 8; $i++)
                <div class="col-md-6 col-lg-3 mb-4">
                    <div class="card h-100 border-0 shadow-sm product-card">
                        <img src="{{ asset('media/primavera-extra-' . $i . '.jpg') }}" class="card-img-top"
                            alt="Prodotto Primavera">
                        <div class="card-body">
                            <h5 class="card-title">Prodotto {{ $i }}</h5>
                            <p class="card-text text-muted">Descrizione breve</p>
                            <div class="d-flex align-items-center mb-2">
                                <span class="fw-bold">{{ rand(40, 120) }},90 €</span>
                            </div>
                            <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>

    <style>
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0, 0, 0, .15) !important;
        }

        .product-card img {
            height: 240px;
            object-fit: cover;
        }
    </style>
</x-layout>
