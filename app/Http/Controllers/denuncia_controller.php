<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\denuncia;
use Illuminate\Support\Facades\Validator;
use DB;

class denuncia_controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {/* en este espacio mediante una bariable donde se dice que esta es igual a 
        la tabla denuncia y que de esta le traiga todo y luego le retorne
        la informacion el la bariable $denuncia */
        $denuncia=Denuncia::all();
        return $denuncia;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validar=Validator::make($request->all(),
        ["nombre"=>"required"]
        ); /*la funcion de store es guardar
        y validar con el reques lo que esta ingresando el usuario*/
        if(!$validar->fails()){
            $denuncia=new Denuncia ();
            $denuncia->nombre=$request->nombre;
            $denuncia->apellidos=$request->apellidos;
            $denuncia->direccion=$request->direccion;
            $denuncia->telefomo=$request->telefomo;
            $denuncia->tipo_denuncia=$request->tipo_denuncia;
            $denuncia->save();
            return response()->json([
            'mensaje'=>"correctamente guardado"
          
        ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $denuncia=Denuncia::where("id",$id)->get();
        return $denuncia;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    // lo buscamos en el modelo y se aplica asi.
    $validacion=Validator::make($request->all(),[
        "apellidos"=>"required"
    ]);
    if(!$validacion->fails()){ //la expresion "!" es negacion
        $denuncia=Denuncia::find($id);// lo verde es esta llamando al  modelo recordar que la primera letra debe ser mayuscula 
        if(isset($denuncia)){
            $denuncia->nombre=$request->nombre;
            $denuncia->apellidos=$request->apellidos;
            $denuncia->direccion=$request->direccion;
            $denuncia->telefomo=$request->telefomo;
            $denuncia->tipo_denuncia=$request->tipo_denuncia;
            /*en estas lineas lo que le dice es que cambie */ 
            /*lo que encontro y modificado por el usuario deve ir todo lo que esta en el modelo*/
            /* en este caso en el modelo hay 3 caracterisiticas que son nombre,precio,descripcion*/
            /* para guardar los cambios que el usuario realiza
             se utilizalo siguiente*/
            $denuncia->save();
            return response()->json([//el json va a enviar un mensaje  en este caso de actualizacion
                "mensaje"=>"la denuncia fue actualizada correctamente"
            ]);
            
        }
        else{
            return response()->json([//el json va a enviar un mensaje  en este caso no encontro el registro
                "mensaje"=>"no encontro el registro "
            ]);
        }
    
    }
    else{
            return response()->json([//el json va a enviar un mensaje  en este caso validacion incorrecta
                "mensaje"=>"error validacion incorrecta"
            ]);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $denuncia=Denuncia::find($id);
        if(isset($denuncia)){
            $denuncia->delete();
            return response()->json([
                "mensaje"=>"denuncia borrado exitosamente",
            ]);
                
        }
        else{
            return response()->json([
                "mensaje"=>"error registro no encontrado",
            ]);
        }

    }
    public function conteo(){
        $conteo=denuncia::where('nombre','diana')->count();
        return $conteo;
    }
    
    public function conteo2(){
        $conteo2=DB::table('Denuncia')->select(DB::raw('count(*) as denun'))->get();
        return $conteo2;
    }
    public function contec(){
        $conteo3=Denuncia::where('nombre', 'like', '%p%')->get();
        return $conteo3;
    }
    public function contep(){
        $conteo4=DB::table('Denuncia')->where('nombre','like','%p%')->get();
        return $conteo4;
    }
    
    }
    
    /* para que todo los cambios que se hacen funciones debe de refrescarce y actualizar la base de datos asi.
    php artisan migrate:fresh--- --y-- -- php artisan db:seed
    para abrir en el posman primero se saca la ruta en terminal de la siguiente manera
    php artisan serve
    se copia la ruta y se la pega en posman/ luego se coloca el api, luego /nombre de la tabla donde se
    realizaran las modificaciones / luego la posicion de la modificacion */
    
}
