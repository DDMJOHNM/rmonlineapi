<?php

	namespace App\Http\Controllers\Client;

    use App\Services\Client;
    use App\Rules\StringLengthCheck;
    use Illuminate\Http\Request;

    class ClientController extends \Illuminate\Routing\Controller
	{
        public function getClient(Request $request, Client $client){
             //validation
             return response()->json($client->getClient($request['id']));
        }

        public function getClients(Client $client){
            //pagination
            return response()->json($client->getClients());
        }

        public function add(Request $request, Client $client) : object {

           //validation
           $request->validate([
               'firstName' => ['required','string', new StringLengthCheck],
           ]);

           $data = Array(
                $request['firstName'],
                $request['lastName'],
                $request['street'],
                $request['city'],
                $request['country'],
                $request['email'],
                $request['contactNumber'],
                $request['age'],
                date("Y-m-d H:i:s"),
           );

           return response()->json($client->addClient($data));
        }
	}
