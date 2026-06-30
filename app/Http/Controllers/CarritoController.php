<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\VentaCabecera;
use App\Models\Producto;
use App\Models\VentaDetalle;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
    // Obtener o crear carrito activo
    private function obtenerCarrito()
    {
        if (!Auth::check()) {
            abort(403, 'No autorizado');
        }

        return VentaCabecera::firstOrCreate(
            [
                'user_id' => Auth::id(),
                'estado'  => 'carrito',
            ],
            [
                'total' => 0
            ]
        );
    }

    // Mostrar carrito
    public function index()
    {

        $carrito = $this->obtenerCarrito();

        $items = VentaDetalle::where('venta_id', $carrito->id)
            ->with('producto')
            ->get();

        return view('backend.carrito', compact('carrito', 'items'));
    }




    // Agregar producto al carrito
 public function agregar(Request $request)
{
    
    $request->validate([
        'producto_id' => 'required|exists:productos,id',
        'cantidad' => 'required|integer|min:1',
    ]);

    $producto = Producto::findOrFail($request->producto_id);

    if ($producto->stock <= 0) {

    if ($request->ajax()) {
        return response()->json([
            'success' => false,
            'message' => 'No hay stock disponible'
        ], 422);
    }

    return back()->with('error', 'No hay stock disponible');
}

    $carrito = VentaCabecera::where('user_id', Auth::id())
    ->where('estado', 'carrito')
    ->first();

if (!$carrito) {
    $carrito = VentaCabecera::create([
        'user_id' => Auth::id(),
        'estado' => 'carrito',
        'total' => 0
    ]);
}



    $item = VentaDetalle::where('venta_id', $carrito->id)
        ->where('producto_id', $producto->id)
        ->first();

    // 🔥 calcular cantidad total (stock real + carrito)
    $cantidadEnCarrito = $item ? $item->cantidad : 0;
    $cantidadSolicitada = $request->cantidad;
    $cantidadTotal = $cantidadEnCarrito + $cantidadSolicitada;

    // 🚨 VALIDACIÓN DE STOCK GLOBAL
    if ($cantidadTotal > $producto->stock) {

        if ($request->ajax()) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficiente stock disponible'
            ], 422);
        }

        return back()->with(
            'error',
            'Solo quedan ' . $producto->stock . ' unidades disponibles.'
        );
    }

    // 🟢 SI YA EXISTE EN EL CARRITO
    if ($item) {

        $item->cantidad = $cantidadTotal;
        $item->subtotal = $item->cantidad * $item->precio_unitario;
        $item->save();

    } else {

        // 🟢 SI ES NUEVO PRODUCTO EN CARRITO
        $item = VentaDetalle::create([
            'venta_id' => $carrito->id,
            'producto_id' => $producto->id,
            'cantidad' => $request->cantidad,
            'precio_unitario' => $producto->precio,
            'subtotal' => $producto->precio * $request->cantidad,
        ]);
    }

    // 🔄 ACTUALIZAR TOTAL DEL CARRITO
    $carrito->total = VentaDetalle::where('venta_id', $carrito->id)
        ->sum('subtotal');

    $carrito->save();

    // 🔁 RESPUESTA AJAX
    if ($request->ajax()) {
        return response()->json([
            'success' => true
        ]);
    }

    return back();
    

}

    // Confirmar compra
