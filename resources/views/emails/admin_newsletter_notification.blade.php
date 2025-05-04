<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Nuova iscrizione newsletter</title>
</head>
<body style="font-family: 'Montserrat', Arial, sans-serif;">
    <h2 style="background: #f8e7d2; color: #3d2c18; padding: 12px 24px; border-radius: 8px; text-align: center;">
        Nuova iscrizione alla newsletter
    </h2>
    <p>Un utente si è appena iscritto alla newsletter con l'indirizzo:</p>
    <p style="font-size: 1.2em;"><strong>{{ $email }}</strong></p>
    <p>Controlla il database o la lista iscritti per ulteriori dettagli.</p>
    <img src="{{ asset('macri.jpg') }}" alt="Logo MÀCRÌ" style="display:block; margin:20px auto 0 auto; width:100px; height:auto; border-radius:8px;">
</body>
</html>
