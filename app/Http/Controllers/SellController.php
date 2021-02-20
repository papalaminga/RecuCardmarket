<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Card;
use App\Models\Sell;
use JWTAuth;

class SellController extends Controller
{

   public function CrearVenta(Request $request)
   {

   		$response = "";

		$data = $request->getContent();

		$data = json_decode($data);

		$user = JWTAuth::parseToken()->authenticate();

		if($user->role == 'administrator'){

			$response = 'el administrador solo administra, no crea ventas';

		}else{

			if($data){
				
				$venta = new Sell();
				$carta = Card::where('Name', $data->Card)->first();

				if($carta){

					$venta->Card = $data->Card;

				}else{

					$response = "No existe la carta";
				}
				
				$venta->Quantity = $data->Quantity;
				$venta->Price = $data->Price;
				$venta->Seller = $user->username;

				try{

    				$venta->save();

    				$response = "La venta se ha creado";

    		 	}catch(\Exception $e){

    				$response = $e->getMessage();

    	    }

			}

		}	

		return response($response);
	
	}

	public function VerVentas()

	{

		$ventas = Sell::all();

		$resultado = [];

		foreach ($ventas as $venta) {
			
			$resultado[] = [
				"Card" => $venta->Card,
				"Quantity" => $venta->Quantity,
				"Price" => $venta->Price,
			];

		}

		return response()->json($resultado);

	}


	public function BuscarCarta($id)
	{
		Log::info("La funcion de Buscar cartas en venta ha comenzado");

		//print_r('la id es ' . $id . ' ');

		if(!$id){

			Log::info("No hay ningun valor para buscar");

			return "No has escrito un nombre";

		}

		$comprobarExistencia = Card::where('Name', $id)->first();

		$comprobarCarta = Sell::where('Card', $id)->first();

		$cartas = Sell::where('Card',$id)->orderBy('price','asc')->get();

		//print($comprobarCarta);

		if($comprobarCarta == null){

			Log::debug("Se ha buscado la carta " . $id . " la cual no esta a la venta");

			return "Oye que la carta que has escrito no esta a la venta";

		}

		if(!$comprobarExistencia){

			Log::debug("Se ha buscado la carta " . $id . " la cual no esta a la venta ni existe en la vase de datos");

			return "Oye que la carta que has escrito no esta a la venta y ni existe";

		}

		$vista = [];

		foreach ($cartas as $carta) {
			
			$vista[] = [

			"Card" => $carta->Card,
			"Quantity" => $carta->Quantity,
			"Price" => $carta->Price

			];

		}

		Log::debug("Se ha buscado la carta " . $comprobarCarta . " ");
		return response()->json($vista);
	

	}
		

}
