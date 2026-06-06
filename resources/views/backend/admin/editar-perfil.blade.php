<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Editar Perfil Administrador</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3"
             style="background:#031926;">

            <h3 class="mb-0">
                Editar Perfil Administrador
            </h3>

        </div>

        <div class="card-body">

            @if ($errors->any())
                <div class="alert alert-danger">

                    <ul class="mb-0">

                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach

                    </ul>

                </div>
            @endif

            <form action="{{ route('admin.perfil.actualizar') }}"
                  method="POST">

                @csrf
                @method('PUT')

                <div class="mb-3">

                    <label class="form-label">
                        Nombre
                    </label>

                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ Auth::user()->name }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Correo Electrónico
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ Auth::user()->email }}"
                           required>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Nueva Contraseña
                    </label>

                    <input type="password"
                           name="password"
                           class="form-control">

                    <small class="text-muted">
                        Dejar vacío si no desea cambiarla.
                    </small>

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Confirmar Contraseña
                    </label>

                    <input type="password"
                           name="password_confirmation"
                           class="form-control">

                </div>

                <button type="submit"
                        class="btn btn-success">

                    Guardar Cambios

                </button>

                <a href="{{ route('admin.perfil') }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>