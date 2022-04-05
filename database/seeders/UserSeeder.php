<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'id' => 1,
            'name' => 'John',
            'email' => 'jmason176@gmail.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('users')->insert([
            'id' => 2,
            'name' => 'Rachael',
            'email' => 'rachealmasoncounsellor@gmail.com',
            'password' => Hash::make('password'),
        ]);
    }
}
