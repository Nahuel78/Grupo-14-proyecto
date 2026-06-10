<style>
body{
    background: #f4f6f9;
    font-family: Arial, sans-serif;
}

.container-carrito{
    width: 90%;
    max-width: 1200px;
    margin: 40px auto;
    background: #fff;
    padding: 25px;
    border-radius: 10px;
    box-shadow: 0px 2px 10px rgba(0,0,0,0.15);
}

.titulo-carrito{
    text-align: center;
    margin-bottom: 20px;
    color: #333;
}

.tabla-carrito{
    width: 100%;
    border-collapse: collapse;
}

.tabla-carrito th{
    background: #0d6efd;
    color: white;
    padding: 12px;
    text-align: center;
}

.tabla-carrito td{
    padding: 12px;
    border-bottom: 1px solid #ddd;
    text-align: center;
}

.tabla-carrito tr:hover{
    background: #f8f9fa;
}

.btn-eliminar{
    background: #dc3545;
    color: white;
    border: none;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}

.btn-eliminar:hover{
    background: #bb2d3b;
}

.total{
    margin-top: 20px;
    text-align: right;
    font-size: 20px;
    font-weight: bold;
}

.acciones{
    margin-top: 20px;
    text-align: right;
}

.btn-confirmar{
    background: #198754;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
}

.btn-confirmar:hover{
    background: #157347;
}

.carrito-vacio{
    text-align: center;
    padding: 30px;
    font-size: 18px;
    color: #666;
}

.imagen-producto{
    width: 80px;
    height: 80px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #ddd;
    margin-bottom: 5px;
}

.producto-info{
    display: flex;
    align-items: center;
    gap: 15px;
    text-align: left;
}
/** = boton de volver al inicio */ 

.btn-volver{
    display: inline-block;
    background: #6c757d;
    color: white;
    padding: 12px 20px;
    border-radius: 5px;
    text-decoration: none;
    font-size: 16px;
}

.btn-volver:hover{
    background: #5c636a;
    color: white;
}

</style>

<div class="container-carrito">

    <h2 class="titulo-carrito">🛒 Mi Carrito</h2>

    @if($items->count() > 0)

        <table class="tabla-carrito">

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

                @php $total = 0; @endphp

                @foreach($items as $item)

                    @php
                        $subtotal = $item->cantidad * $item->precio_unitario;
                        $total += $subtotal;
                    @endphp

                    <tr>

                        {{-- PRODUCTO --}}
                        <td>
                            <div class="producto-info">

                                <img class="imagen-producto"
                              src="{{ asset($item->producto->url_imagen) }}"
                               alt="{{ $item->producto->nombre }}">

                                <div>
                                    <strong>{{ $item->producto->nombre }}</strong>

                                    @if($item->producto->marca)
                                        <br><small>Marca: {{ $item->producto->marca }}</small>
                                    @endif

                                    @if($item->producto->talle)
                                        <br><small>Talle: {{ $item->producto->talle }}</small>
                                    @endif
                                </div>

                            </div>
                        </td>

                        {{-- CANTIDAD --}}
                        <td>{{ $item->cantidad }}</td>

                        {{-- PRECIO --}}
                        <td>${{ number_format($item->precio_unitario,2) }}</td>

                        {{-- SUBTOTAL --}}
                        <td>${{ number_format($subtotal,2) }}</td>

                        {{-- ACCIONES --}}
                        <td>
                            <form action="{{ route('carrito.eliminar',$item->id) }}"
                                  method="POST">
                                @csrf
                                @method('DELETE')

                                <button type="submit" class="btn-eliminar">
                                    Eliminar
                                </button>
                            </form>
                        </td>

                    </tr>

                @endforeach

            </tbody>
        </table>

        {{-- TOTAL --}}
        <div class="total">
            Total: ${{ number_format($total,2) }}
        </div>

        {{-- CONFIRMAR --}}
        <div class="acciones">
            <form action="{{ route('carrito.confirmar') }}" method="POST">
                @csrf
                <button type="submit" class="btn-confirmar">
                    Confirmar compra
                </button>
            </form>
        </div>
        
       
</div>

    @else

        <div class="carrito-vacio">
            No hay productos en el carrito.
        </div>

    @endif
     <div class="acciones" style="margin-top:10px;">
        <a href="/hombre" class="btn-volver">
         ← Seguir comprando
        </a>

</div>