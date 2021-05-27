<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ControleConformiteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conformities_controls', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_vehicule')->unsigned();
            $table->date('date');
            $table->text('commentaire')->nullable();
            $table->timestamps();

            $table->foreign('id_vehicule')
            ->references('id')->on('vehicules')
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
        Schema::dropIfExists('controles_conformite');
    }
}
