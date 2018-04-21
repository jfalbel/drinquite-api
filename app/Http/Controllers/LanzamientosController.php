<?php

namespace App\Http\Controllers;

use App\Lanzamiento as Lanzamiento;
use App\Pregunta as Pregunta;
use App\Propietario as Propietario;
use Illuminate\Http\Request;

class LanzamientosController extends Controller
{
    function index(){
        return response()->json('nada por aqui',200);

    }

    function set(Request $request){



        $lanzamiento = new Lanzamiento();

        $lanzamiento->pregunta_id = 3;
        $lanzamiento->propietario_id = 1;
        $lanzamiento->duracion;
        $lanzamiento->finalizada = false;
        $lanzamiento->abortada = false;
        $lanzamiento->momento_activacion;
        $lanzamiento->save();

        return response()->json($lanzamiento,201);
    }

    function get(Request $request){
        $lanzamiento = Lanzamiento::all()->where('propietario_id','=',1);
        $propietario=new Propietario();
        $propietario->Pregunta = new Pregunta();
        $propietario->id = 1;

        $propietario->Pregunta->Lanzamiento->all();
        return response()->json($lanzamiento,200);
    }
    function put(){}
    function delete(){}


}
