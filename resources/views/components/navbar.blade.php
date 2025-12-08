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
                <li class="nav-item dropdown">
                    <a class="nav-custom dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        Collezioni
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ route('collection') }}">Promozioni</a></li>
                        <li><hr></li>

                        @php
                            $seasons = \App\Helpers\SeasonHelper::getAllSeasonsStatus();
                        @endphp

                        @foreach($seasons as $season => $data)
                            <li>
                                @if($data['active'])
                                    <a class="dropdown-item" href="{{ route($data['route']) }}">
                                        {{ $data['name'] }}
                                        <small class="text-success">● Disponibile</small>
                                    </a>
                                @else
                                    <span class="dropdown-item disabled text-muted" tabindex="-1" aria-disabled="true">
                                        {{ $data['name'] }}
                                        <small>(Da {{ $data['next_available'] }})</small>
                                    </span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-custom" href="{{ route('dove') }}">Dove siamo e orari</a>
                </li>
                <li class="nav-item">
                    <a class="nav-custom" href="{{ route('contatti') }}">Contatti e social</a>
                </li>
                <li class="nav-item">
                    <a class="nav-custom" href="#" data-bs-toggle="modal"
                        data-bs-target="#newsletterModal">Newsletter</a>
                </li>
            </ul>

            <!-- Search Bar Migliorata -->
            <form class="d-flex position-relative search-form" role="search">
                <div class="input-group search-wrapper">
                    <span class="input-group-text search-icon">
                        <i class="bi bi-search"></i>
                    </span>
                    <input class="form-control search-input" type="search" placeholder="Cerca prodotti..." aria-label="Search">
                    <button class="btn btn-search" type="submit">
                        <i class="bi bi-arrow-right-circle-fill"></i>
                        <span class="btn-text">Cerca</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</nav>

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
</style>

<!-- Modal Newsletter -->
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('newslettersubscribe') }}">
                @csrf
                <div class="modal-header" style="background-color: #f8e7d2;">
                    <h5 class="modal-title" id="newsletterModalLabel">Iscriviti alla newsletter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <div class="modal-body">
                    <p class="mb-3">Resta aggiornato sulle ultime collezioni, le promozioni esclusive e gli eventi di
                        MÀCRÌ.</p>
                    <p>In regalo per te un coupon del 10% sul tuo primo acquisto in negozio presentando la mail di conferma!
                    </p>
                    <div class="mb-3">
                        <label for="newsletterEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="newsletterEmail" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                    <button type="submit" class="btn btn-outline-macri">Iscriviti</button>
                </div>
            </form>
        </div>
    </div>
</div>