public function confirmar(Request $request)
{

   
    $request->validate([
        'metodo_pago' => 'required',

        // DATOS DE ENVÍO
        'nombre_envio' => 'required',
        'telefono_envio' => 'required',
        'provincia' => 'required',
        'ciudad' => 'required',
        'direccion' => 'required',
        'numero' => 'required',
        'departamento' => 'required',
        'codigo_postal' => 'required',
        'referencias' => 'required',
    ]);

    // Si eligió tarjeta, exigir datos de tarjeta
    if ($request->metodo_pago === 'tarjeta') {

        $request->validate([
            'numero_tarjeta' => 'required',
            'titular' => 'required',
            'vencimiento' => 'required',
            'cvv' => 'required',
        ]);

    }

    $carrito = $this->obtenerCarrito();

    $items = VentaDetalle::where('venta_id', $carrito->id)
        ->with('producto')
        ->get();

    if ($items->isEmpty()) {
        return back()->with('error', 'Tu carrito está vacío');
    }

    // Verificar stock
    foreach ($items as $item) {
        if ($item->cantidad > $item->producto->stock) {
            return back()->with(
                'error',
                'No hay stock suficiente para ' . $item->producto->nombre
            );
        }
    }

    // Descontar stock
    foreach ($items as $item) {
        $producto = $item->producto;
        $producto->stock -= $item->cantidad;
        $producto->save();
    }

    $carrito->update([
    'estado' => 'pagado',
    'fecha_venta' => now(),
    'metodo_pago' => $request->metodo_pago,

    'nombre_envio' => $request->nombre_envio,
    'telefono_envio' => $request->telefono_envio,
    'provincia' => $request->provincia,
    'ciudad' => $request->ciudad,
    'direccion' => $request->direccion,
    'numero' => $request->numero,
    'departamento' => $request->departamento,
    'codigo_postal' => $request->codigo_postal,
    'referencias' => $request->referencias,
]);

    return redirect()->route('factura', $carrito->id);
}
   public function eliminar($id)
{
    $item = VentaDetalle::findOrFail($id);
    $carrito = VentaCabecera::findOrFail($item->venta_id);

    if ($carrito->estado !== 'carrito') {
        return response()->json([
            'success' => false,
            'message' => 'No puedes modificar una compra confirmada'
        ], 422);
    }

    $item->delete();

    $carrito->total = VentaDetalle::where('venta_id', $carrito->id)->sum('subtotal');
    $carrito->save();

   return redirect()
    ->route('cliente.carrito')
    ->with('success', 'Producto eliminado del carrito');
}

public function cambiarCantidad(Request $request, $id)
{
    $item = VentaDetalle::findOrFail($id);
     $carrito = VentaCabecera::findOrFail($item->venta_id);

    if ($carrito->estado !== 'carrito') {
    return back()->with('error', 'No puedes modificar una compra confirmada');
    }
    $producto = Producto::findOrFail($item->producto_id);

    $accion = $request->accion;

    if ($accion === 'mas') {
        $nuevaCantidad = $item->cantidad + 1;
    } else {
        $nuevaCantidad = $item->cantidad - 1;
    }

    // ❌ eliminar si llega a 0
  if ($nuevaCantidad <= 0) {

    $item->delete();

    return back()->with('error', 'El producto fue eliminado del carrito');
}

    // 🚨 validar stock
    if ($nuevaCantidad > $producto->stock) {
        return back()->with('error', 'No hay suficiente stock disponible');
    }

    // ✔ actualizar
    $item->cantidad = $nuevaCantidad;
    $item->subtotal = $nuevaCantidad * $item->precio_unitario;
    $item->save();

    // 🔄 actualizar total carrito
    $carrito = VentaCabecera::find($item->venta_id);

    $carrito->total = VentaDetalle::where('venta_id', $carrito->id)
        ->sum('subtotal');

    $carrito->save();

    return back();

   
}
public function checkout()
{
    $carrito = $this->obtenerCarrito();

    $items = VentaDetalle::where('venta_id', $carrito->id)
        ->with('producto')
        ->get();

    return view('backend.checkout', compact('items', 'carrito'));
}
public function factura($id)
{
    $venta = VentaCabecera::with(['detalles.producto'])
        ->findOrFail($id);

    return view('backend.factura', ['venta' => $venta]);
}

public function misPedidos()
{
    $pedidos = VentaCabecera::with('detalles.producto')
        ->where('user_id', Auth::id())
        ->whereIn('estado', [
    'pendiente_pago',
    'pagado',
    'enviado',
    'cancelado'
])
        ->orderBy('id', 'desc')
        ->get();

    return view('backend.usuarios.pedidos', compact('pedidos'));
}


}