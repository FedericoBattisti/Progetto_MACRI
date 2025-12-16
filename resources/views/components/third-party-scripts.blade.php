<!-- Script di terze parti - Caricati condizionalmente -->

@php
    $privacyAccepted = isset($_COOKIE['privacy_accepted']) && $_COOKIE['privacy_accepted'] === 'true';
@endphp

@if(!$privacyAccepted)
    <!-- Script iubenda - Privacy Policy -->
    <script type="text/javascript" src="https://embeds.iubenda.com/widgets/1ac07740-367f-43b9-9592-d407902c1105.js"></script>
@endif

<!-- Script per gestire iubenda dopo accettazione cookie -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hasAccepted = document.cookie.split('; ').find(row => row.startsWith('privacy_accepted='));

        if (hasAccepted && hasAccepted.split('=')[1] === 'true') {
            // Rimuovi elementi iubenda dal DOM
            const iubendaElements = document.querySelectorAll('.iubenda-embed, [class*="iubenda"], #iubenda-cs-banner, .iubenda-cs-container');
            iubendaElements.forEach(element => {
                element.style.display = 'none';
                element.remove();
            });

            // Blocca anche eventuali script iubenda caricati
            const iubendaScripts = document.querySelectorAll('script[src*="iubenda"]');
            iubendaScripts.forEach(script => script.remove());
        }
    });
</script>
