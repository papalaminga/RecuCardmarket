<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colection;
use Illuminate\Support\Facades\Log;
use JWTAuth;

class ColectionController extends Controller
{
    public function crearColeccion(Request $request)
    {
        $response = "";

        $data = $request->getContent();

        $data = json_decode($data);

        $user = JWTAuth::parseToken()->authenticate();

        if(!($user->role == 'administrator')){

            return 'acceso denegado';

        }else{

    	   if($data){

    		  $coleccion = new Colection();

    		  $coleccion->Name = $data->Name;
    		  $coleccion->Symbol = $data->Symbol;
    		  $coleccion->Release = $data->Release;

    		  try{

    			$coleccion->save();

    			$response = "La coleccion se ha creado";

    		  }catch(\Exception $e){

    			$response = $e->getMessage();
    	       }

    	   }

        }

        return response($response);
    }    
}
