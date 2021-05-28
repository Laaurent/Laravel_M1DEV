<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->bigInteger('id_user')->unsigned();
            $table->primary('id_user');

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users'); 
        });

        //* Pas implémenté sous laravel
        DB::statement('ALTER Table clients add client_number INTEGER NOT NULL UNIQUE AUTO_INCREMENT;');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
