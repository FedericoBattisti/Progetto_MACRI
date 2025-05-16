@section('title', $title)
<x-layout>
    <div class="container my-5">
        <div class="row">
            <div class="col-12 text-center mb-4">
                <h1 class="titolo-custom">Dove siamo</h1>
                <p class="lead">Vieni a trovarci nel nostro punto vendita a Roma</p>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: #3d2c18;">Il nostro indirizzo</h5>
                        <address class="mb-4">
                            <strong>MÀCRÌ</strong><br>
                            Via Seggiano, 5<br>
                            00139 Roma (RM)<br>
                        </address>

                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2967.2606216765535!2d12.515224!3d41.9517368!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x132f678dcbb5b587%3A0xd60f8c7d73fb0f36!2sMacri!5e0!3m2!1sit!2sit!4v1745957554088!5m2!1sit!2sit"
                                style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h5 class="card-title mb-3" style="color: #3d2c18;">Orari di apertura</h5>
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <td>Lunedì</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Martedì</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Mercoledì</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Giovedì</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Venerdì</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Sabato</td>
                                    <td><strong>09:00-13:00 | 15:30-19:30</strong></td>
                                </tr>
                                <tr>
                                    <td>Domenica</td>
                                    <td><strong>Chiuso</strong></td>
                                </tr>
                            </tbody>
                        </table>

                        <div class="alert alert-info mt-3" role="alert">
                            <i class="bi bi-info-circle-fill me-2"></i> Durante le festività gli orari potrebbero subire
                            variazioni. Controlla i nostri canali social per rimanere aggiornato.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</x-layout>
