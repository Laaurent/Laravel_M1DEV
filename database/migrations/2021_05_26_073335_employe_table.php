<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class EmployeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_user')->unsigned();

            $table->string('first_name',255);
            $table->string('last_name',255);
            $table->boolean('active')->default(1);

            $table->timestamps();

            $table->foreign('id_user')
                ->references('id')
                ->on('users')->onDelete('cascade');; 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employes');
    }
}
