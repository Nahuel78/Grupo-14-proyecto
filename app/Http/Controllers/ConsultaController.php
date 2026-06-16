<?php 
namespace App\Http\Controllers; 
use Illuminate\Http\Request; 
use App\Models\Consulta; 

class ConsultaController extends Controller {

public function guardar(Request $request){
    Consulta::create([
        'nombre' => $request->nombre,
        'email' => $request->email,
        'asunto' => $request->asunto,
        'mensaje' => $request->mensaje,
    ]);
 
    return redirect('/contacto')
        ->with('success', 'Consulta enviada correctamente');
}

 public function index(){
    $consultas = Consulta::latest()->get();

    return view('backend.admin.consultas', compact('consultas'));
}
public function marcarLeido($id)
{
    $consulta = Consulta::findOrFail($id);

    $consulta->leido = true;
    $consulta->save();

    return back();
}
}