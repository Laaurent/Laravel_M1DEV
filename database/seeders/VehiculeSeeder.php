<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Carbon\Carbon;

class VehiculeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vehicules')->insert([
            'model' => 'Q1',
            'weight' => '100',
            'brand' => 'Audi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vehicules')->insert([
            'model' => 'Q2',
            'weight' => '110',
            'brand' => 'Audi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vehicules')->insert([
            'model' => 'Q3',
            'weight' => '120',
            'brand' => 'Audi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
        DB::table('vehicules')->insert([
            'model' => 'Q4',
            'weight' => '130',
            'brand' => 'Audi',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
