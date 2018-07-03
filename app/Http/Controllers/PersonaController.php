<?php
namespace App\Http\Controllers;
use App\Persona;

class PersonaController extends Controller {

  public function index()
  {
  	return response()->json(['datos'=>Persona::all()],200);
  }

  public function update(Request $request, $id)
  {
    $metodo=$request->method();
  	$persona=Persona::find($id);
  	if($metodo==="PATCH"){
  		$nombre=$request->get('nombre');
  		if($nombre!=null && $nombre!=' '){
  			$persona->nombre=$nombre;
  			$persona->apellido=$apellido;
  			$persona->fechaNacimiento=$fechaNacimiento;
  		}
  		$persona->save();
  		return response()->json(['mensaje'=>'Registro actualizado','codigo'=>'204'],204);
    }
  	$nombre=$request->get('nombre');
  	$apellido=$request->get('apellido');
  	if (!$nombre || !$apellido)
  	{
  		return response()->json(['mensaje'=>'El nombre o apellido no pueden ser nulos','codigo'=>'400'],400);
  	}
  	$persona->nombre=$nombre;
  	$persona->apellido=$apellido;
  	$persona->save();
  	return response()->json(['mensaje'=>'Persona actualizada','codigo'=>'200'],200);
  }

  public function store(Request $request)
  {
  	if(!$request->get('dui') || !$request->get('nombre') || !$request->get('apellido') || !$request->get('fechaNacimiento')){
  		return response()->json(['mensaje'=>'Datos incompletos'],400);
  	}
  	Persona::create($request->all());
  	return response()->json(['mensaje'=>'Persona creada'],201);
  }

  public function destroy($id)
  {
  	$persona=Persona::find($id);
  	if(!$persona){
  		return response()->json(['mensaje'=>'Persona no existe','codigo'=>'400'],400);
  	}
  	$persona->delete();
  	return response()->json(['mensaje'=>'Persona eliminada','codigo'=>'204'],204);
  }

  public function show($id)
  	{
  		$persona=Persona::find($id);
  		if(!$persona){
  			return response()->json(['mensaje'=>'Persona no encontrada'],200);
  		}
  		return response()->json(['datos'=>$persona],200);
  	}

}
