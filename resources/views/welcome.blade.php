@section('title', $title)
<x-layout>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show m-3" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Chiudi"></button>
        </div>
    @endif

    <!-- Hero Section -->
    <div class="container-fluid my-5 mb-5">
        <div class="position-relative">
            <img src="{{ asset('media/hero-image.jpg') }}" class="img-fluid w-100"
                style="max-height: 70vh; object-fit: cover;" alt="MÀCRÌ Boutique">
            <div class="position-absolute top-50 start-50 translate-middle text-center p-3 p-md-4"
                style="background-color: rgba(255,255,255,0.9); border-radius: 10px; width: 90%; max-width: 500px;">
                <h1 class="titolo-custom" style="font-size: calc(1.5rem + 1vw);">Benvenuto in MÀCRÌ</h1>
                <p class="lead">Eleganza e stile per ogni occasione</p>
            </div>
        </div>
    </div>

    <!-- Categorie in evidenza -->
    <div class="container my-5 mt-5 py-3">
        <h2 class="text-center mb-4" style="color: #3d2c18;">Le nostre collezioni</h2>
        <div class="row g-4 justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('media/primavera.jpg') }}" class="card-img-top" alt="Collezione Primavera">
                    <div class="card-body text-center">
                        <h5 class="card-title">Primavera</h5>
                        <p class="card-text">Colori vivaci e tessuti leggeri</p>
                        <a href="{{ route('collection.spring') }}" class="btn btn-outline-macri btn-sm">Scopri</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('media/estate.jpg') }}" class="card-img-top" alt="Collezione Estate">
                    <div class="card-body text-center">
                        <h5 class="card-title">Estate</h5>
                        <p class="card-text">Freschezza e stile per le tue vacanze</p>
                        <a href="{{ route('collection.summer') }}" class="btn btn-outline-macri btn-sm">Scopri</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('media/autunno.jpg') }}" class="card-img-top" alt="Collezione Autunno">
                    <div class="card-body text-center">
                        <h5 class="card-title">Autunno</h5>
                        <p class="card-text">Eleganza nei toni caldi della stagione</p>
                        <a href="{{ route('collection.autumn') }}" class="btn btn-outline-macri btn-sm">Scopri</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-3">
                <div class="card h-100 border-0 shadow-sm">
                    <img src="{{ asset('media/inverno.jpg') }}" class="card-img-top" alt="Collezione Inverno">
                    <div class="card-body text-center">
                        <h5 class="card-title">Inverno</h5>
                        <p class="card-text">Calore e raffinatezza per i giorni freddi</p>
                        <a href="{{ route('collection.winter') }}" class="btn btn-outline-macri btn-sm">Scopri</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Promozioni in corso -->
    <div class="container-fluid py-5" style="background-color: #f8e7d2;">
        <div class="container">
            <div class="row align-items-center gy-4">
                <div class="col-lg-6">
                    <h2 style="color: #3d2c18;">Promozioni in corso</h2>
                    <p class="lead">Non perdere le nostre offerte speciali su una selezione di capi delle nuove
                        collezioni.</p>
                    <a href="{{ route('collection') }}" class="btn btn-outline-macri">Scopri le promozioni</a>
                </div>
                <div class="col-lg-6">
                    <img src="{{ asset('media/promo.jpg') }}" class="img-fluid rounded shadow" alt="Promozioni MÀCRÌ">
                </div>
            </div>
        </div>
    </div>

    <!-- Newsletter e Social -->
    <div class="container my-5 py-3">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-envelope-paper fs-1" style="color: #3d2c18;"></i>
                        <h3 class="mt-3" style="color: #3d2c18;">Newsletter</h3>
                        <p>Iscriviti per ricevere aggiornamenti su nuove collezioni ed offerte esclusive.</p>
                        <button class="btn btn-outline-macri" data-bs-toggle="modal"
                            data-bs-target="#newsletterModal">Iscriviti ora</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-instagram fs-1" style="color: #3d2c18;"></i>
                        <h3 class="mt-3" style="color: #3d2c18;">Seguici sui social</h3>
                        <p>Scopri le ultime novità e lasciati ispirare dai nostri outfit sui social.</p>
                        <a href="https://www.instagram.com/macriabbigliamentodonna"
                            class="btn btn-outline-macri">@macriabbigliamentodonna</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>
