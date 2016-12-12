<?php

namespace App\Http\Controllers;

use App\Client;

class ClientCtrl extends Controller
{
   
    public function index() {
    	$clients = Client::all();
		return response()->json(['data' => $clients], 200);
    }

	public function single($id) {
    	$client = Client::find($id);
		return response()->json(['data' => $client], 200);
	} 

}