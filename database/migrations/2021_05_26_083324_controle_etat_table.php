<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControleEtatTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('states_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vehicule')->unsigned();
            $table->bigInteger('id_employe')->unsigned();
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->foreign('id_vehicule')
            ->references('id')->on('vehicules')
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
        Schema::dropIfExists('controles_etat');
    }
}
