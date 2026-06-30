<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Mi Perfil - Modape Sport</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3"
             style="background:#031926;">

            <h3 class="mb-0">
                <i class="bi bi-person-circle me-2"></i>
                Mi Perfil
            </h3>

        </div>

        <div class="card-body p-4">
           
        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

            <div class="row">

                <div class="col-md-6">
                    <label class="fw-bold">Nombre</label>
                    <p>{{ Auth::user()->name }}</p>
                </div>

                <div class="col-md-6">
                    <label class="fw-bold">Apellido</label>
                    <p>{{ Auth::user()->apellido }}</p>
                </div>

            </div>

        <div class="row mt-3">

            <div class="col-md-6">
                <label class="fw-bold">Teléfono</label>
                <p>{{ Auth::user()->telefono }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">Email</label>
                <p>{{ Auth::user()->email }}</p>
            </div>

        </div>

            <div class="row mt-3">

                <div class="col-md-6">

                    <label class="fw-bold">
                        Rol
                    </label>

                    <p>Cliente</p>

                </div>

                <div class="col-md-6">

                    <label class="fw-bold">
                        Miembro desde
                    </label>

                    <p>
                        {{ Auth::user()->created_at->format('d/m/Y') }}
                    </p>

                </div>

            </div>
            <div class="row mt-3">

    <div class="col-md-6">
        <label class="fw-bold">
            Dirección
        </label>

        <p>{{ Auth::user()->direccion }}</p>
    </div>

    <div class="col-md-6">
        <label class="fw-bold">
            Ciudad
        </label>

        <p>{{ Auth::user()->ciudad }}</p>
    </div>

</div>

        <div class="row mt-3">

            <div class="col-md-6">
                <label class="fw-bold">
                    Provincia
                </label>

                <p>{{ Auth::user()->provincia }}</p>
            </div>

            <div class="col-md-6">
                <label class="fw-bold">
                    Código Postal
                </label>

                <p>{{ Auth::user()->codigo_postal }}</p>
            </div>

        </div>

            <hr>

            <a href="{{ route('cliente.perfil.editar') }}"
            class="btn btn-warning me-2">

                <i class="bi bi-pencil"></i>
                Editar Perfil

            </a>

           <a href="/inicio"
            class="btn btn-dark">

            <i class="bi bi-arrow-left"></i>
            Volver a la Tienda

            </a>

        </div>

    </div>

</div>

</body>
</html>