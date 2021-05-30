<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMoralsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('morals_clients', function (Blueprint $table) {
            $table->bigInteger('id_client')->unsigned();
            $table->primary('id_client');
            $table->string('name')->nullable();
            $table->bigInteger('SIRET_number')->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();

            $table->foreign('id_client')
                ->references('id_user')
                ->on('clients'); 
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('morals_clients');
    }
}
