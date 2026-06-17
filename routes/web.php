<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\contactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConsultaController;

use App\Models\Producto;
use Illuminate\Support\Facades\Auth;


/*==== Links de las paginas ====*/

Route::get('/inicio', function () {

    session(['ultima_categoria' => url('/inicio')]);

    $productos = Producto::where('destacado', 1)->get();

    return view('inicio', compact('productos'));
});

Route::view('/quienes-somos', 'quienes');

Route::view('/comercializacion', 'comercializacion');

Route::get('/contacto', function () {
    return view('contacto');
});

Route::view('/terminos', 'termino');

/*==== Links categoria hombre ====*/
Route::get('/hombre', function () {
   session(['ultima_categoria' => url()->current()]);
$productos = Producto::where('categoria', 'hombre')->get();

    return view('hombre.index', compact('productos'));
});

Route::get('/hombre/ropa', function () {
session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('hombre.ropa', compact('productos'));
});

Route::get('/hombre/zapatillas', function () {
session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('hombre.zapatillas', compact('productos'));
});

Route::get('/hombre/botines', function () {
session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'botines')
        ->get();

    return view('hombre.botines', compact('productos'));
});

/*==== Links categoria mujer ====*/
Route::get('/mujer', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'mujer')->get();
    return view('mujer.index', compact('productos'));
});

Route::get('/mujer/ropa', function () {
session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('mujer.ropa', compact('productos'));
});

Route::get('/mujer/zapatillas', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('mujer.zapatillas', compact('productos'));
});

Route::get('/mujer/accesorios', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'accesorios')
        ->get();

    return view('mujer.accesorios', compact('productos'));
});

/*==== Links categoria niño ====*/
Route::get('/niños', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'niños')->get();
    return view('niños.index', compact('productos'));
});

Route::get('/niños/ropa', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('niños.ropa', compact('productos'));
});

Route::get('/niños/zapatillas', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('niños.zapatillas', compact('productos'));
});

Route::get('/niños/botines', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'botines')
        ->get();

    return view('niños.botines', compact('productos'));
});

/*==== Links categoria accesorios ====*/
Route::get('/accesorios', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'accesorios')->get();
    return view('accesorios.index', compact('productos'));
});

Route::get('/accesorios/mochila', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'mochila')
        ->get();

    return view('accesorios.mochila', compact('productos'));
});

Route::get('/accesorios/medias', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'medias')
        ->get();

    return view('accesorios.medias', compact('productos'));
});

Route::get('/accesorios/pelotas', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'pelotas')
        ->get();

    return view('accesorios.pelotas', compact('productos'));
});

Route::get('/accesorios/gorras', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'gorras')
        ->get();

    return view('accesorios.gorras', compact('productos'));
});

Route::get('/accesorios/paletas', function () {
    session(['ultima_categoria' => url()->current()]);
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'paletas')
        ->get();

    return view('accesorios.paletas', compact('productos'));
});



