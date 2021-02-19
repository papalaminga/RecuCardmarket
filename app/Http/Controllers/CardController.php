<?php

namespace App\Http\Controllers;
use App\Models\Card;
use JWTAuth;
use App\Models\User;
use App\Models\Colection;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CardController extends Controller
{
    public function crearCarta(Request $request){

    	$response = "";

		$data = $request->getContent();

		$data = json_decode($data);

		$user = JWTAuth::parseToken()->authenticate();

		if(!($user->role == 'administrator')){

			return 'acceso denegado';

		}else{

			if($data){

            	$carta = new Card();

            	$colecion = Colection::where('Name', $data->Colection)->first();

				$carta->Name = $data->Name;
				$carta->Type = $data->Type;
				$carta->Description = $data->Description;

				if($colecion)
				{
				
					$carta->Colection = $data->Colection;

				}else{

					$response = "no se puede crear la carta porque no existe la coleccion";
				}
			
				try{

					$carta->save();
                	
                	$response = "Carta añadida";

                
				}catch(\Exception $e){

					$response = $e->getMessage();
				}
	
			}

		}

		

		return response($response);
    }



    public function verCartas(){

		$cartas = Card::all();

		$vista = [];

		foreach ($cartas as $carta) {
			
			$resultado[] = [
				
				"Name" => $carta->Card,
				"Type" => $carta->Type,
				"Description" => $carta->Description,
				"Colection" => $carta->colection
			];

		}

		return response()->json($resultado);

	}
}