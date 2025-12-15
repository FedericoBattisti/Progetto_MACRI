@section('title', $title)
<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 class="titolo-custom">Chi Siamo</h1>
                <p class="lead">Scopri di più su MÀCRÌ</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #3d2c18;">La Nostra Storia</h4>
                        <p>Benvenuti da MÀCRÌ, il vostro punto di riferimento per uno stile unico e raffinato. Unisce
                            l'entusiasmo di un nuovo inizio all'esperienza ventennale delle due proprietarie nel mondo
                            della moda. Scoprite collezioni curate, tessuti di qualità e consigli personalizzati per
                            valorizzare il vostro look quotidiano.</p>

                        <h4 class="card-title mb-4 mt-4" style="color: #3d2c18;">La Nostra Missione</h4>
                        <p>Crediamo che ogni donna meriti di sentirsi unica e speciale. Per questo, selezioniamo con
                            cura ogni articolo del nostro catalogo, garantendo attenzione ai dettagli e alle tendenze
                            del momento.</p>

                        <h4 class="card-title mb-4 mt-4" style="color: #3d2c18;">I Nostri Valori</h4>
                        <ul>
                            <li><strong>Qualità:</strong> Collaboriamo con fornitori affidabili per garantire prodotti
                                duraturi e ben fatti.</li>
                            <li><strong>Stile:</strong> Offriamo una selezione di capi alla moda, adatti a diverse
                                occasioni.</li>
                            <li><strong>Customer Care:</strong> La soddisfazione del cliente è la nostra priorità. Siamo
                                sempre pronti ad assisterti in ogni fase del tuo acquisto.</li>
                        </ul>

                        <!-- Immagine ottimizzata -->
                        <div class="text-center mt-4">
                            <picture>
                                <!-- WebP per browser moderni (migliore qualità/compressione) -->
                                <source srcset="{{ asset('media/macrisoce.webp') }}" type="image/webp">

                                <!-- Fallback JPG -->
                                <img src="{{ asset('media/macrisoce.jpg') }}" alt="MÀCRÌ Boutique - Abbigliamento Donna"
                                    class="img-fluid rounded shadow-lg high-quality-image" loading="lazy"
                                    decoding="async" width="500" height="auto">
                            </picture>
                            <p class="text-muted small mt-2 fst-italic">
                                <i class="bi bi-shop"></i> Le due colonne portanti di MÀCRÌ
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .titolo-custom {
            color: #3d2c18;
            font-weight: 600;
        }

        .card {
            border: none;
            transition: transform 0.3s ease;
        }

        .card:hover {
            transform: translateY(-5px);
        }

        .card-body ul {
            padding-left: 1.5rem;
        }

        .card-body ul li {
            margin-bottom: 0.75rem;
        }

        /* Migliora la renderizzazione dell'immagine */
        .high-quality-image {
            max-width: 100%;
            height: auto;
            image-rendering: -webkit-optimize-contrast;
            image-rendering: crisp-edges;
            backface-visibility: hidden;
            transform: translateZ(0);
            -webkit-font-smoothing: subpixel-antialiased;
        }

        /* Effetto hover sull'immagine */
        .high-quality-image {
            transition: transform 0.4s ease, box-shadow 0.4s ease;
            cursor: pointer;
        }

        .high-quality-image:hover {
            transform: scale(1.02);
            box-shadow: 0 10px 30px rgba(61, 44, 24, 0.3) !important;
        }

        /* Previeni blur durante le animazioni */
        picture,
        picture img {
            -webkit-transform: translateZ(0);
            transform: translateZ(0);
        }
    </style>
</x-layout>
