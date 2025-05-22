@section('title', $title)
<x-layout>
    <div class="container my-5">
        <div class="row justify-content-center mb-4">
            <div class="col-12 text-center">
                <h1 class="titolo-custom">Contatti e Social</h1>
                <p class="lead">Siamo sempre felici di sentirti</p>
            </div>
        </div>

        <div class="row g-4 justify-content-center">
            <!-- Card Contatti -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #3d2c18;">Come contattarci</h4>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="bi bi-telephone-fill fs-4" style="color: #3d2c18;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">Telefono</h6>
                                <a href="#" class="text-decoration-none">+39 06 9522 9823</a><br>
                                <a href="tel:+393293396593" class="text-decoration-none">+39 329 339 6593</a>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="bi bi-envelope-fill fs-4" style="color: #3d2c18;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">Email</h6>
                                <a href="mailto:info@macriboutique.it" class="text-decoration-none">officinedeibambini@gmail.com</a>
                            </div>
                        </div>
                        
                        <div class="d-flex align-items-center mb-3">
                            <div class="flex-shrink-0">
                                <i class="bi bi-shop fs-4" style="color: #3d2c18;"></i>
                            </div>
                            <div class="flex-grow-1 ms-3">
                                <h6 class="mb-0">Indirizzo</h6>
                                <address class="mb-0">
                                    Via Seggiano, 5<br>
                                    00139 Roma (RM)
                                </address>
                            </div>
                        </div>
                        
                        <hr class="my-4">
                        
                        <h5 class="mb-3">Hai una domanda?</h5>
                        <form>
                            <div class="mb-3">
                                <input type="text" class="form-control" placeholder="Nome e cognome" required>
                            </div>
                            <div class="mb-3">
                                <input type="email" class="form-control" placeholder="Email" required>
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control" rows="3" placeholder="Il tuo messaggio" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-outline-macri">Invia messaggio</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Card Social -->
            <div class="col-md-6">
                <div class="card shadow-sm h-100">
                    <div class="card-body">
                        <h4 class="card-title mb-4" style="color: #3d2c18;">Seguici sui social</h4>
                        
                        <div class="row g-4">
                            <div class="col-12 text-center">
                                <a href="https://www.instagram.com/macriabbigliamentodonna" class="text-decoration-none">
                                    <div class="p-3 rounded" style="background-color: #f8e7d2;">
                                        <i class="bi bi-instagram fs-1" style="color: #3d2c18;"></i>
                                        <h5 class="mt-2">Instagram</h5>
                                        <p class="text-muted">@macriabbigliamentodonna</p>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="col-12 mt-4 text-center">
                                <p class="mb-3">Inquadra il QR code per visitare il nostro profilo Instagram</p>
                                <img src='https://storage2.me-qr.com/qr/199611299.png' class="img-fluid" style="max-width: 200px;" alt='QR Code Instagram MÀCRÌ'>
                            </div>
                            
                            <div class="col-12 mt-3">
                                <div class="alert alert-info" role="alert">
                                    <i class="bi bi-info-circle-fill me-2"></i> Seguici sui social per restare aggiornato su promozioni esclusive e nuovi arrivi!
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout>