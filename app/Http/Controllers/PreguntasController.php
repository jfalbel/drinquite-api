<?php

namespace App\Http\Controllers;

use App\Pregunta as Pregunta;
//use App\Respuesta as Respuesta;

use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PreguntasController extends Controller
{

    //Funcion que guarda una pregunta
    function setPregunta(Request $request) {

        if ($request->isJson()) {
            $rBody=$request->json()->all();

            $pregunta = new Pregunta;
            $pregunta['propietario_id'] = $rBody['propietario_id']; //$rBody[0]['propietario_id'] si vienes un array de preguntas
            $pregunta['titulo'] = $rBody['titulo'];
            $pregunta->texto = $rBody['texto'];
            $pregunta->respuestas = json_encode($rBody['respuestas']);
            if ($pregunta->save()){
                return response()->json($pregunta, 200);
            }else{
                return response()->json('Error al guardar', 200);
            }

        }else {

            return response()->json('Petición no soportada', 501);
        }
    }


    function getProximaPregunta (Request $request) {
        if ($request->isJson()) {
            $availableAsk = Pregunta::all();

            return response()->json('ehh', 200);
        }
        return response()->json(['error' => 'List Unauthorized'],401);
    }


    //Funcion que envia una pregunta
    function getPregunta(Request $request) {
        if ($request->isJson()) {
            $ask = Pregunta::first()->where('propietario_id','1');
            return response()->json($ask, 200);
        }else {
            //$ask = Pregunta->where('FK_PROPIETARIO','1');
            return response()->json('', 200);
        }
        return response()->json(['error' => 'List Unauthorized'],401);
    }

    //Funcion que envia una pregunta
    function listPregunta(Request $request) {
        if ($request->isJson()) {
            $ask = Pregunta::with(['respuestas'])->where('propietario_id','1')->get();
            $response = array('code' => 200,'data' => $ask);
            return response()->json($response, 200);
        }else {
            //$ask = Pregunta->where('FK_PROPIETARIO','1');
            //$ask = Pregunta::all();
            $ask = Pregunta::with(['respuestas'])->where('propietario_id','1')->get();
            /*foreach ($ask as $p){
                echo json_encode($p->respuestas);
            }*/
            echo json_encode($ask);
            return response()->json('no es json', 200);
        }
        return response()->json(['error' => 'List Unauthorized'],401);
    }
}
