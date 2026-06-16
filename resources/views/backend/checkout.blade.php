@extends('layouts.app')

@section('content')

<style>

.checkout-container{
    max-width:1100px;
    margin:30px auto;
}

.checkout-title{
    color:#0b2545;
    font-size:32px;
    font-weight:700;
    margin-bottom:25px;
}

.checkout-card{
    background:white;
    border-radius:14px;
    padding:25px;
    box-shadow:0 4px 18px rgba(0,0,0,.08);
}

.checkout-table{
    width:100%;
    border-collapse:collapse;
}

.checkout-table th{
    background:#0b2545;
    color:white;
    padding:14px;
    text-align:center;
}

.checkout-table td{
    padding:14px;
    border-bottom:1px solid #e5e7eb;
}

.checkout-table tr:hover{
    background:#f8fbff;
}

.total-box{
    background:#f8fbff;
    border-radius:12px;
    padding:18px;
    margin-top:20px;
}

.total-box h3{
    margin:0;
    color:#0b2545;
}

.payment-card{
    margin-top:25px;
    background:white;
    border-radius:14px;
    padding:25px;
    box-shadow:0 4px 18px rgba(0,0,0,.08);
}

.payment-card h4{
    color:#0b2545;
    margin-bottom:15px;
}

.payment-select{
    width:100%;
    padding:12px;
    border:1px solid #d1d5db;
    border-radius:10px;
    font-size:15px;
}

.btn-modape{
    width:100%;
    background:#0b2545;
    color:white;
    border:none;
    padding:14px;
    border-radius:10px;
    font-size:16px;
    font-weight:700;
    margin-top:20px;
    transition:.2s;
}

.btn-modape:hover{
    background:#133c72;
}
.btn-volver {
    color: #ffffff;
    background: transparent;
    border: 1px solid #ffffff;
    padding: 8px 14px;
    border-radius: 6px;
    text-decoration: none;
    transition: all 0.3s ease;
    display: inline-block;
}

.btn-volver:hover {
    background-color: #8B5E3C; /* marrón */
    border-color: #8B5E3C;
    color: #ffffff;
}

@media(max-width:768px){

    .checkout-title{
        text-align:center;
        font-size:24px;
    }

    .checkout-table{
        display:block;
        overflow-x:auto;
        white-space:nowrap;
    }
}
</style>

<div class="checkout-container">

    <h2 class="checkout-title" style="color: white;">
    Finalizar Compra
</h2>
<div class="d-flex justify-content-start mb-3">
    <a href="{{ route('cliente.carrito') }}" class="btn-volver">
        <i class="bi bi-arrow-left"></i> Volver al carrito
    </a>
</div>

    <div class="checkout-card">

        <table class="checkout-table">

            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Subtotal</th>
                </tr>
            </thead>

            <tbody>

                @foreach($items as $item)

                <tr>
                    <td>{{ $item->producto->nombre }}</td>
                    <td>{{ $item->cantidad }}</td>
                    <td>${{ number_format($item->subtotal,2) }}</td>
                </tr>

                @endforeach

            </tbody>

        </table>

        <div class="total-box">
            <h3>
                Total a pagar:
                ${{ number_format($carrito->total,2) }}
            </h3>
        </div>

    </div>

    <div class="payment-card">

        <form action="{{ route('carrito.confirmar') }}" method="POST">
            @csrf

    <h4 class="form-label fw-bold">📦 Datos de Envío</h4>

<div class="row">

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Nombre y Apellido</label>
        <input type="text"
               name="nombre_envio"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Teléfono</label>
        <input type="text"
               name="telefono_envio"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Provincia</label>
        <input type="text"
               name="provincia"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Ciudad</label>
        <input type="text"
               name="ciudad"
               class="form-control"
               required>
    </div>

    <div class="col-md-8 mb-3">
        <label class="form-label fw-bold">Dirección</label>
        <input type="text"
               name="direccion"
               class="form-control"
               required>
    </div>

    <div class="col-md-4 mb-3">
        <label class="form-label fw-bold">Número</label>
        <input type="text"
               name="numero"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Piso / Departamento</label>
        <input type="text"
               name="departamento"
               class="form-control"
               required>
    </div>

    <div class="col-md-6 mb-3">
        <label class="form-label fw-bold">Código Postal</label>
        <input type="text"
               name="codigo_postal"
               class="form-control"
               required>
    </div>

    <div class="col-12 mb-3">
        <label class="form-label fw-bold">Referencias para la entrega</label>
        <textarea name="referencias"
                  class="form-control"
                  rows="3"
                  placeholder="Ej: casa color blanca, portón negro, etc."
                  required></textarea>
    </div>

</div>


            <h4>💳 Método de Pago</h4>

            <select name="metodo_pago"
            id="metodo_pago"
           class="payment-select"
             required>
                <option value="">
                    Seleccionar método...
                </option>

                <option value="tarjeta">
                    💳 Tarjeta
                </option>
                

                <option value="transferencia">
                    🏦 Transferencia
                </option>

                <option value="efectivo">
                    💵 Efectivo
                </option>

            </select>
         
            <div id="datosTarjeta" style="display:none;" class="mt-3">

    <h6>Datos de la tarjeta</h6>

    <input type="text"
       id="numero_tarjeta"
       name="numero_tarjeta"
       class="form-control mb-2"
       placeholder="Número de tarjeta">

<input type="text"
       id="titular"
       name="titular"
       class="form-control mb-2"
       placeholder="Nombre del titular">

<input type="text"
       id="vencimiento"
       name="vencimiento"
       class="form-control"
       placeholder="MM/AA">

<input type="text"
       id="cvv"
       name="cvv"
       class="form-control"
       placeholder="CVV">
    </div>

</div>

<div id="datosTransferencia"
     style="display:none;"
     class="alert alert-info mt-3">

    <strong>Alias:</strong> MODAPE.SPORT

    <br>

    <strong>CBU:</strong> 0000003100000000000000

</div>




            <button type="submit" class="btn-modape">
                Confirmar Compra
            </button>

        </form>

    </div>



<script>
const metodoPago = document.getElementById('metodo_pago');
const datosTarjeta = document.getElementById('datosTarjeta');
const datosTransferencia = document.getElementById('datosTransferencia');

const numeroTarjeta = document.getElementById('numero_tarjeta');
const titular = document.getElementById('titular');
const vencimiento = document.getElementById('vencimiento');
const cvv = document.getElementById('cvv');

metodoPago.addEventListener('change', function() {

    datosTarjeta.style.display = 'none';
    datosTransferencia.style.display = 'none';

    numeroTarjeta.required = false;
    titular.required = false;
    vencimiento.required = false;
    cvv.required = false;

    if (this.value === 'tarjeta') {

        datosTarjeta.style.display = 'block';

        numeroTarjeta.required = true;
        titular.required = true;
        vencimiento.required = true;
        cvv.required = true;
    }

    if (this.value === 'transferencia') {
        datosTransferencia.style.display = 'block';
    }
});
</script>
@endsection