<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>
*{
    box-sizing:border-box;
}
body{
    background:#f4f6f9;
    font-family:Arial, sans-serif;
    color:#222;
}

/* CONTENEDOR PRINCIPAL */
.container-carrito{
    width:95%;
    max-width:1200px;
    margin:20px auto;
    background:white;
    border-radius:14px;
    padding:20px;
    box-shadow:0 4px 18px rgba(0,0,0,.08);
}

/* TITULO */
.titulo-carrito{
    color:#0b2545;
    font-size:32px;
    font-weight:700;
    margin-bottom:22px;
    display:flex;
    align-items:center;
    gap:10px;
}

/* TABLA */
.tabla-carrito{
    width:100%;
    border-collapse:collapse;
}

.tabla-carrito th{
    background:#0b2545;
    color:white;
    padding:16px;
    text-align:center;
    font-size:14px;
    font-weight:600;
}

.tabla-carrito td{
    padding:18px 12px;
    border-bottom:1px solid #e6e9ef;
    text-align:center;
    vertical-align:middle;
}

.tabla-carrito tr:hover{
    background:#f8fbff;
}

/* PRODUCTO */
.producto-info{
    display:flex;
    align-items:center;
    gap:15px;
    text-align:left;
}

.imagen-producto{
    width:110px;
    height:110px;
    object-fit:cover;
    border-radius:10px;
    border:1px solid #e5e7eb;
    background:#fff;
}

.producto-info strong{
    display:block;
    color:#0b2545;
    font-size:16px;
    margin-bottom:4px;
}

.producto-info small{
    color:#6b7280;
    font-size:13px;
}

/* PRECIOS */
.tabla-carrito td:nth-child(3),
.tabla-carrito td:nth-child(4){
    font-weight:600;
    color:#111827;
}

/* BOTON ELIMINAR */
.btn-eliminar{
    background:none;
    border:none;
    color:#dc3545;
    cursor:pointer;
    font-weight:600;
    transition:.2s;
}

.btn-eliminar:hover{
    color:#a71d2a;
}

/* TOTAL */
.total{
    margin-top:24px;
    text-align:right;
    font-size:24px;
    font-weight:700;
    color:#0b2545;
}

/* ACCIONES */
.acciones{
    margin-top:18px;
    text-align:right;
}

/* BOTON CONFIRMAR */
.btn-confirmar{
    width:100%;
    background:#0b2545;
    color:white;
    border:none;
    padding:14px;
    border-radius:10px;
    font-size:16px;
    font-weight:700;
    cursor:pointer;
    transition:.2s;
}

.btn-confirmar:hover{
    background:#133c72;
    transform:translateY(-1px);
}

/* BOTON VOLVER */
.btn-volver{
    display:inline-block;
    background:#133c72;
    color:white;
    padding:12px 18px;
    border-radius:10px;
    text-decoration:none;
    font-size:15px;
    font-weight:600;
    transition:.2s;
}

.btn-volver:hover{
    background:#0b2545;
    color:white;
    transform:translateY(-1px);
}

/* CARRITO VACIO */
.carrito-vacio{
    text-align:center;
    padding:50px 20px;
    font-size:18px;
    color:#6b7280;
}

.cart-qty {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
}

.qty-form {
    display: inline-flex;
    margin: 0;
}

.qty-btn {
    width: 32px;
    height: 32px;
    border: none;
    background: #222;
    color: white;
    font-size: 18px;
    cursor: pointer;
    border-radius: 5px;
    display: flex;
    align-items: center;
    justify-content: center;
}

.qty-box {
    min-width: 30px;
    text-align: center;
    font-weight: bold;
}
.carrito-layout{
    display:block;
}

/* RESPONSIVE */
@media (max-width:768px){

    .container-carrito{
        width:100%;
        margin:0;
        padding:10px;
        border-radius:0;
    }

    .titulo-carrito{
        font-size:22px;
        margin-bottom:15px;
        justify-content:center;
    }

    .tabla-carrito{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }

    .tabla-carrito th,
    .tabla-carrito td{
        padding:8px 6px;
        font-size:12px;
    }

    .producto-info{
        gap:8px;
    }

    .imagen-producto{
        width:120px;
        height:120px;
       object-fit:cover;
    }

    .producto-info strong{
        font-size:13px;
    }

    .producto-info small{
        font-size:11px;
    }

    .qty-btn{
        width:30px;
        height:30px;
        font-size:16px;
    }

    .qty-box{
        min-width:20px;
        font-size:12px;
    }

    .resumen-pedido{
        margin-top:12px;
        padding:12px;
    }

    .btn-volver{
        width:100%;
        text-align:center;
    }

    .acciones{
        text-align:center;
    }
}



</style>

<div class="container-carrito">

    <h2 class="titulo-carrito">🛒 Mi Carrito</h2>
    <div class="carrito-layout">

    <div class="productos">
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

                       <td>
    <div class="cart-qty">

        <!-- MENOS -->
        <form action="{{ route('carrito.cambiarCantidad', $item->id) }}" method="POST" class="qty-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="accion" value="menos">
            <button type="submit" class="qty-btn">−</button>
        </form>

        <!-- CANTIDAD -->
        <div class="qty-box">
            {{ $item->cantidad }}
        </div>

        <!-- MAS -->
        <form action="{{ route('carrito.cambiarCantidad', $item->id) }}" method="POST" class="qty-form">
            @csrf
            @method('PUT')
            <input type="hidden" name="accion" value="mas">
            <button type="submit" class="qty-btn">+</button>
        </form>

    </div>
</td>

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
       </div>
        {{-- TOTAL --}}
        <div class="resumen-pedido">

    <h3>Resumen del pedido</h3>

    <div class="fila-resumen">
        <span>Subtotal</span>
        <span>${{ number_format($total,2) }}</span>
    </div>

    <div class="fila-resumen">
        <span>Envío</span>
        <span>$0</span>
    </div>

    <hr>

    <div class="fila-total">
        <strong>Total</strong>
        <strong>${{ number_format($total,2) }}</strong>
    </div>

   <form action="{{ route('checkout') }}" method="GET">
    <button type="submit" class="btn-confirmar">
        Realizar Compra
    </button>
</form>
</div>

</div>
        
       
</div>

    @else

        <div class="carrito-vacio">
            No hay productos en el carrito.
        </div>

    @endif
     
    <div class="acciones" style="margin-top:10px;">
   <a href="{{ session('ultima_categoria', url('/inicio')) }}"
   class="btn-volver">
    ← Seguir comprando
</a>
</div>