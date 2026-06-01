<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\contactoController;
use App\Http\Controllers\CarritoController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;


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
Route::get('/hombre', function () { return view('hombre.index'); });

Route::get('/hombre/ropa', function () { return view('hombre.ropa'); });

Route::get('/hombre/zapatillas', function () { return view('hombre.zapatillas'); });

Route::get('/hombre/botines', function () { return view('hombre.botines'); });

/*==== Links categoria mujer ====*/
Route::get('/mujer', function () {
    return view('mujer.index');
});
Route::get('/mujer/ropa', function () {
    return view('mujer.ropa');
});

Route::get('/mujer/zapatillas', function () {
    return view('mujer.zapatillas');
});

Route::get('/mujer/accesorios', function () {
    return view('mujer.accesorios');
});

/*==== Links categoria niño ====*/
Route::get('/niños', function () { return view('niños.index'); });

Route::get('/niños/ropa', function () { return view('niños.ropa'); });

Route::get('/niños/zapatillas', function () { return view('niños.zapatillas'); });

Route::get('/niños/botines', function () { return view('niños.botines'); });

/*==== Links categoria accesorios ====*/
Route::get('/accesorios',function () { return view('accesorios.index'); });

Route::get('/accesorios/mochila',function (){ return view('accesorios.mochila'); });

Route::get('/accesorios/medias',function (){ return view('accesorios.medias'); });

Route::get('/accesorios/pelotas',function (){ return view('accesorios.pelotas'); });

Route::get('/accesorios/gorras',function (){ return view('accesorios.gorras'); });

Route::get('/accesorios/paletas',function (){ return view('accesorios.paletas'); });


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

Route::get('/login', [AuthController::class, 'formularioLogin']);
Route::post('/login', [AuthController::class, 'autenticar']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


/* === Paneles de Usuario (Clientes) === */
Route::get('/cliente', [ClienteController::class, 'index'])->middleware('auth');

/* === GRUPO ADMINISTRADOR (Protegido) === */
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->group(function () {
    
    // 1. Panel principal: Llama a 'mostrarPanel' (no a 'dashboard')
    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.panel');

    // 2. Gestión de Productos: Llama a 'gestionarProductos' en ProductoController
    Route::get('/productos', [ProductoController::class, 'gestionarProductos'])->name('admin.productos');
    
   /* === GRUPO ADMINISTRADOR (Protegido) === */
Route::middleware(['auth', 'rol:admin'])->prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'dashboard'])->name('admin.panel');

    Route::get('/productos', [ProductoController::class, 'gestionarProductos'])->name('admin.productos');

    Route::get('/pedidos', function () {
        return view('backend.admin.pedidos');
    })->name('admin.pedidos');

    Route::get('/productos/crear', function () {
    return view('backend.admin.crear-producto');
    })->name('admin.productos.crear');
    });
});

