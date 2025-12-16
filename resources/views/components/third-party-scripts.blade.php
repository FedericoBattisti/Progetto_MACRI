<!-- Script di terze parti - Caricati condizionalmente -->

@if(!request()->cookie('privacy_accepted'))
    <!-- Script iubenda - Privacy Policy -->
    <script type="text/javascript" src="https://embeds.iubenda.com/widgets/1ac07740-367f-43b9-9592-d407902c1105.js"></script>
@endif

<!-- Script per gestire iubenda dopo accettazione cookie -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const hasAccepted = document.cookie.split('; ').find(row => row.startsWith('privacy_accepted='));

        if (hasAccepted && hasAccepted.split('=')[1] === 'true') {
            // Rimuovi elementi iubenda dal DOM
            const iubendaElements = document.querySelectorAll('.iubenda-embed, [class*="iubenda"], #iubenda-cs-banner');
            iubendaElements.forEach(element => element.remove());
        }
    });
</script>
