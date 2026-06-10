<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Gestión de Productos</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        .fila-producto {
            cursor: pointer;
            transition: all 0.2s;
        }

        .fila-producto:hover {
            background: #f1f1f1;
        }

        .table-primary {
            background-color: #cfe2ff !important;
        }

        .img-producto {
            width: 60px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #ddd;
        }

        /* botones desactivados visualmente */
        .btn-disabled {
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h1 class="fw-bold">Gestión de Productos</h1>
            <p class="text-secondary mb-0">Administración de productos de Modape Sport</p>
        </div>

        <a href="{{ route('admin.panel') }}" class="btn btn-dark">
            <i class="bi bi-arrow-left"></i> Volver al Panel
        </a>

    </div>

    <!-- BOTÓN AGREGAR -->
    <a href="{{ route('admin.productos.crear') }}" class="btn btn-success mb-3">
        <i class="bi bi-plus-circle me-2"></i> Agregar Producto
    </a>

    <!-- CARD -->
    <div class="card shadow-sm border-0">

        <div class="card-header text-white py-3" style="background:#031926;">
            <div class="d-flex align-items-center">

                <div class="fw-bold">
                    <i class="bi bi-box-seam me-2"></i>
                    Lista de Productos
                </div>

                <div class="ms-auto">
                    <button id="btnEditar" class="btn btn-warning btn-sm me-2 btn-disabled">
                        <i class="bi bi-pencil"></i>
                    </button>

                    <button id="btnEliminar" class="btn btn-danger btn-sm btn-disabled">
                        <i class="bi bi-trash"></i>
                    </button>
                </div>

            </div>
        </div>

        <!-- TABLA -->
        <div class="table-responsive">

            <table class="table table-hover align-middle mb-0">

                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Imagen</th>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Marca</th>
                        <th>Talle</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Stock</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($productos as $producto)

                    <tr class="fila-producto" data-id="{{ $producto->id }}">

                        <td>{{ $producto->id }}</td>

                        <td>
                            @if($producto->url_imagen)
                                <img src="{{ asset($producto->url_imagen) }}"
                                     class="img-producto">
                            @else
                                <span class="text-secondary">Sin imagen</span>
                            @endif
                        </td>

                        <td class="fw-bold">{{ $producto->nombre }}</td>
                        <td>{{ $producto->categoria }}</td>
                        <td>{{ $producto->marca }}</td>
                        <td>{{ $producto->talle }}</td>
                        <td>{{ $producto->descripcion }}</td>

                        <td>${{ number_format($producto->precio, 0, ',', '.') }}</td>

                        <td>
                            <span class="badge bg-success">
                                {{ $producto->stock }}
                            </span>
                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="9" class="text-center py-4 text-secondary">
                            No hay productos cargados.
                        </td>
                    </tr>

                @endforelse

                </tbody>
            </table>

        </div>
    </div>
</div>

<!-- JS -->
<script>

let productoSeleccionado = null;

const btnEditar = document.getElementById('btnEditar');
const btnEliminar = document.getElementById('btnEliminar');

// desactivar botones al inicio
btnEditar.classList.add('btn-disabled');
btnEliminar.classList.add('btn-disabled');

// seleccionar fila
document.querySelectorAll('.fila-producto').forEach(fila => {

    fila.addEventListener('click', function () {

        document.querySelectorAll('.fila-producto')
            .forEach(f => f.classList.remove('table-primary'));

        this.classList.add('table-primary');

        productoSeleccionado = this.dataset.id;

        // activar botones
        btnEditar.classList.remove('btn-disabled');
        btnEliminar.classList.remove('btn-disabled');
    });

});

// EDITAR
btnEditar.addEventListener('click', function () {

    if (!productoSeleccionado) return;

    window.location.href = `/admin/productos/${productoSeleccionado}/editar`;
});

// ELIMINAR
btnEliminar.addEventListener('click', function () {

    if (!productoSeleccionado) return;

    if (!confirm('¿Seguro que querés eliminar este producto?')) return;

    const form = document.createElement('form');
    form.method = 'POST';
    form.action = `/admin/productos/${productoSeleccionado}`;

    const csrf = document.createElement('input');
    csrf.type = 'hidden';
    csrf.name = '_token';
    csrf.value = '{{ csrf_token() }}';

    const method = document.createElement('input');
    method.type = 'hidden';
    method.name = '_method';
    method.value = 'DELETE';

    form.appendChild(csrf);
    form.appendChild(method);

    document.body.appendChild(form);
    form.submit();
});

</script>

</body>
</html>