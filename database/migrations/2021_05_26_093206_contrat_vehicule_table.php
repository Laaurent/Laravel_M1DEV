<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratVehiculeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts_vehicules', function (Blueprint $table) {
            $table->integer('id_contract')->unsigned();
            $table->integer('id_vehicule')->unsigned();
            $table->primary(['id_contract', 'id_vehicule']);
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('id_contract')
                ->references('id')
                ->on('contracts')->onDelete('cascade');;    
            $table->foreign('id_vehicule')
                ->references('id')
                ->on('vehicules')->onDelete('cascade');;

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats_vehicules');
    }
}
