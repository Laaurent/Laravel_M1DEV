<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       DB::table('users')->insert([
            'name' => Str::random(10),
            'email' =>'test@gmail.com',
            'user_type' => 0,
            'password' => Hash::make('password'),
        ]);
         DB::table('users')->insert([
            'name' => Str::random(10),
            'email' => 'test2@gmail.com',
            'user_type' => 1,
            'password' => Hash::make('password'),
        ]);

        
         DB::table('employes')->insert([
            'id_user' => 1,
            'first_name' => Str::random(10),
            'last_name' => Str::random(10),
        ]);
    }
}
