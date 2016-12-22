<?php

namespace App\Http\Controllers;

use App\Client;

class ClientCtrl extends Controller
{
   
    public function index() {
    	$clients = Client::all();
		return response()->json($clients, 200);
    }

	public function single($id) {
    	$client = Client::find($id);
		return response()->json($client, 200);
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
