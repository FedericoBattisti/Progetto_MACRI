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
        <div class="position-relative" style="min-height: 120px;">
            <div class="position-absolute top-50 start-50 translate-middle text-center p-2 p-md-3"
                style="background-color: rgba(159, 122, 116, 0.85); border-radius: 8px; max-width: 400px;">
                <h1 class="titolo-custom mb-0" style="font-size: calc(1.3rem + 0.8vw); color: #ffffff;">
                    Benvenuto in MÀCRÌ
                </h1>
            </div>
        </div>
    </div>

    <!-- Carousel Prodotti in Evidenza -->
    <div class="container my-5 py-3">
        <h2 class="text-center mb-5" style="color: #3d2c18;">I Nostri Prodotti</h2>

        @php
            // Prodotti casuali CHE HANNO ALMENO UN'IMMAGINE
            $clothes = \App\Models\Clothe::whereNull('deleted_at')
                ->whereHas('images')
                ->with('primaryImage')
                ->inRandomOrder()
                ->limit(8)
                ->get();
        @endphp

        @if ($clothes->isNotEmpty())
            <!-- Carousel Bootstrap -->
            <div id="productsCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="5000">
                <!-- Carousel Inner -->
                <div class="carousel-inner">
                    @foreach ($clothes->chunk(4) as $index => $chunk)
                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                            <div class="row g-4 px-3">
                                @foreach ($chunk as $clothe)
                                    <div class="col-md-6 col-lg-3">
                                        <div class="card h-100 border-0 shadow-sm card-hover">
                                            <!-- Immagine Prodotto -->
                                            <div class="position-relative overflow-hidden" style="height: 350px;">
                                                @if ($clothe->primaryImage)
                                                    <img src="{{ $clothe->primaryImage->url }}"
                                                        class="card-img-top w-100 h-100" alt="{{ $clothe->name }}"
                                                        style="object-fit: cover; transition: transform 0.3s ease;"
                                                        onmouseover="this.style.transform='scale(1.1)'"
                                                        onmouseout="this.style.transform='scale(1)'"
                                                        onerror="this.parentElement.innerHTML='<div class=\'w-100 h-100 d-flex align-items-center justify-content-center bg-light\'><i class=\'bi bi-image text-muted\' style=\'font-size: 3rem;\'></i></div>'">
                                                @else
                                                    <div class="w-100 h-100 d-flex align-items-center justify-content-center bg-light">
                                                        <i class="bi bi-image text-muted" style="font-size: 3rem;"></i>
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
                                            <div class="card-body text-center d-flex flex-column">
                                                <h5 class="card-title mb-2">{{ $clothe->name }}</h5>

                                                @if ($clothe->brand)
                                                    <p class="text-muted small mb-2">{{ $clothe->brand }}</p>
                                                @endif

                                                @if ($clothe->description)
                                                    <p class="card-text text-muted small flex-grow-1">
                                                        {{ Str::limit($clothe->description, 60) }}
                                                    </p>
                                                @endif

                                                <div class="mt-auto">
                                                    <p class="h5 mb-3" style="color: #ce9352;">
                                                        €{{ number_format($clothe->price, 2, ',', '.') }}
                                                    </p>
                                                    <a href="{{ route('clothe.show', $clothe->id) }}"
                                                        class="btn btn-outline-macri btn-sm w-100 btn-hover-effect">
                                                        <span>Scopri</span>
                                                        <i class="bi bi-arrow-right"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>

                <!-- Controls Previous -->
                <button class="carousel-control-prev" type="button" data-bs-target="#productsCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon-custom" aria-hidden="true">
                        <i class="bi bi-chevron-left"></i>
                    </span>
                    <span class="visually-hidden">Previous</span>
                </button>

                <!-- Controls Next -->
                <button class="carousel-control-next" type="button" data-bs-target="#productsCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon-custom" aria-hidden="true">
                        <i class="bi bi-chevron-right"></i>
                    </span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>

            <!-- Bottone Vedi Tutti -->
            <div class="text-center mt-5">
                <a href="{{ route('collection') }}" class="btn btn-macri btn-lg btn-promo-effect">
                    Vedi Tutta la Collezione
                    <i class="bi bi-chevron-double-right ms-2"></i>
                </a>
            </div>
        @else
            <div class="alert alert-info text-center">
                <i class="bi bi-info-circle fs-1 d-block mb-3"></i>
                <h4>Prodotti in arrivo</h4>
                <p>Torna presto per scoprire le nostre collezioni!</p>
            </div>
        @endif
    </div>

    <!-- Newsletter e Social -->
    <div class="container my-5 py-3">
        <div class="row g-4">
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-envelope-paper fs-1 icon-pulse" style="color: #3d2c18;"></i>
                        <h3 class="mt-3" style="color: #3d2c18;">Newsletter</h3>
                        <p>Iscriviti per ricevere aggiornamenti su nuove collezioni ed offerte esclusive.</p>
                        <button class="btn btn-outline-macri btn-hover-effect" data-bs-toggle="modal"
                            data-bs-target="#newsletterModal">
                            <span>Iscriviti ora</span>
                            <i class="bi bi-envelope-heart"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card h-100 border-0 shadow-sm card-hover">
                    <div class="card-body text-center p-4">
                        <i class="bi bi-instagram fs-1 icon-rotate" style="color: #3d2c18;"></i>
                        <h3 class="mt-3" style="color: #3d2c18;">Seguici sui social</h3>
                        <p>Scopri le ultime novità e lasciati ispirare dai nostri outfit sui social.</p>
                        <a href="https://www.instagram.com/macriabbigliamentodonna" target="_blank"
                            class="btn btn-outline-macri btn-hover-effect">
                            <span>@macriabbigliamentodonna</span>
                            <i class="bi bi-arrow-up-right"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        /* Carousel Custom Styles */
        #productsCarousel {
            padding: 0 50px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            width: 50px;
            opacity: 1;
        }

        .carousel-control-prev-icon-custom,
        .carousel-control-next-icon-custom {
            width: 50px;
            height: 50px;
            background-color: #ce9352;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.3s ease;
        }

        .carousel-control-prev-icon-custom i,
        .carousel-control-next-icon-custom i {
            font-size: 1.5rem;
            color: white;
        }

        .carousel-control-prev:hover .carousel-control-prev-icon-custom,
        .carousel-control-next:hover .carousel-control-next-icon-custom {
            background-color: #b8834a;
            transform: scale(1.1);
            box-shadow: 0 4px 15px rgba(206, 147, 82, 0.4);
        }

        .carousel-item {
            transition: transform 0.6s ease-in-out;
        }

        /* Card Hover Effect */
        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-8px);
            box-shadow: 0 8px 25px rgba(206, 147, 82, 0.2) !important;
        }

        /* Button Hover Effect per btn-outline-macri */
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

        .btn-hover-effect::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s ease;
        }

        .btn-hover-effect:hover::before {
            left: 100%;
        }

        .btn-hover-effect:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 15px rgba(206, 147, 82, 0.3);
        }

        /* Button effect per btn-macri */
        .btn-promo-effect {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-promo-effect i {
            transition: transform 0.3s ease;
        }

        .btn-promo-effect:hover i {
            transform: translateX(5px);
            animation: bounce-right 0.6s ease infinite;
        }

        .btn-promo-effect:hover {
            transform: scale(1.05);
            box-shadow: 0 6px 20px rgba(61, 44, 24, 0.3);
        }

        @keyframes bounce-right {
            0%,
            100% {
                transform: translateX(0);
            }

            50% {
                transform: translateX(8px);
            }
        }

        /* Icon animations */
        .icon-pulse {
            transition: transform 0.3s ease;
        }

        .card-hover:hover .icon-pulse {
            animation: pulse-scale 0.6s ease infinite;
        }

        @keyframes pulse-scale {
            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.1);
            }
        }

        .icon-rotate {
            transition: transform 0.3s ease;
        }

        .card-hover:hover .icon-rotate {
            animation: rotate-wiggle 0.8s ease infinite;
        }

        @keyframes rotate-wiggle {
            0%,
            100% {
                transform: rotate(0deg);
            }

            25% {
                transform: rotate(-10deg);
            }

            75% {
                transform: rotate(10deg);
            }
        }

        /* Smooth transitions per tutti i bottoni */
        .btn {
            transition: all 0.3s ease;
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

        .titolo-custom {
            font-weight: 600;
        }

        /* Responsive */
        @media (max-width: 768px) {
            #productsCarousel {
                padding: 0 20px;
            }

            .carousel-control-prev-icon-custom,
            .carousel-control-next-icon-custom {
                width: 40px;
                height: 40px;
            }

            .carousel-control-prev-icon-custom i,
            .carousel-control-next-icon-custom i {
                font-size: 1.2rem;
            }
        }
    </style>
</x-layout>
