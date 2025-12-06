<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pedido Enviado - {{ $ajuste->nombre }}</title>
    <style>
        /* Estilos en línea para máxima compatibilidad */
        body,
        table,
        td,
        a {
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%;
        }

        table,
        td {
            mso-table-lspace: 0pt;
            mso-table-rspace: 0pt;
        }

        img {
            -ms-interpolation-mode: bicubic;
        }

        a[x-apple-data-detectors] {
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* Contenedor principal */
        .container {
            max-width: 600px;
            width: 100%;
            margin: 0 auto;
        }
    </style>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f4f4; font-family: Arial, sans-serif;">

    <center style="width: 100%; background-color: #f4f4f4;">
        <div class="container" style="max-width: 600px; margin: 0 auto; background-color: #ffffff;">

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin-bottom: 20px;">
                <tr>
                    <td style="padding: 20px; background-color: #007bff; color: #ffffff; text-align: center;">
                        <h1 style="margin: 0; font-size: 24px;">¡Tu Pedido ha Sido Enviado! 🎉</h1>
                    </td>
                </tr>
            </table>

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="padding: 0 20px;">
                <tr>
                    <td style="padding-bottom: 20px; color: #333333; line-height: 1.6;">
                        <p style="margin-top: 0; font-size: 16px;">Hola <strong> {{ $orden->usuario->name }}</strong>,
                        </p>
                        <p style="margin-bottom: 20px; font-size: 16px;">Queremos informarte que tu pedido
                            <strong>#{{ $orden->id }}</strong> ha salido de nuestros almacenes y ya está en camino.
                        </p>
                    </td>
                </tr>

                <tr>
                    <td
                        style="padding: 20px; background-color: #f8f9fa; border-radius: 6px; border: 1px solid #e9ecef;">
                        <h2 style="margin-top: 0; font-size: 18px; color: #007bff;">📦 Detalles del Envío</h2>
                        <ul style="padding-left: 20px; margin: 0; list-style-type: none;">
                            <li style="margin-bottom: 8px;"><strong>Dirección de Envío:</strong>
                                {{ $orden->direccion_envio }}</li>
                            <li>
                                <strong>Nota de la orden para su Seguimiento:</strong>
                                {!! $orden->nota !!}
                            </li>
                        </ul>
                    </td>
                </tr>



                <tr>
                    <td style="padding-top: 10px; color: #555555; font-size: 14px;">
                        <p style="margin-top: 0;">Si tienes alguna pregunta, por favor contáctanos.</p>
                        <p style="margin-bottom: 0;">Saludos cordiales,</p>
                        <p style="font-weight: bold; margin-top: 5px;">{{ $ajuste->nombre }}</p>
                    </td>
                </tr>
            </table>

            <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%"
                style="margin-top: 20px;">
                <tr>
                    <td
                        style="padding: 20px; background-color: #e9ecef; color: #6c757d; text-align: center; font-size: 12px;">
                        <p style="margin: 0;">Este es un correo automático, por favor no respondas a este mensaje.</p>
                    </td>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>
