<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuovo Messaggio di Contatto</title>
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
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
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

        .info-section {
            margin: 25px 0;
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

        .message-box {
            background-color: #f8f8f8;
            border-left: 4px solid #3d2c18;
            padding: 20px;
            margin: 20px 0;
            border-radius: 4px;
            white-space: pre-wrap;
        }

        .reply-box {
            background-color: #fff3e0;
            border: 1px solid #f8e7d2;
            padding: 15px;
            border-radius: 8px;
            margin: 20px 0;
            text-align: center;
        }

        .button {
            display: inline-block;
            background-color: #3d2c18;
            color: #ffffff !important;
            text-decoration: none;
            padding: 12px 30px;
            border-radius: 4px;
            margin: 15px 0;
            font-weight: bold;
        }

        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 12px;
            color: #666;
            padding: 20px;
            background-color: #f8e7d2;
            border-radius: 8px;
        }

        @media only screen and (max-width: 600px) {
            .container {
                padding: 10px;
            }

            .title {
                padding: 10px 15px;
                font-size: 18px;
            }

            .message-box {
                padding: 15px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h2 style="color: #3d2c18; margin: 10px 0 0 0;">MÀCRÌ Boutique</h2>
        </div>

        <h2 class="title">
            📩 Nuovo Messaggio dal Sito Web
        </h2>

        <div class="info-section">
            <p>Hai ricevuto un nuovo messaggio di contatto dal sito web. Ecco i dettagli:</p>

            <table class="data-table">
                <tr>
                    <th style="width: 30%;">👤 Nome</th>
                    <td><strong>{{ $contact->name }}</strong></td>
                </tr>
                <tr>
                    <th>📧 Email</th>
                    <td>
                        <a href="mailto:{{ $contact->email }}" style="color: #3d2c18; text-decoration: none;">
                            {{ $contact->email }}
                        </a>
                    </td>
                </tr>
                <tr>
                    <th>📅 Data e Ora</th>
                    <td>{{ $contact->created_at->format('d/m/Y H:i') }}</td>
                </tr>
            </table>

            <h3 style="color: #3d2c18; margin: 30px 0 15px 0; font-size: 18px;">💬 Messaggio:</h3>

            <div class="message-box">{{ $contact->message }}</div>

            <div class="reply-box">
                <p style="margin: 0 0 15px 0;">
                    <strong>💡 Rispondi al cliente</strong>
                </p>
                <a href="mailto:{{ $contact->email }}?subject=Re: Richiesta di contatto - MÀCRÌ Boutique" class="button">
                    Rispondi via Email
                </a>
                <p style="margin: 15px 0 0 0; font-size: 13px; color: #666;">
                    Oppure rispondi direttamente a
                    <a href="mailto:{{ $contact->email }}" style="color: #3d2c18;">
                        {{ $contact->email }}
                    </a>
                </p>
            </div>
        </div>

        <div class="footer">
            <p>MÀCRÌ Boutique<br>
                Via Seggiano, 5 - 00139 Roma (RM)<br>
                Tel: +39 06 9522 9823</p><br>
                Email: macriabbigliamentodonna@gmail.com
            </p>
            <p style="margin: 15px 0 5px 0; font-size: 11px;">
                Questa è una email di notifica automatica.<br>
                © 2023 MÀCRÌ Boutique. Tutti i diritti riservati.
            </p>
        </div>
    </div>
</body>

</html>
