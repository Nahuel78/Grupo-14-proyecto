<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestión de Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>

            <h1 class="fw-bold">
                Gestión de Productos
            </h1>

            <p class="text-secondary">
                Administración de productos de Modape Sport
            </p>

        </div>

        <a href="{{ route('admin.panel') }}" class="btn btn-dark">

            <i class="bi bi-arrow-left"></i>
            Volver al Panel

        </a>

    </div>

<!-- BOTON AGREGAR -->
<a href="{{ route('admin.productos.crear') }}"
   class="btn btn-success mb-3">

    <i class="bi bi-plus-circle me-2"></i>
    Agregar Producto

</a>

    <div class="card shadow-sm border-0">

        <div class="card-header text-white fw-bold py-3"
             style="background:#031926;">

            <i class="bi bi-box-seam me-2"></i>
            Lista de Productos

        </div>

        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">

                    <tr>

                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($productos as $producto)

                    <tr>

                        <td>{{ $producto->id }}</td>

                        <td class="fw-bold">
                            {{ $producto->nombre }}
                        </td>

                        <td>
                            {{ $producto->descripcion }}
                        </td>

                        <td>
                            ${{ number_format($producto->precio, 0, ',', '.') }}
                        </td>

                        <td>

                            <span class="badge bg-success">
                                {{ $producto->stock }}
                            </span>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="5" class="text-center py-4 text-secondary">

                            No hay productos cargados.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>

    </div>

</div>

</body>
</html>