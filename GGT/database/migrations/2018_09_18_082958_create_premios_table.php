<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premios', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->string('descricao');
            $table->integer('valor');
            $table->integer('vagas');
            $table->dateTime('data_expirar');
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
        Schema::dropIfExists('premios');
    }
}
