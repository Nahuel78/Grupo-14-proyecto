<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Pedidos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold">Gestión de Pedidos</h1>

            <p class="text-secondary mb-0">
                Administración de pedidos de Modape Sport
            </p>
        </div>

        <a href="{{ route('admin.panel') }}" class="btn btn-dark">
            <i class="bi bi-arrow-left"></i>
            Volver al Panel
        </a>

    </div>

    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3"
             style="background:#031926;">

            <div class="fw-bold">
                <i class="bi bi-cart-check me-2"></i>
                Lista de Pedidos
            </div>

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>
                        <th>ID</th>
                        <th>Cliente</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Estado</th>
                    </tr>

                </thead>

                <tbody>

                    <tr>
                        <td colspan="5"
                            class="text-center py-5 text-secondary">

                            <i class="bi bi-cart-x fs-1 d-block mb-3"></i>

                            No hay pedidos registrados.

                        </td>
                    </tr>

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>