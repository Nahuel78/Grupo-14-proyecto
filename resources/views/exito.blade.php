<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mensaje enviado</title>

    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}">
</head>

<body>

<div class="mensaje-exito">

    <h1>✔ Mensaje enviado con éxito</h1>

    <p>Muchas gracias <strong>{{ $nombre }}</strong>, nos contactaremos contigo pronto.</p>

    <a href="/">Volver al inicio</a>

</div>

</body>
</html>