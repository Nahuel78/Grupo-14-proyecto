<?php 
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\contactoController;

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