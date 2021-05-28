<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

use Carbon\Carbon;

class MoralClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('morals_clients')->insert([
            'id_client' => 2,
            'name' => Str::random(10),
            'SIRET_number' => 2416512,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
