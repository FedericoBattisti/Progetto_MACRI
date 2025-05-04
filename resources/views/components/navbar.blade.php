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
                        <li>
                            <hr>
                        </li>
                        <li><a class="dropdown-item" href="{{ route('collection.spring') }}">Primavera</a></li>
                        <li><a class="dropdown-item" href="{{ route('collection.summer') }}">Estate</a></li>
                        <li><a class="dropdown-item" href="{{ route('collection.autumn') }}">Autunno</a></li>
                        <li><a class="dropdown-item" href="{{ route('collection.winter') }}">Inverno</a></li>
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
                {{-- <li class="nav-item dropdown">
                    <a class="nav-custom dropdown-toggle disabled text-secondary" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" tabindex="-1" aria-disabled="true" id="navDisabled">
                    Account Personale
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Accedi</a></li>
                        <li><a class="dropdown-item" href="#">Registrati</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Logout</a></li>
                    </ul>
                </li> --}}
            </ul>
            <form class="d-flex" role="search">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-macri" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>

<!-- Modal Newsletter -->
<div class="modal fade" id="newsletterModal" tabindex="-1" aria-labelledby="newsletterModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form method="POST" action="{{ route('newsletter.subscribe') }}">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="newsletterModalLabel">Iscriviti alla newsletter</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Chiudi"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="newsletterEmail" class="form-label">Email</label>
                        <input type="email" class="form-control" id="newsletterEmail" name="email" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Iscriviti</button>
                </div>
            </form>
        </div>
    </div>
</div>
