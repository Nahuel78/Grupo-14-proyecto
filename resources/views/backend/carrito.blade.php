<table border="1">

    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Precio Unitario</th>
            <th>Subtotal</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>

    @foreach($items as $item)

        <tr>
            <td>{{ $item->producto->nombre }}</td>
            <td>{{ $item->cantidad }}</td>
            <td>${{ number_format($item->precio_unitario, 2) }}</td>
            <td>${{ number_format($item->subtotal, 2) }}</td>

            <td>
                <form method="POST"
                      action="{{ route('carrito.eliminar', $item->id) }}">

                    @csrf
                    @method('DELETE')

                    <button type="submit">
                        Eliminar
                    </button>

                </form>
            </td>
        </tr>

    @endforeach

    </tbody>

</table>

<form method="POST" action="{{ route('carrito.confirmar') }}">
    @csrf

    <button type="submit">
        Confirmar compra
    </button>
</form>