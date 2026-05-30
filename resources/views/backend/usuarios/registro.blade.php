<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Cuenta - Modape Sport</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    
    <link rel="stylesheet" href="{{ asset('css/estilo.css') }}?v=6">
</head>
<body class="body-login"> <div class="login-card"> <h2 class="text-center mb-2" style="font-weight: bold;">Modape Sport</h2>
    <h5 class="text-center text-muted mb-4">Crear una cuenta</h5>

    @if($errors->any())
        <div class="alert alert-danger py-2" style="font-size: 14px;">
            {{ $errors->first() }}
        </div>
    @endif

    <form method="POST" action="/registro">
        @csrf
        
        <div class="mb-3">
            <label class="form-label">Nombre completo</label>
            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required autofocus placeholder="Tu nombre">
        </div>

        <div class="mb-3">
            <label class="form-label">Correo electrónico</label>
            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required placeholder="tu@email.com">
        </div>

        <div class="mb-3">
            <label class="form-label">Contraseña</label>
            <input type="password" name="password" class="form-control" required placeholder="Mínimo 6 caracteres">
        </div>

        <div class="mb-4">
            <label class="form-label">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" class="form-control" required placeholder="Repetir contraseña">
        </div>

        <button type="submit" class="btn btn-dark w-100 mb-3">Registrarse</button>
    </form>

    <div class="text-center mt-3 class-links-login">
        <p class="mb-2 small text-muted">
            ¿Ya tenés cuenta? 
            <a href="/login" class="link-dorado-login fw-bold">Iniciá sesión acá</a>
        </p>
        <div class="mt-3">
            <a href="/" class="text-muted small"><i class="bi bi-arrow-left"></i> Volver a la tienda</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>