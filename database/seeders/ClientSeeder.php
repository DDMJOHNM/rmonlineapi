<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Hash;

    class ClientSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         *
         * @return void
         */
        public function run()
        {
            DB::table('clients')->insert([
                    [
                        'id' => 1,
                        'firstName' => 'Jim',
                        'lastName' => 'Scott',
                        'street' => '1 Alhambra Lane',
                        'city' => 'Auckland',
                        'country' => 'New Zealand',
                        'email' => 'jim@email.com',
                        'contactNumber' => '021-000-111',
                        'age' => 25,
                        'created_at' => date("Y-m-d H:i:s"),
                    ],
                    [
                        'id' => 2,
                        'firstName' => 'Allan',
                        'lastName' => 'Smith',
                        'street' => '1 Taranaki Road',
                        'city' => 'Wellington',
                        'country' => 'New Zealand',
                        'email' => 'allan@email.com',
                        'contactNumber' => '021-000-211',
                        'age' => 55,
                        'created_at' => date("Y-m-d H:i:s"),
                    ],
                ]
            );
        }
    }
