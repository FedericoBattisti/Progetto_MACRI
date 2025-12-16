<nav class="navbar navbar-expand-lg ">
    <div class="container-fluid">
        <img src="{{ asset('media/macri.jpg') }}" class="logo-custom" alt="">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-custom" aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li><a class="nav-custom" href="{{ route('chi-siamo') }}">Chi Siamo</a></li>
                <li><a class="nav-custom" href="{{ route('collection') }}">Prodotti</a></li>
                <li class="nav-item">
                    <a class="nav-custom" href="{{ route('dove') }}">Dove siamo e Orari</a>
                </li>
                <li class="nav-item">
                    <a class="nav-custom" href="{{ route('contatti') }}">Contatti e Social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-custom" href="#" data-bs-toggle="modal"
                        data-bs-target="#newsletterModal">Newsletter</a>
                </li>
            </ul>

            <!-- Search Bar Migliorata -->
            <form class="d-flex position-relative search-form" role="search" method="GET"
                action="{{ route('collection') }}">
                <div class="input-group search-wrapper">
                    <span class="input-group-text search-icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input class="form-control search-input" type="search" name="search"
                        placeholder="Cerca prodotti..." aria-label="Search" value="{{ request('search') }}">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <span class="btn-text">Cerca</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
    <!-- Modal Newsletter -->
    <div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="newsletterModalLabel">
                        <i class="bi bi-envelope-heart text-macri"></i> Iscriviti alla Newsletter
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <form action="{{ route('newsletter.subscribe') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <p class="text-muted">
                            Ricevi <strong>10% di sconto</strong> sul tuo primo acquisto e resta aggiornato su nuove
                            collezioni ed offerte esclusive!
                        </p>
                        <div class="mb-3">
                            <label for="email" class="form-label">Indirizzo Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="tuaemail@esempio.com" required>
                            <div class="invalid-feedback">
                                Inserisci un indirizzo email valido.
                            </div>
                        </div>

                        <!-- Privacy e GDPR -->
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="privacyConsent" name="privacy_consent">
                            <label class="form-check-label" for="privacyConsent">
                                Accetto l'<a href="{{ route('privacy') }}" target="_blank">informativa privacy</a>
                            </label>
                            <div class="invalid-feedback d-block text-danger" id="privacyError" style="display: none !important;">
                                Devi accettare l'informativa privacy
                            </div>
                        </div>

                        <p class="small text-muted mb-0">
                            <i class="bi bi-shield-check text-success"></i>
                            I tuoi dati sono protetti e non verranno condivisi con terze parti.
                        </p>
                    </div>
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
                            Annulla
                        </button>
                        <button type="submit" class="btn btn-macri">
                            <i class="bi bi-envelope-check"></i> Iscriviti
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const form = document.querySelector('#newsletterModal form');
    const checkbox = document.getElementById('privacyConsent');
    const errorDiv = document.getElementById('privacyError');

    form.addEventListener('submit', function(e) {
        if (!checkbox.checked) {
            e.preventDefault();
            errorDiv.style.display = 'block';
            checkbox.classList.add('is-invalid');
            return false;
        }
        errorDiv.style.display = 'none';
        checkbox.classList.remove('is-invalid');
    });

    checkbox.addEventListener('change', function() {
        if (this.checked) {
            errorDiv.style.display = 'none';
            this.classList.remove('is-invalid');
        }
    });
});
</script>

<style>
    /* Search Form Styling */
    .search-form {
        margin-left: 1rem;
    }

    .search-wrapper {
        border-radius: 25px;
        overflow: hidden;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: all 0.3s ease;
        border: 2px solid transparent;
    }

    .search-wrapper:focus-within {
        box-shadow: 0 4px 12px rgba(159, 122, 116, 0.25);
        border-color: #9f7a74;
        transform: translateY(-1px);
    }

    .search-icon {
        background-color: #fff;
        border: none;
        color: #9f7a74;
        padding: 0.5rem 1rem;
        font-size: 1.1rem;
    }

    .search-input {
        border: none;
        padding: 0.6rem 1rem;
        font-size: 0.95rem;
        background-color: #fff;
        color: #333;
    }

    .search-input:focus {
        box-shadow: none;
        outline: none;
    }

    .search-input::placeholder {
        color: #999;
        font-style: italic;
    }

    .btn-search {
        background: linear-gradient(135deg, #9f7a74 0%, #9f7a74 100%);
        color: white;
        border: none;
        padding: 0.6rem 1.5rem;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 0.5rem;
        transition: all 0.3s ease;
        position: relative;
        overflow: hidden;
    }

    .btn-search::before {
        content: '';
        position: absolute;
        top: 0;
        left: -100%;
        width: 100%;
        height: 100%;
        background: rgba(255, 255, 255, 0.2);
        transition: left 0.5s ease;
    }

    .btn-search:hover::before {
        left: 100%;
    }

    .btn-search:hover {
        background: linear-gradient(135deg, #9f7a74 0%, #9f7a74 100%);
        transform: translateX(2px);
        box-shadow: 0 4px 12px rgba(159, 122, 116, 0.4);
    }

    .btn-search i {
        font-size: 1.2rem;
        transition: transform 0.3s ease;
    }

    .btn-search:hover i {
        transform: translateX(3px);
    }

    .btn-text {
        font-size: 0.9rem;
        letter-spacing: 0.5px;
    }

    /* Responsive */
    @media (max-width: 991px) {
        .search-form {
            margin-left: 0;
            margin-top: 1rem;
            width: 100%;
        }

        .search-wrapper {
            width: 100%;
        }
    }

    @media (max-width: 576px) {
        .btn-text {
            display: none;
        }

        .btn-search {
            padding: 0.6rem 1rem;
        }
    }

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

    /* Stile checkbox personalizzato */
    .form-check-input:checked {
        background-color: #ce9352;
        border-color: #ce9352;
    }

    .form-check-input:focus {
        border-color: #ce9352;
        box-shadow: 0 0 0 0.25rem rgba(206, 147, 82, 0.25);
    }

    /* Stile scrollbar per modal privacy */
    .modal-dialog-scrollable .modal-body {
        max-height: calc(100vh - 200px);
    }

    .modal-body h6 {
        color: #3d2c18;
        font-weight: 600;
    }
</style>
