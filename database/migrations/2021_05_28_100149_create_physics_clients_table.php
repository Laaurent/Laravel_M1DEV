<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePhysicsClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('physics_clients', function (Blueprint $table) {
            $table->integer('id_client')->unsigned();
            $table->primary('id_client');
            $table->string('first_name',255)->nullable();
            $table->string('last_name',255)->nullable();
            $table->boolean('active')->default(1);
            $table->timestamps();
            
            $table->foreign('id_client')
                ->references('id_user')
                ->on('clients')->onDelete('cascade');;
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('physics_clients');
    }
}
