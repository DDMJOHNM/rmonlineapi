<?php

	namespace App\Http\Controllers\Client;

    use App\Services\Client;
    use App\Rules\StringLengthCheck;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\Validator;

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
//          $validate = $request->validate([
//               'firstName' => ['required','string', new StringLengthCheck],
//               'lastName' => ['required','string', new StringLengthCheck],
//           ]);

            $validator = Validator::make($request->all(), [
                'firstName' => 'required',
                'lastName' => 'required',
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

            if ($validator->fails()) {
                return response()->json(['error' => $validator->errors()]);
            }

            $result = $client->addClient($data);
            if ($result === false){
                return response()->json([ 'error' => 'There was an error inserting the record' ]);
            }

            return response()->json([ 'success' => 'Client sucessfully added' ]);
        }
	}
