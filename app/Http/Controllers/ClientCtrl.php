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
   
    public function index($company_id) {
    	$clients = Client::where('company_id', intval($company_id))->get();
		return response()->json($clients, 200);
    }

	public function single($company_id, $id) {
    	$client = Client::find($id);
    	//return $client;
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

	public function update(Request $request, $client_id){

		$getClient = Client::find($client_id);

		if($getClient){

			$newRut_CI = $request->get('rut_CI');
			$newNombre = $request->get('nombre');
			$newNombre_fantasia = $request->get('nombre_fantasia');
			$newNombre_contacto = $request->get('nombre_contacto');
			$newDepartamento = $request->get('departamento');
			$newCiudad = $request->get('ciudad');
			$newDireccion = $request->get('direccion');
			$newTel = $request->get('tel');
			$newCel = $request->get('cel');
			$newEmail = $request->get('email');

			$getClient->rut_CI = $newRut_CI;
			$getClient->nombre = $newNombre;
			$getClient->nombre_fantasia = $newNombre_fantasia;
			$getClient->nombre_contacto = $newNombre_contacto;
			$getClient->departamento = $newDepartamento;
			$getClient->ciudad = $newCiudad;
			$getClient->direccion = $newDireccion;
			$getClient->tel = $newTel;
			$getClient->cel = $newCel;
			$getClient->email = $newEmail;

			$getClient->save();
			
			return response()->json(['ok' => "Client Updated"], 201);

		}

		return response()->json(['Error' => "Client do not exist"], 418);

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
