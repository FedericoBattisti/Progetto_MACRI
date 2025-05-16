<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuova iscrizione newsletter</title>
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
            padding: 15px 0;
            border-bottom: 1px solid #f8e7d2;
        }
        .title {
            background-color: #f8e7d2;
            color: #3d2c18;
            padding: 15px 24px;
            border-radius: 8px;
            text-align: center;
            margin: 20px 0;
            font-size: 20px;
        }
        .email-box {
            background-color: #f8f8f8;
            border-left: 4px solid #3d2c18;
            padding: 15px;
            margin: 20px 0;
            font-size: 18px;
        }
        .info-section {
            margin: 25px 0;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        .data-table th {
            background-color: #f8e7d2;
            color: #3d2c18;
            text-align: left;
            padding: 10px;
        }
        .data-table td {
            padding: 10px;
            border-bottom: 1px solid #f0f0f0;
        }
        .button {
            display: inline-block;
            background-color: #3d2c18;
            color: #ffffff;
            text-decoration: none;
            padding: 10px 20px;
            border-radius: 4px;
            margin: 15px 0;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://i.imgur.com/Uu8Dhyk.jpeg" alt="Logo MÀCRÌ" style="max-width: 120px; height: auto; border-radius: 8px;">
            <h2 style="color: #3d2c18; margin: 10px 0 0 0;">MÀCRÌ Boutique - Admin</h2>
        </div>
        
        <h2 class="title">
            Nuova iscrizione alla newsletter
        </h2>
        
        <div class="info-section">
            <p>Un utente si è appena iscritto alla newsletter del sito. Ecco i dettagli:</p>
            
            <div class="email-box">
                <strong>Email:</strong> {{ $email }}
            </div>
            
            <table class="data-table">
                <tr>
                    <th>Data iscrizione</th>
                    <td>{{ date('d/m/Y H:i:s') }}</td>
                </tr>
                <tr>
                    <th>Fonte</th>
                    <td>{{ isset($source) ? $source : 'Iscrizione diretta dal sito' }}</td>
                </tr>
            </table>
            
            <p>Questa email è stata generata automaticamente. L'utente ha già ricevuto la conferma di iscrizione e il coupon di benvenuto.</p>
        </div>
        
        <div class="footer">
            <p>Questa è una email di sistema, non rispondere a questo messaggio.<br>© 2025 MÀCRÌ Boutique. Tutti i diritti riservati.</p>
        </div>
    </div>
</body>
</html>
