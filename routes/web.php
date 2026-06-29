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

Route::get('/', [HomeController::class, 'index']);
Route::get('/inicio', [HomeController::class, 'index']);

Route::view('/quienes-somos', 'quienes');

Route::view('/comercializacion', 'comercializacion');

Route::get('/contacto', function () {
    return view('contacto');
});

Route::view('/terminos', 'termino');

/*==== Links categoria hombre ====*/
Route::get('/hombre', [ProductoController::class, 'hombre']);

Route::get('/hombre/ropa', [ProductoController::class, 'hombreRopa']);

Route::get('/hombre/zapatillas', [ProductoController::class, 'hombreZapatillas']);

Route::get('/hombre/botines', [ProductoController::class, 'hombreBotines']);

/*==== Links categoria mujer ====*/
Route::get('/mujer', [ProductoController::class, 'mujer']);

Route::get('/mujer/ropa', [ProductoController::class, 'mujerRopa']);

Route::get('/mujer/zapatillas', [ProductoController::class, 'mujerZapatillas']);

Route::get('/mujer/accesorios', [ProductoController::class, 'mujerAccesorios']);

/*==== Links categoria niño ====*/
Route::get('/niños', [ProductoController::class, 'ninos']);

Route::get('/niños/ropa', [ProductoController::class, 'ninosRopa']);

Route::get('/niños/zapatillas', [ProductoController::class, 'ninosZapatillas']);

Route::get('/niños/botines', [ProductoController::class, 'ninosBotines']);

/*==== Links categoria accesorios ====*/
Route::get('/accesorios', [ProductoController::class, 'accesorios']);

Route::get('/accesorios/mochila', [ProductoController::class, 'accesoriosMochila']);

Route::get('/accesorios/medias', [ProductoController::class, 'accesoriosMedias']);

Route::get('/accesorios/pelotas', [ProductoController::class, 'accesoriosPelotas']);

Route::get('/accesorios/gorras', [ProductoController::class, 'accesoriosGorras']);

Route::get('/accesorios/paletas', [ProductoController::class, 'accesoriosPaletas']);


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

    Route::put('/perfil/actualizar', [AdminController::class, 'actualizarPerfil'])
        ->name('admin.perfil.actualizar');

    Route::get('/consultas', [ConsultaController::class, 'index'])
    ->name('admin.consultas');

    Route::put('/consultas/{id}/leer',
    [ConsultaController::class, 'marcarLeido'])
    ->name('admin.consultas.leer');

    Route::get('/clientes', [AdminController::class, 'clientes'])
    ->name('admin.clientes');

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

