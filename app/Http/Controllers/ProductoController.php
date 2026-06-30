<?php 

namespace App\Http\Controllers; 

use App\Models\Producto; 
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    
public function hombre()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Hombre')
        ->where('activo', 1)
        ->get();

    return view('hombre.index', compact('productos'));
}

public function hombreRopa()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'ropa')
        ->where('activo', 1)
        ->get();

    return view('hombre.ropa', compact('productos'));
}

public function hombreZapatillas()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'zapatillas')
        ->where('activo', 1)
        ->get();

    return view('hombre.zapatillas', compact('productos'));
}

public function hombreBotines()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'botines')
        ->where('activo', 1)
        ->get();

    return view('hombre.botines', compact('productos'));
}

public function mujer()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Mujer')
        ->where('activo', 1)
        ->get();

    return view('mujer.index', compact('productos'));
}

public function mujerRopa()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'ropa')
        ->where('activo', 1)
        ->get();

    return view('mujer.ropa', compact('productos'));
}

public function mujerZapatillas()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'zapatillas')
        ->where('activo', 1)
        ->get();

    return view('mujer.zapatillas', compact('productos'));
}

public function mujerAccesorios()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'accesorios')
        ->where('activo', 1)
        ->get();

    return view('mujer.accesorios', compact('productos'));
}

public function ninos()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Niños')
        ->where('activo', 1)
        ->get();

    return view('niños.index', compact('productos'));
}

public function ninosRopa()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'ropa')
        ->where('activo', 1)
        ->get();

    return view('niños.ropa', compact('productos'));
}

public function ninosZapatillas()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'zapatillas')
        ->where('activo', 1)
        ->get();

    return view('niños.zapatillas', compact('productos'));
}

public function ninosBotines()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'botines')
        ->where('activo', 1)
        ->get();

    return view('niños.botines', compact('productos'));
}

public function accesorios()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('activo', 1)
        ->get();

    return view('accesorios.index', compact('productos'));
}

public function accesoriosMochila()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'mochila')
        ->where('activo', 1)
        ->get();

    return view('accesorios.mochila', compact('productos'));
}

public function accesoriosMedias()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'medias')
        ->where('activo', 1)
        ->get();

    return view('accesorios.medias', compact('productos'));
}

public function accesoriosPelotas()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'pelotas')
        ->where('activo', 1)
        ->get();

    return view('accesorios.pelotas', compact('productos'));
}

public function accesoriosGorras()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'gorras')
        ->where('activo', 1)
        ->get();

    return view('accesorios.gorras', compact('productos'));
}

public function accesoriosPaletas()
{
    session(['ultima_categoria' => url()->current()]);

    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'paletas')
        ->where('activo', 1)
        ->get();

    return view('accesorios.paletas', compact('productos'));
}




  public function gestionarProductos()
{
    $productos = Producto::all();

    return view('backend.admin.productos', compact('productos'));
}

public function reactivar($id)
{
    $producto = Producto::findOrFail($id);

    $producto->activo = 1;
    $producto->save();

    return redirect()->route('admin.productos')
        ->with('success', 'Producto reactivado correctamente');
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