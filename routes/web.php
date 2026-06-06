<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\contactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;




/*==== Links de las paginas ====*/

Route::get('/', function () { return view('inicio'); }); 

Route::view('/quienes-somos', 'quienes');

Route::view('/comercializacion', 'comercializacion');

Route::get('/contacto', function () {
    return view('contacto');
});
/*==== Link de mensaje de exito de formulario====*/
Route::post('/contacto', [ContactoController::class, 'procesar']);

Route::view('/terminos', 'termino');

/*==== Link para volver al inicio ====*/
Route::get('/inicio', function () { return view('inicio'); });

/*==== Links categoria hombre ====*/
Route::get('/hombre', function () {
    $productos = Producto::where('categoria', 'hombre')->get();
    return view('hombre.index', compact('productos'));
});

Route::get('/hombre/ropa', function () {

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('hombre.ropa', compact('productos'));
});

Route::get('/hombre/zapatillas', function () {

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('hombre.zapatillas', compact('productos'));
});

Route::get('/hombre/botines', function () {

    $productos = Producto::where('categoria', 'Hombre')
        ->where('subcategoria', 'botines')
        ->get();

    return view('hombre.botines', compact('productos'));
});

/*==== Links categoria mujer ====*/
Route::get('/mujer', function () {
    $productos = Producto::where('categoria', 'mujer')->get();
    return view('mujer.index', compact('productos'));
});

Route::get('/mujer/ropa', function () {

    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('mujer.ropa', compact('productos'));
});

Route::get('/mujer/zapatillas', function () {
    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('mujer.zapatillas', compact('productos'));
});

Route::get('/mujer/accesorios', function () {
    $productos = Producto::where('categoria', 'Mujer')
        ->where('subcategoria', 'accesorios')
        ->get();

    return view('mujer.accesorios', compact('productos'));
});

/*==== Links categoria niño ====*/
Route::get('/niños', function () {
    $productos = Producto::where('categoria', 'niños')->get();
    return view('niños.index', compact('productos'));
});

Route::get('/niños/ropa', function () {
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'ropa')
        ->get();

    return view('niños.ropa', compact('productos'));
});

Route::get('/niños/zapatillas', function () {
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'zapatillas')
        ->get();

    return view('niños.zapatillas', compact('productos'));
});

Route::get('/niños/botines', function () {
    $productos = Producto::where('categoria', 'Niños')
        ->where('subcategoria', 'botines')
        ->get();

    return view('niños.botines', compact('productos'));
});

/*==== Links categoria accesorios ====*/
Route::get('/accesorios', function () {
    $productos = Producto::where('categoria', 'accesorios')->get();
    return view('accesorios.index', compact('productos'));
});

Route::get('/accesorios/mochila', function () {
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'mochila')
        ->get();

    return view('accesorios.mochila', compact('productos'));
});

Route::get('/accesorios/medias', function () {
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'medias')
        ->get();

    return view('accesorios.medias', compact('productos'));
});

Route::get('/accesorios/pelotas', function () {
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'pelotas')
        ->get();

    return view('accesorios.pelotas', compact('productos'));
});

Route::get('/accesorios/gorras', function () {
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'gorras')
        ->get();

    return view('accesorios.gorras', compact('productos'));
});

Route::get('/accesorios/paletas', function () {
    $productos = Producto::where('categoria', 'Accesorios')
        ->where('subcategoria', 'paletas')
        ->get();

    return view('accesorios.paletas', compact('productos'));
});


Route::get('/login', function () {
    return view('login');
});

Route::middleware(['auth', 'rol:cliente'])->group(function () { 
        // Mostrar el carrito  
           Route::get('/carrito', [CarritoController::class, 'index'])                          
            ->name('cliente.carrito');     
        // Agregar un producto     
            Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])                                    
            ->name('carrito.agregar');    
        // Eliminar un producto     
             Route::delete('/carrito/eliminar/{id}', [CarritoController::class, 'eliminar'])                                            
             ->name('carrito.eliminar');     
        // Confirmar la compra     
             Route::post('/carrito/confirmar', [CarritoController::class, 'confirmar'])                                      
             ->name('carrito.confirmar'); 

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

    Route::get('/productos', [ProductoController::class, 'gestionarProductos'])
        ->name('admin.productos');

    Route::post('/productos', [ProductoController::class, 'guardarProducto'])
        ->name('admin.productos.guardar');

    Route::get('/productos/crear', function () {
        return view('backend.admin.crear-producto');
        })->name('admin.productos.crear');

    Route::get('/pedidos', function () {
        return view('backend.admin.pedidos');
        })->name('admin.pedidos');


    Route::put('/productos/{id}', [ProductoController::class, 'update'])
    ->name('admin.productos.update');

    Route::get('/productos/{id}/editar', [ProductoController::class, 'edit'])
    ->name('admin.productos.editar');

    Route::delete('/productos/{id}', [ProductoController::class, 'destroy'])
    ->name('admin.productos.destroy');

  Route::get('/perfil', function () {
    return view('backend.admin.perfil-admin');
    })->name('admin.perfil');

Route::get('/perfil/editar',
    [AdminController::class, 'editarPerfil'])
    ->name('admin.perfil.editar');

Route::put('/perfil/actualizar',
    [AdminController::class, 'actualizarPerfil'])
    ->name('admin.perfil.actualizar');
});

/*=== Cliente ===*/

Route::get('/cliente/pedidos', function () {
    return view('backend.usuarios.pedidos');
})->middleware('auth')->name('cliente.pedidos');

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


/*=== Carrito ===*/
Route::get('/carrito', function () {

    if (auth()->check() && strtolower(auth()->user()->rol) === 'admin') {
        return redirect()->route('admin.panel');
    }

    return view('carrito');
});
