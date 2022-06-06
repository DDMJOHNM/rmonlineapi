<?php

	namespace App\Services;

    use http\Client\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Log;

    /*
     * Logging to be implemented
     * Covert to use aws dynamo db and cloud bucket
     * Cloud Watch Logs
     * Validation custom rules - contract
     */

    class Client
	{
        public function getClient(int $id): object
        {
            $result = DB::table('clients')->where('id', $id)->first();
            return $result;
        }

        public function getClients(): array
        {
                Log::info("LoggedIn",array(Auth::check()));
                $results = DB::select('select * from clients');
                return $results;

        }

        public function addClient(Array $data): bool
        {
            $result = DB::insert('insert into clients (firstName, lastName, street, city, country, email, contactNumber, age, created_at)
            values (?, ?, ?, ?, ?, ?, ?, ?, ? )',$data);
            return true;
        }

        public function updateClient(int $id ,Array $data): bool
        {
            $client = \App\Models\Client::find($id);
            $client->firstName = $data['firstName'];
            $client->lastName = $data['lastName'];
            $client->street =  $data['street'];
            $client->city = $data['city'];
            $client->country = $data['country'];
            $client->email = $data['email'];
            $client->contactNumber = $data['contactNumber'];
            $client->age = $data['age'];
            $client->created_at = $data['created_at'];
            $client->save();
            return true;
        }

        public function deleteClient(int $id): bool
        {
            $client = \App\Models\Client::find($id);
            $client->delete();
            return true;
        }

        public function searchClient(string $data, Request $request): bool
        {
            $clients = \App\Models\Client::search($request->search)->get();
            ddd($clients);
            return true;
        }

}
