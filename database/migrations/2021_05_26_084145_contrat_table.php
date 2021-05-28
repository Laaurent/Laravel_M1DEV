<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ContratTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->bigInteger('id_user')->unsigned();
            $table->bigInteger('id_employe')->unsigned();
            $table->date('contract_start');
            $table->date('contract_end');

            $table->foreign('id_user')
                  ->references('id')->on('users')
                  ->onDelete('cascade');
            $table->foreign('id_employe')
                  ->references('id_user')->on('employes')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('contrats');
    }
}
