<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientCtrl extends Controller
{
	private $validRules = [
				"type" 			=>'required',
				"rut_CI" 		=>'required',
				"nombre" 		=>'required',
				"departamento" 	=>'required',
				"direccion" 	=>'required',
				"email"			=>'required',
				"company_id"    =>'required'
			];
   
    public function index() {
    	$clients = Client::all();
		return response()->json($clients, 200);
    }

	public function single($id) {
    	$client = Client::find($id);
		return response()->json($client, 200);
	} 


    public function create(Request $request){

		$queryParams = $request->json()->all();
		$this->validate($request, $this->validRules);

		$clientExist = Client::where('rut_CI', $queryParams['rut_CI'])->first();


		if(empty($clientExist)){
			
			Client::create($queryParams);
			return response()->json(['ok' => "Client added"], 201);
		}

		return response()->json(['error' => "Client already exist"], 418);
		
	}

	public function destroy($id) {

		$getClient = Client::find($id);

		if($getClient){
			$getClient->delete();
			return response()->json(['ok' => "Cliente Borrado"], 201);
		}
		
		return response()->json(['error' => "el cliente no existe"], 401);	
	} 

}
