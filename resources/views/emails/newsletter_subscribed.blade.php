<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Benvenuto nella newsletter</title>
</head>
<body style="font-family: 'Montserrat', Arial, sans-serif;">
    <h2 style="background: #f8e7d2; color: #3d2c18; padding: 12px 24px; border-radius: 8px; text-align: center;">
        Grazie per esserti iscritto alla nostra newsletter!
    </h2>
    <p>Riceverai presto tutte le nostre novità all'indirizzo: <strong>{{ $email }}</strong></p>
    <p>Se hai domande o hai bisogno di assistenza, non esitare a contattarci.</p>
    <p>Grazie e benvenuto!</p>
    <p>Il team di MÀCRÌ</p>
    <img src="{{ asset('macri.jpg') }}" alt="Logo MÀCRÌ" style="display:block; margin:20px auto 0 auto; width:100px; height:auto; border-radius:8px;">
</body>
</html>
