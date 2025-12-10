<footer class="footer py-5 bg-light mt-5">
    <div class="container">
        <div class="row g-4">
            <!-- Logo e informazioni -->
            <div class="col-lg-4">
                <a href="{{ route('home') }}" class="d-flex align-items-center mb-3 link-dark text-decoration-none">
                    <img src="{{ asset('media/macri.jpg') }}" class="logo-custom2" alt="Logo MÀCRÌ">
                </a>
                <p class="text-muted mb-1">Eleganza e stile dal 2023</p>
                <p class="text-muted small mb-4">Via Seggiano, 5 - 00139 Roma (RM)</p>
                <p class="text-muted small">P.IVA: 12345678901</p>
            </div>

            <!-- Link utili -->
            <div class="col-lg-2 col-md-6">
                <h5 style="color: #3d2c18;">Negozio</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="{{ route('collection') }}" class="nav-link p-0 text-muted">Collezioni</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('dove') }}" class="nav-link p-0 text-muted">Dove siamo</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('contatti') }}" class="nav-link p-0 text-muted">Contatti</a></li>
                    <li class="nav-item mb-2"><a href="{{ route('chi-siamo') }}" class="nav-link p-0 text-muted">Chi siamo</a></li>
                </ul>
            </div>

            <!-- Informazioni legali -->
            <div class="col-lg-2 col-md-6">
                <h5 style="color: #3d2c18;">Informazioni</h5>
                <ul class="nav flex-column">
                    <li class="nav-item mb-2"><a href="https://www.iubenda.com/privacy-policy/31073977" class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Privacy Policy ">Privacy Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script></li>
                    <li class="nav-item mb-2"><a href="https://www.iubenda.com/privacy-policy/31073977/cookie-policy" class="iubenda-white iubenda-noiframe iubenda-embed iubenda-noiframe " title="Cookie Policy ">Cookie Policy</a><script type="text/javascript">(function (w,d) {var loader = function () {var s = d.createElement("script"), tag = d.getElementsByTagName("script")[0]; s.src="https://cdn.iubenda.com/iubenda.js"; tag.parentNode.insertBefore(s,tag);}; if(w.addEventListener){w.addEventListener("load", loader, false);}else if(w.attachEvent){w.attachEvent("onload", loader);}else{w.onload = loader;}})(window, document);</script></li>
                </ul>
            </div>

            <!-- Social e newsletter -->
            <div class="col-lg-4 col-md-12">
                <h5 style="color: #3d2c18;">Seguici</h5>
                <p class="text-muted">Resta aggiornato sulle nostre novità</p>
                <div class="d-flex gap-3 mb-4">
                    <a href="https://www.instagram.com/macriabbigliamentodonna" class="text-decoration-none" target="_blank">
                        <i class="bi bi-instagram fs-4" style="color: #3d2c18;"></i>
                    </a>
                </div>

                <h5 style="color: #3d2c18;">Newsletter</h5>
                <p class="text-muted">Iscriviti per restare aggiornato</p>
                <button class="btn btn-outline-macri" data-bs-toggle="modal" data-bs-target="#newsletterModal">Iscriviti ora</button>
            </div>
        </div>

        <div class="d-flex flex-column flex-sm-row justify-content-between py-4 mt-4 border-top">
            <p class="text-muted">© 2025 MÀCRÌ. Tutti i diritti riservati.</p>
        </div>
    </div>
</footer>
