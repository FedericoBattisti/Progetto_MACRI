<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Benvenuto nella newsletter MÀCRÌ</title>
    <style>
        body {
            font-family: 'Montserrat', Arial, sans-serif;
            line-height: 1.6;
            color: #333;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid #f8e7d2;
        }
        .logo {
            max-width: 150px;
            height: auto;
            margin-bottom: 15px;
            border-radius: 8px;
        }
        .title {
            background-color: #f8e7d2;
            color: #3d2c18;
            padding: 15px 24px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            font-size: 22px;
        }
        .content {
            padding: 20px;
            text-align: center;
        }
        .coupon {
            background-color: #f8e7d2;
            border: 2px dashed #3d2c18;
            padding: 15px;
            margin: 25px auto;
            max-width: 300px;
            text-align: center;
            border-radius: 8px;
        }
        .coupon-code {
            font-size: 24px;
            font-weight: bold;
            color: #3d2c18;
            letter-spacing: 2px;
        }
        .cta-button {
            display: inline-block;
            background-color: #3d2c18;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 4px;
            margin: 20px 0;
            font-weight: bold;
        }
        .footer {
            background-color: #f8e7d2;
            padding: 20px;
            text-align: center;
            color: #3d2c18;
            font-size: 14px;
            border-radius: 8px;
            margin-top: 20px;
        }
        .social-icons {
            margin: 15px 0;
        }
        .social-icons a {
            display: inline-block;
            margin: 0 8px;
        }
        .social-icon {
            width: 30px;
            height: 30px;
        }
        .address {
            margin-top: 15px;
            font-size: 12px;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }
            .content {
                padding: 15px;
            }
            .title {
                padding: 10px 15px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.imgur.com/Uu8Dhyk.jpeg" alt="Logo MÀCRÌ" class="logo">
            <h1 style="color: #3d2c18; margin: 0;">MÀCRÌ Boutique</h1>
        </div>
        
        <h2 class="title">
            Grazie per esserti iscritto alla nostra newsletter!
        </h2>
        
        <div class="content">
            <p>Gentile cliente,</p>
            <p>siamo felici di darti il benvenuto nella community di MÀCRÌ Boutique!</p>
            <p>D'ora in avanti riceverai in anteprima tutte le novità sulle nostre collezioni, eventi esclusivi e promozioni speciali all'indirizzo: <strong>{{ $email }}</strong></p>
            
            <div class="coupon">
                <p style="margin-bottom: 5px; color: #3d2c18;">Per ringraziarti, ecco un coupon del</p>
                <h3 style="margin: 5px 0; color: #3d2c18;">10% DI SCONTO</h3>
                <p style="margin-top: 5px; font-size: 12px; color: #3d2c18;">sul tuo prossimo acquisto in negozio</p>
                <div class="coupon-code">WELCOME10</div>
                <p style="font-size: 12px; margin-top: 10px; color: #666;">Mostra questo codice alla cassa</p>
            </div>
            
            <p>Siamo a tua disposizione per qualsiasi domanda o necessità. Non esitare a contattarci!</p>
            
            <a href="{{ route('collection') }}" class="cta-button">Scopri le nostre collezioni</a>
        </div>
        
        <div class="footer">
            <p>Seguici sui social</p>
            <div class="social-icons">
                <a href="https://www.instagram.com/macriabbigliamentodonna"><img src="https://cdn-icons-png.flaticon.com/512/174/174855.png" alt="Instagram" class="social-icon"></a>
                <a href="https://www.facebook.com/macriboutique"><img src="https://cdn-icons-png.flaticon.com/512/174/174848.png" alt="Facebook" class="social-icon"></a>
            </div>
            
            <div class="address">
                <p>MÀCRÌ Boutique<br>
                Via Seggiano, 5 - 00139 Roma (RM)<br>
                Tel: +39 06 9522 9823</p>
                
                <p>Hai ricevuto questa email perché ti sei iscritto alla nostra newsletter.<br>
            </div>
        </div>
    </div>
</body>
</html>