Route::middleware(['auth', 'rol:cliente'])->group(function () { 
        // Mostrar el carrito  
           Route::get('/backend/carrito', [CarritoController::class, 'index'])                          
            ->name('cliente.carrito');     
          Route::get('/checkout', [CarritoController::class, 'checkout'])
        ->name('checkout');
        Route::middleware(['auth'])->group(function () {
    Route::get('/factura/{id}', [CarritoController::class, 'factura'])
        ->name('factura');
});
        // Agregar un producto     
            Route::post('/backend/carrito/agregar', [CarritoController::class, 'agregar'])                                    
            ->name('carrito.agregar');    
        // Eliminar un producto     
             Route::delete('/backend/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])                                            
             ->name('carrito.eliminar');     
        // Confirmar la compra     
             Route::post('/backend/carrito/confirmar', [CarritoController::class, 'confirmar'])                                      
             ->name('carrito.confirmar'); 
        //cantida de producto  
             Route::put('/carrito/cantidad/{id}', [CarritoController::class, 'cambiarCantidad'])
             ->name('carrito.cambiarCantidad');
            

  // Vista de compra confirmada (protegida: redirige si no hay sesión) 
   Route::get('/compra-confirmada', function () { 
    if (!session('total')) { 
         return redirect()->route('cliente.dashboard');
          } 
          return view('backend.usuarios.compra-confirmada'); 
          })->name('compra.confirmada'); 
          }); 


/* === Links de Sistema de Autenticación === */
Route::get('/registro', [AuthController::class, 'formularioRegistro']);
Route::post('/registro', [AuthController::class, 'registrar']);

Route::get('/login', [AuthController::class, 'formularioLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* === Paneles de Usuario (Clientes) === */
Route::get('/cliente', [ClienteController::class, 'index'])
    ->middleware('auth')
    ->name('cliente');

/* === GRUPO ADMINISTRADOR (Protegido) === */

Route::middleware(['auth', 'rol:admin'])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])
        ->name('admin.panel');

    // FACTURA ADMIN
    Route::get('/factura/{id}', [CarritoController::class, 'factura'])
        ->name('admin.factura');

    // PRODUCTOS
    Route::get('/productos', [ProductoController::class, 'gestionarProductos'])
        ->name('admin.productos');

    Route::post('/productos', [ProductoController::class, 'guardarProducto'])
        ->name('admin.productos.guardar');

    Route::get('/productos/crear', function () {
        return view('backend.admin.crear-producto');
    })->name('admin.productos.crear');

    Route::put('/productos/{id}', [ProductoController::class, 'update'])
        ->name('admin.productos.update');

    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])
        ->name('admin.productos.editar');

    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])
        ->name('admin.productos.destroy');

    // PEDIDOS
    Route::get('/pedidos', [AdminController::class, 'pedidos'])
        ->name('admin.pedidos');

        Route::delete('/pedidos/{id}', [AdminController::class, 'eliminarPedido'])
    ->name('admin.pedidos.eliminar');

    // PERFIL
    Route::get('/perfil', function () {
        return view('backend.admin.perfil-admin');
    })->name('admin.perfil');

    Route::get('/perfil/editar', [AdminController::class, 'editarPerfil'])
        ->name('admin.perfil.editar');


Route::put('/perfil/actualizar',
    [AdminController::class, 'actualizarPerfil'])
    ->name('admin.perfil.actualizar');

    Route::get('/consultas', [ConsultaController::class, 'index'])
    ->name('admin.consultas');

Route::put('/consultas/{id}/leer',
    [ConsultaController::class, 'marcarLeido'])
    ->name('admin.consultas.leer');

    Route::get('/clientes', [AdminController::class, 'clientes'])
    ->name('admin.clientes');

    Route::put('/perfil/actualizar', [AdminController::class, 'actualizarPerfil'])
        ->name('admin.perfil.actualizar');

       Route::put('/pedidos/{id}/estado', [AdminController::class, 'cambiarEstado'])
    ->name('admin.pedidos.estado');

});

/*=== Cliente ===*/
Route::get('/cliente/pedidos', [ClienteController::class, 'misPedidos'])
    ->middleware('auth')
    ->name('cliente.pedidos');


Route::get('/cliente/perfil', function () {
    return view('backend.usuarios.perfil');
})->middleware('auth')->name('cliente.perfil');

Route::get('/cliente/perfil/editar', [ClienteController::class, 'editarPerfil'])
    ->middleware('auth')
    ->name('cliente.perfil.editar');

Route::put('/cliente/perfil', [ClienteController::class, 'actualizarPerfil'])
    ->middleware('auth')
    ->name('cliente.perfil.actualizar');

/*=== Buscador del menu ===*/
Route::get('/buscar', [ProductoController::class, 'buscar'])->name('buscar');

/*==== Link de mensaje de exito de formulario====*/
Route::post('/contacto', [ConsultaController::class, 'guardar']);

