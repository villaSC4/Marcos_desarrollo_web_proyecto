<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprobante de Canje</title>
    <style>
        body { font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif; background-color: #f8fafc; margin: 0; padding: 0; -webkit-font-smoothing: antialiased; }
        .wrapper { width: 100%; background-color: #f8fafc; padding: 30px 0; }
        .container { max-width: 550px; margin: 0 auto; background-color: #ffffff; border-radius: 16px; overflow: hidden; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05); border: 1px solid #e2e8f0; }
        .header { background-color: #10b981; padding: 30px 20px; text-align: center; color: white; }
        .header h1 { margin: 0; font-size: 24px; font-weight: 700; }
        .content { padding: 40px 30px; text-align: center; }
        .welcome { font-size: 18px; color: #1e293b; margin-bottom: 20px; font-weight: 600; }
        .text { font-size: 15px; color: #64748b; line-height: 1.6; margin-bottom: 30px; }
        
        .product-card { background-color: #f1f5f9; padding: 20px; border-radius: 12px; margin-bottom: 30px; display: inline-block; width: 85%; }
        .product-image { width: 100px; height: 100px; border-radius: 50%; background: #ffffff; object-fit: contain; box-shadow: 0 2px 5px rgba(0,0,0,0.05); }
        .product-name { font-size: 16px; font-weight: 700; color: #0f172a; margin: 12px 0 4px 0; }
        .product-points { font-size: 14px; color: #10b981; font-weight: 600; margin: 0; }

        .code-box { background-color: #ecfdf5; border: 2px dashed #10b981; border-radius: 12px; padding: 15px; margin-bottom: 30px; }
        .code-title { font-size: 12px; text-transform: uppercase; letter-spacing: 1px; color: #065f46; font-weight: 700; margin: 0 0 5px 0; }
        .code-value { font-size: 28px; font-weight: 800; color: #047857; margin: 0; letter-spacing: 2px; }

        .footer { background-color: #f8fafc; padding: 20px; text-align: center; font-size: 12px; color: #94a3b8; border-top: 1px solid #e2e8f0; }
        .footer p { margin: 5px 0; }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container">
            <div class="header">
                <h1>¡Acción por el Planeta! 🌿</h1>
            </div>

            <div class="content">
                <p class="welcome">¡Hola, {{ $colaborador->nombres }}!</p>
                <p class="text">
                    Tu esfuerzo tiene recompensa. Hemos procesado con éxito el canje de tus puntos acumulados por reciclar. ¡Gracias por contribuir a un mundo más sostenible!
                </p>

                <div class="product-card">
                    @if($producto->imagen)
                        <img class="product-image" src="{{ $message->embed(storage_path('app/public/' . $producto->imagen)) }}" alt="{{ $producto->nombre }}">
                    @else
                        <img class="product-image" src="{{ $message->embed(public_path('img/default-product.jpg')) }}" alt="{{ $producto->nombre }}">
                    @endif
                    <p class="product-name">{{ $producto->nombre }}</p>
                    <p class="product-points">- {{ number_format($producto->costo_puntos, 0, '', '.') }} Puntos Eco</p>
                </div>

                <div class="code-box">
                    <p class="code-title">Código Único de Retiro</p>
                    <p class="code-value">{{ $codigoCanje }}</p>
                </div>

                <p class="text" style="font-size: 13px; margin-bottom: 0;">
                    Presenta este código en el punto de entrega autorizado más cercano para recoger tu beneficio. Puedes revisar tus puntos restantes en tu perfil de la web.
                </p>
            </div>

            <div class="footer">
                <p>© 2026 Sistema de Reciclaje. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</body>
</html>