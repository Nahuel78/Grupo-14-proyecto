<?php 

namespace App\Http\Controllers; 

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function gestionarProductos()
    {
        $productos = Producto::all();

        return view('backend.admin.productos', compact('productos'));
    }

    public function guardarProducto(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'precio' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $rutaImagen = null;

        if ($request->hasFile('imagen')) {

            $archivo = $request->file('imagen');

            $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

            $archivo->move(public_path('img/productos'), $nombreArchivo);

            $rutaImagen = 'img/productos/' . $nombreArchivo;
        }

        Producto::create([
            'nombre' => $request->nombre,
            'descripcion' => $request->descripcion,
            'precio' => $request->precio,
            'stock' => $request->stock,
            'marca' => $request->marca,
            'talle' => $request->talle,
            'categoria' => $request->categoria,
            'url_imagen' => $rutaImagen,
            'activo' => 1,
            'subcategoria' => $request->subcategoria,
            'destacado' => $request->has('destacado') ? 1 : 0,
        ]);

        return redirect()->route('admin.productos')
            ->with('success', 'Producto agregado correctamente');
    }

    public function edit($id)
    {
        $producto = Producto::findOrFail($id);

        return view('backend.admin.crear-producto', compact('producto'));
    }

    public function update(Request $request, $id){
    $producto = Producto::findOrFail($id);

    $producto->nombre = $request->nombre;
    $producto->descripcion = $request->descripcion;
    $producto->precio = $request->precio;
    $producto->stock = $request->stock;
    $producto->categoria = $request->categoria;
    $producto->marca = $request->marca;
    $producto->talle = $request->talle;
    $producto->subcategoria = $request->subcategoria;
    $producto->destacado = $request->has('destacado');


    // IMAGEN 
    if ($request->hasFile('imagen')) {

        $archivo = $request->file('imagen');
        $nombreArchivo = time() . '_' . $archivo->getClientOriginalName();

        $archivo->move(public_path('img/productos'), $nombreArchivo);

        $producto->url_imagen = 'img/productos/' . $nombreArchivo;
    }

    $producto->save();

    return redirect()->route('admin.productos')
        ->with('success', 'Producto actualizado correctamente');
}

public function destroy($id)
{
    $producto = Producto::findOrFail($id);

    // Baja lógica
    $producto->activo = 0;
    $producto->save();

    return redirect()->route('admin.productos')
        ->with('success', 'Producto dado de baja correctamente');
}

public function buscar(Request $request)
{
    $query = $request->input('q');

    $productos = Producto::where('nombre', 'LIKE', "%$query%")
        ->orWhere('descripcion', 'LIKE', "%$query%")
        ->orWhere('marca', 'LIKE', "%$query%")
        ->get();

    return view('productos.resultados', compact('productos', 'query'));
}

}