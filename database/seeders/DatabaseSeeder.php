<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use Database\Seeders\ClientSeeder;
use Database\Seeders\ConformityControlSeeder;
use Database\Seeders\ContractSeeder;
use Database\Seeders\EmployeSeeder;
use Database\Seeders\StateControlSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VehiculeSeeder;
use Database\Seeders\MoralClientSeeder;
use Database\Seeders\PhysicClientSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->call(ClientSeeder::class);
        $this->call(ConformityControlSeeder::class);
        $this->call(ContractSeeder::class);
        $this->call(EmployeSeeder::class);
        $this->call(StateControlSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(VehiculeSeeder::class);   
        $this->call(MoralClientSeeder::class);   
        $this->call(PhysicClientSeeder::class);   
    }
}
