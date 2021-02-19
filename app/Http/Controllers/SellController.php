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

		$cartas = Sell::where('Card',$id)->orderBy('price','asc')->get();

		$resultado = [];

		foreach ($cartas as $carta) {
			
			$resultado[] = [

				"Card" => $carta->Card,
				"Quantity" => $carta->Quantity,
				"Price" => $carta->Price
			];

		}

		return response()->json($resultado);
	
	}

}
