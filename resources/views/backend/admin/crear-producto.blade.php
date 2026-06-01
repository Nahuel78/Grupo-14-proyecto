<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Producto</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow-sm">

        <div class="card-header text-white"
             style="background:#031926;">

            <h3 class="mb-0">Nuevo Producto</h3>

        </div>

        <div class="card-body">

            <form action="#" method="POST" enctype="multipart/form-data">

                @csrf

                <div class="mb-3">
                    <label class="form-label">Nombre</label>

                    <input type="text"
                           name="nombre"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Descripción</label>

                    <textarea name="descripcion"
                              class="form-control"
                              rows="4"></textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Precio</label>

                    <input type="number"
                           name="precio"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Stock</label>

                    <input type="number"
                           name="stock"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Categoría</label>

                    <select name="categoria" class="form-control">
                        <option value="">Seleccione una categoría</option>
                        <option value="Hombre">Hombre</option>
                        <option value="Mujer">Mujer</option>
                        <option value="Niños">Niños</option>
                        <option value="Accesorios">Accesorios</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Marca</label>

                    <input type="text"
                           name="marca"
                           class="form-control"
                           placeholder="Ej: Nike, Adidas, Puma">
                </div>

                <div class="mb-3">
                    <label class="form-label">Talle</label>

                    <input type="text"
                           name="talle"
                           class="form-control"
                           placeholder="Ej: S, M, L, XL o 38, 39, 40">
                </div>

                <div class="mb-3">
                    <label class="form-label">Imagen del producto</label>

                    <input type="file"
                           name="imagen"
                           class="form-control">
                </div>

                <button type="submit" class="btn btn-success">
                    Guardar Producto
                </button>

                <a href="{{ route('admin.productos') }}"
                   class="btn btn-secondary">
                    Cancelar
                </a>

            </form>

        </div>

    </div>

</div>

</body>
</html>