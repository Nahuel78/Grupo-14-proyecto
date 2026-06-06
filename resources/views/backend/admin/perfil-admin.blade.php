<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow border-0">

        <div class="card-header text-white"
             style="background:#031926;">

            <h3>Perfil del Administrador</h3>

        </div>

        <div class="card-body">

            <p>
                <strong>Nombre:</strong>
                {{ Auth::user()->name }}
            </p>

            <p>
                <strong>Email:</strong>
                {{ Auth::user()->email }}
            </p>

            <p>
                <strong>Rol:</strong>
                Administrador
            </p>

            <p>
                <strong>Miembro desde:</strong>
                {{ Auth::user()->created_at->format('d/m/Y') }}
            </p>

            <hr>

            <a href="{{ route('admin.perfil.editar') }}"
            class="btn btn-warning me-2">
                 Editar Perfil
                    </a>

            <a href="{{ route('admin.panel') }}"
            class="btn btn-secondary">
             Volver al Panel
            </a>

        </div>

    </div>

</div>

</body>
</html>