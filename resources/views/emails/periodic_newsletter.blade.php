<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Newsletter MÀCRÌ - Le ultime novità</title>
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
            padding: 20px 0;
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
        .divider {
            height: 1px;
            background-color: #f8e7d2;
            margin: 20px 0;
        }
        .product {
            margin-bottom: 25px;
        }
        .product img {
            max-width: 100%;
            height: auto;
            border-radius: 4px;
        }
        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
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
            Novità da MÀCRÌ
        </h2>
        
        <div class="content">
            {!! $content !!}
            
            <div class="divider"></div>
            
            @if(isset($prodottiEvidenza) && count($prodottiEvidenza) > 0)
                <h3 style="color: #3d2c18; text-align: center;">Prodotti in evidenza</h3>
                
                @foreach($prodottiEvidenza as $prodotto)
                    <div class="product">
                        <img src="{{ $message->embed(public_path($prodotto->immagine)) }}" alt="{{ $prodotto->nome }}">
                        <h4 style="color: #3d2c18; margin-bottom: 5px;">{{ $prodotto->nome }}</h4>
                        <p style="margin-top: 0; color: #555;">{{ $prodotto->descrizione_breve }}</p>
                        
                        @if($prodotto->prezzo_scontato)
                            <p>
                                <span style="text-decoration: line-through; color: #999;">{{ number_format($prodotto->prezzo, 2, ',', '.') }}€</span>
                                <strong style="color: #d9534f; font-size: 18px;"> {{ number_format($prodotto->prezzo_scontato, 2, ',', '.') }}€</strong>
                            </p>
                        @else
                            <p><strong style="color: #3d2c18; font-size: 18px;">{{ number_format($prodotto->prezzo, 2, ',', '.') }}€</strong></p>
                        @endif
                    </div>
                    
                    @if(!$loop->last)
                        <div class="divider"></div>
                    @endif
                @endforeach
                
                <center>
                    <a href="{{ route('collection') }}" class="cta-button">Scopri tutta la collezione</a>
                </center>
            @endif
            
            <div class="divider"></div>
            
            <h3 style="color: #3d2c18; text-align: center;">Vieni a trovarci</h3>
            <p style="text-align: center;">
                Ti aspettiamo nel nostro negozio per scoprire tutte le novità e ricevere consigli personalizzati dalle nostre consulenti di stile.
            </p>
            <center>
                <a href="{{ route('dove') }}" class="cta-button">Come raggiungerci</a>
            </center>
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