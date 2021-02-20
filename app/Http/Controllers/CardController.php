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

    	Log::info('se va a comenzar la funcion de crear una carta');

    	$response = "";

		$data = $request->getContent();

		$data = json_decode($data);

		$user = JWTAuth::parseToken()->authenticate();

		if(!($user->role == 'administrator')){

			Log::warning('El usuario '. $user->username .' ha intentado crear una carta');

			return 'acceso denegado';

		}else{

			if($data){

				Log::info('Se van a crear una carta ');

            	$carta = new Card();
            	$colecion = Colection::where('Name', $data->Colection)->first();

				$carta->Name = $data->Name;
				$carta->Type = $data->Type;
				$carta->Description = $data->Description;

				if($colecion)
				{
				
					$carta->Colection = $data->Colection;

				}else{

					Log::warning('Se ha intentado crear una carta que no tiene coleccion');

					$response = "no se puede crear la carta porque no existe la coleccion";
				}
			
				try{

					$carta->save();
                	
                	Log::debug('La carta ha sido creada ' . $carta);

                	$response = "Carta añadida";

                
				}catch(\Exception $e){

					$response = $e->getMessage();
				}
	
			}

		}

		return response($response);
    }



    public function verCartas()
    {

		$cartas = Card::all();

		$vista = [];

		foreach ($cartas as $carta) {
			
			$vista[] = [
				
				"Name" => $carta->Name,
				"Type" => $carta->Type,
				"Description" => $carta->Description,
				"Colection" => $carta->Colection
			];

		}

		return response()->json($resultado);

	}

	public function BuscarCartas($id)
	{
		Log::info('La funcion de buscar cartas ha empezado');

		$comprobarExistencia = Card::where('Name', $id)->first();
		
		$cartas = Card::where('Name', $id)->get();

		if(!$comprobarExistencia){

			Log::debug("Se ha buscado la carta " . $id . " la cual no existe");

			return 'esta carta no existe';
		}

		$vista = [];

		foreach ($cartas as $carta) {
			
			$vista[] = [
				
				"Name" => $carta->Name,
				"Type" => $carta->Type,
				"Description" => $carta->Description,
				"Colection" => $carta->Colection
			];

		}

		Log::debug("Se ha buscado la carta " . $cartas . " ");
		return response()->json($vista);

	}
	
}