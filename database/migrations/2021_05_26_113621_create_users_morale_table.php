<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersMoraleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('moral_users', function (Blueprint $table) {
            $table->bigInteger('id_client')->unsigned();
            $table->primary('id_client');
            $table->string('name');
            $table->bigInteger('SIRET_number');

            $table->foreign('id_client')
                ->references('id')
                ->on('users'); 
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_morale');
    }
}
