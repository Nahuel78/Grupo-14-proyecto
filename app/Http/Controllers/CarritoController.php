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

    $carrito = VentaCabecera::firstOrCreate([
        'user_id' => Auth::id(),
        'estado' => 'carrito',
    ]);

    $producto = Producto::findOrFail($request->producto_id);


   $item = VentaDetalle::where('venta_id', $carrito->id)
    ->where('producto_id', $producto->id)
    ->first();

if ($item) {

    $item->cantidad += $request->cantidad;
    $item->subtotal = $item->cantidad * $item->precio_unitario;
    $item->save();

} else {

    VentaDetalle::create([
        'venta_id' => $carrito->id,
        'producto_id' => $producto->id,
        'cantidad' => $request->cantidad,
        'precio_unitario' => $producto->precio,
        'subtotal' => $producto->precio * $request->cantidad,
    ]);
}
$carrito->total = VentaDetalle::where('venta_id', $carrito->id)
    ->sum('subtotal');

$carrito->save();

   if ($request->ajax()) {
    return response()->json([
        'success' => true
    ]);
}

return back();
       
}
    // Confirmar compra
    public function confirmar()
    {
        $carrito = $this->obtenerCarrito();

        $items = VentaDetalle::where('venta_id', $carrito->id)
            ->with('producto')
            ->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'Tu carrito está vacío');
        }

        $carrito->update([
            'estado' => 'confirmado',
            'fecha_venta' => now(),
        ]);

        return redirect()->route('compra.confirmada')
            ->with('items', $items)
            ->with('total', $carrito->total);
    }
    public function eliminar($id)
{
    $item = VentaDetalle::findOrFail($id);

    $carrito = VentaCabecera::findOrFail($item->venta_id);

    $item->delete();

    // Recalcular total del carrito
    $carrito->total = VentaDetalle::where('venta_id', $carrito->id)
        ->sum('subtotal');

    $carrito->save();

    return redirect()
        ->route('cliente.carrito')
        ->with('success', 'Producto eliminado del carrito');
}
}