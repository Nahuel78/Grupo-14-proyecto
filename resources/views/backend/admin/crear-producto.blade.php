<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ isset($producto) ? 'Editar Producto' : 'Agregar Producto' }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body style="background:#f5f5f5;">

<div class="container py-5">

    <div class="card shadow-sm">

        <div class="card-header text-white" style="background:#031926;">

            <h3 class="mb-0">
                {{ isset($producto) ? 'Editar Producto' : 'Nuevo Producto' }}
            </h3>

        </div>

        <div class="card-body">

            <form action="{{ isset($producto) 
                ? route('admin.productos.update', $producto->id) 
                : route('admin.productos.guardar') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf

                @if(isset($producto))
                    @method('PUT')
                @endif

                <!-- NOMBRE -->
                <div class="mb-3">
                    <label class="form-label">Nombre</label>
                    <input type="text"
                           name="nombre"
                           class="form-control"
                           value="{{ $producto->nombre ?? '' }}"
                           required>
                </div>

                <!-- DESCRIPCIÓN -->
                <div class="mb-3">
                    <label class="form-label">Descripción</label>
                    <textarea name="descripcion"
                              class="form-control"
                              rows="4">{{ $producto->descripcion ?? '' }}</textarea>
                </div>

                <!-- PRECIO -->
                <div class="mb-3">
                    <label class="form-label">Precio</label>
                    <input type="number"
                           name="precio"
                           class="form-control"
                           value="{{ $producto->precio ?? '' }}"
                           required>
                </div>

                <!-- STOCK -->
                <div class="mb-3">
                    <label class="form-label">Stock</label>
                    <input type="number"
                           name="stock"
                           class="form-control"
                           value="{{ $producto->stock ?? '' }}"
                           required>
                </div>

                <!-- CATEGORÍA -->
                <div class="mb-3">
                    <label class="form-label">Categoría</label>

                    <select name="categoria" class="form-control">

                        <option value="">Seleccione una categoría</option>

                        <option value="Hombre"
                            {{ (isset($producto) && $producto->categoria == 'Hombre') ? 'selected' : '' }}>
                            Hombre
                        </option>

                        <option value="Mujer"
                            {{ (isset($producto) && $producto->categoria == 'Mujer') ? 'selected' : '' }}>
                            Mujer
                        </option>

                        <option value="Niños"
                            {{ (isset($producto) && $producto->categoria == 'Niños') ? 'selected' : '' }}>
                            Niños
                        </option>

                        <option value="Accesorios"
                            {{ (isset($producto) && $producto->categoria == 'Accesorios') ? 'selected' : '' }}>
                            Accesorios
                        </option>

                    </select>
                </div>

                <!-- SUBCATEGORÍA -->
                <div class="mb-3">
                    <label class="form-label">Subcategoría</label>

                    <select name="subcategoria" class="form-control">

                        <option value="">Seleccione una subcategoría</option>

                        <option value="ropa">Ropa</option>
                        <option value="zapatillas">Zapatillas</option>
                        <option value="botines">Botines</option>

                        <option value="mochila">Mochila</option>
                        <option value="medias">Medias</option>
                        <option value="pelotas">Pelotas</option>
                        <option value="gorras">Gorras</option>
                        <option value="paletas">Paletas</option>

                        <option value="accesorios">Accesorios</option>

                    </select>
                </div>

                <!-- MARCA -->
                <div class="mb-3">
                    <label class="form-label">Marca</label>
                    <input type="text"
                           name="marca"
                           class="form-control"
                           value="{{ $producto->marca ?? '' }}">
                </div>

                <!-- TALLE -->
                <div class="mb-3">
                    <label class="form-label">Talle</label>
                    <input type="text"
                           name="talle"
                           class="form-control"
                           value="{{ $producto->talle ?? '' }}">
                </div>

                <!-- IMAGEN -->
                <div class="mb-3">
                    <label class="form-label">Imagen del producto</label>
                    <input type="file"
                           name="imagen"
                           class="form-control">

                    @if(isset($producto) && $producto->url_imagen)
                        <img src="{{ asset($producto->url_imagen) }}"
                             width="80"
                             class="mt-2 rounded border">
                    @endif
                </div>

                <!-- ⭐ DESTACADO -->
                <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="destacado" value="1" id="destacado"
                      {{ isset($producto) && $producto->destacado ? 'checked' : '' }}>

                <label class="form-check-label" for="destacado">
                      Mostrar como producto destacado
                </label>
                </div>

                <button type="submit" class="btn btn-success">
                    {{ isset($producto) ? 'Actualizar Producto' : 'Guardar Producto' }}
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