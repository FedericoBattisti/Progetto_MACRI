@section('title', $title)
<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-12 col-md-8 text-center">
                <h1 class="titolo-custom">Promozioni MÀCRÌ</h1>
                <p class="lead mb-0">Scopri le nostre promozioni e le ultime novità</p>
            </div>
        </div>

        <!-- Filtri -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-2 align-items-center">
                            <div class="col-md-3">
                                <label for="categoriaFilter" class="form-label mb-md-0">Categoria</label>
                                <select class="form-select" id="categoriaFilter">
                                    <option value="" selected>Tutte le categorie</option>
                                    <option value="abiti">Abiti</option>
                                    <option value="gonne">Gonne</option>
                                    <option value="camicie">Camicie</option>
                                    <option value="accessori">Accessori</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="stagioneFilter" class="form-label mb-md-0">Stagione</label>
                                <select class="form-select" id="stagioneFilter">
                                    <option value="" selected>Tutte le stagioni</option>
                                    <option value="primavera">Primavera</option>
                                    <option value="estate">Estate</option>
                                    <option value="autunno">Autunno</option>
                                    <option value="inverno">Inverno</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="prezzoFilter" class="form-label mb-md-0">Prezzo</label>
                                <select class="form-select" id="prezzoFilter">
                                    <option value="" selected>Qualsiasi prezzo</option>
                                    <option value="0-50">Fino a 50€</option>
                                    <option value="50-100">50€ - 100€</option>
                                    <option value="100+">Oltre 100€</option>
                                </select>
                            </div>
                            <div class="col-md-3 d-flex align-items-end">
                                <button class="btn btn-outline-macri w-100 mt-md-3">Filtra</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Prodotti in Promozione -->
        <div class="row mb-5">
            <div class="col-12">
                <h2 class="mb-4" style="color: #3d2c18;">Promozioni in corso</h2>
            </div>

            <!-- Prodotto 1 -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/prodotto1.jpg') }}" class="card-img-top" alt="Abito a fiori">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">-30%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Abito a fiori</h5>
                        <p class="card-text text-muted">Collezione Primavera</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-decoration-line-through text-muted me-2">99,00 €</span>
                            <span class="fw-bold">69,30 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Prodotto 2 -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/prodotto2.jpg') }}" class="card-img-top" alt="Camicia in lino">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-2">-20%</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Camicia in lino</h5>
                        <p class="card-text text-muted">Collezione Estate</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="text-decoration-line-through text-muted me-2">65,00 €</span>
                            <span class="fw-bold">52,00 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Altri prodotti in promozione... -->
        </div>

        <!-- Nuovi Arrivi -->
        <div class="row">
            <div class="col-12">
                <h2 class="mb-4" style="color: #3d2c18;">Nuovi Arrivi</h2>
            </div>

            <!-- Prodotto 1 -->
            <div class="col-md-6 col-lg-3 mb-4">
                <div class="card h-100 border-0 shadow-sm product-card">
                    <div class="position-relative">
                        <img src="{{ asset('media/prodotto3.jpg') }}" class="card-img-top" alt="Gonna plissettata">
                        <span class="badge bg-success position-absolute top-0 end-0 m-2">Nuovo</span>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gonna plissettata</h5>
                        <p class="card-text text-muted">Collezione Autunno</p>
                        <div class="d-flex align-items-center mb-2">
                            <span class="fw-bold">79,90 €</span>
                        </div>
                        <button class="btn btn-outline-macri btn-sm w-100">Dettagli</button>
                    </div>
                </div>
            </div>

            <!-- Altri nuovi arrivi... -->
        </div>
    </div>

    <style>
        .product-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important;
        }
        
        .product-card img {
            height: 240px;
            object-fit: cover;
        }
    </style>
</x-layout>