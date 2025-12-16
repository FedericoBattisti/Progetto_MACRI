<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <title>@yield('title', 'Titolo di default')</title>
    <link rel="icon" href="{{ asset('macri.jpg') }}" type="image/x-icon">
    @vite (['resources/js/app.js', 'resources/css/app.css'])
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- Script di terze parti -->
    <x-third-party-scripts />
</head>

<body>
    <x-navbar />
    {{ $slot }}
    <x-footer />

    <!-- Banner Cookie -->
    @if(!isset($_COOKIE['privacy_accepted']))
    <div id="cookieBanner" class="cookie-banner">
        <div class="container">
            <div class="cookie-content">
                <div class="cookie-text">
                    <i class="bi bi-shield-check"></i>
                    <span>
                        Questo sito utilizza cookie per migliorare la tua esperienza.
                        <a href="{{ route('privacy') }}" target="_blank">Leggi l'informativa privacy</a>
                    </span>
                </div>
                <button id="acceptCookies" class="btn btn-macri btn-sm">
                    <i class="bi bi-check-circle"></i> Accetta
                </button>
            </div>
        </div>
    </div>
    @endif

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const acceptBtn = document.getElementById('acceptCookies');
        const cookieBanner = document.getElementById('cookieBanner');

        function setCookie(name, value, days) {
            const date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            const expires = "expires=" + date.toUTCString();
            document.cookie = name + "=" + value + ";" + expires + ";path=/;SameSite=Lax";
        }

        if (acceptBtn) {
            acceptBtn.addEventListener('click', function() {
                setCookie('privacy_accepted', 'true', 365);
                cookieBanner.style.display = 'none';
                location.reload();
            });
        }
    });
    </script>

    <style>
        /* Cookie Banner */
        .cookie-banner {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            background: rgba(255, 255, 255, 0.98);
            box-shadow: 0 -4px 20px rgba(0, 0, 0, 0.15);
            padding: 1.5rem 0;
            z-index: 9999;
            border-top: 3px solid #ce9352;
            animation: slideUp 0.5s ease-out;
        }

        @keyframes slideUp {
            from {
                transform: translateY(100%);
            }
            to {
                transform: translateY(0);
            }
        }

        .cookie-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 1.5rem;
        }

        .cookie-text {
            display: flex;
            align-items: center;
            gap: 1rem;
            flex: 1;
        }

        .cookie-text i {
            font-size: 1.5rem;
            color: #ce9352;
            flex-shrink: 0;
        }

        .cookie-text a {
            color: #ce9352;
            text-decoration: underline;
            font-weight: 600;
        }

        .cookie-text a:hover {
            color: #b8834a;
        }

        .btn-macri {
            background-color: #ce9352;
            border-color: #ce9352;
            color: white;
            white-space: nowrap;
        }

        .btn-macri:hover {
            background-color: #b8834a;
            border-color: #b8834a;
            color: white;
        }

        @media (max-width: 768px) {
            .cookie-content {
                flex-direction: column;
                text-align: center;
            }

            .cookie-text {
                flex-direction: column;
            }
        }
    </style>
</body>

</html>
