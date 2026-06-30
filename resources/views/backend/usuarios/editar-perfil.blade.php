<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Perfil</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3"
             style="background:#031926;">

            <h3 class="mb-0">
                Editar Perfil
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

            <form action="{{ route('cliente.perfil.actualizar') }}"
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
                           value="{{ Auth::user()->name }}">

                </div>
                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Apellido</label>
                    <input type="text"
                        name="apellido"
                        class="form-control"
                        value="{{ old('apellido', Auth::user()->apellido) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label fw-bold">Teléfono</label>
                    <input type="text"
                        name="telefono"
                        class="form-control"
                        value="{{ old('telefono', Auth::user()->telefono) }}">
                </div>
                
                <div class="mb-3">

                    <label class="form-label">
                        Correo Electrónico
                    </label>

                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ Auth::user()->email }}">

                </div>
                <div class="mb-3">

                    <label class="form-label">
                        Dirección
                    </label>

                    <input type="text"
                        name="direccion"
                        class="form-control"
                        value="{{ old('direccion', Auth::user()->direccion) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Ciudad
                    </label>

                    <input type="text"
                        name="ciudad"
                        class="form-control"
                        value="{{ old('ciudad', Auth::user()->ciudad) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Provincia
                    </label>

                    <input type="text"
                        name="provincia"
                        class="form-control"
                        value="{{ old('provincia', Auth::user()->provincia) }}">

                </div>

                <div class="mb-3">

                    <label class="form-label">
                        Código Postal
                    </label>

                    <input type="text"
                        name="codigo_postal"
                        class="form-control"
                        value="{{ old('codigo_postal', Auth::user()->codigo_postal) }}">

                </div>

                <div class="mb-3">

                <label class="form-label">
                    Nueva Contraseña
                </label>

                <input type="password"
                    name="password"
                    class="form-control">

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

                <a href="{{ route('cliente.perfil') }}"
                   class="btn btn-secondary">

                    Cancelar

                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>