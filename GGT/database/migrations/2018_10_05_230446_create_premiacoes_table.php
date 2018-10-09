<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePremiacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('premiacoes', function (Blueprint $table) {
            $table->date("data_resgate");
            $table->integer("valor_pago");
            $table->integer('premio_id');
            $table->integer('user_id');
            //$table->foreign('premio_id')->references('id')->on('premios');
            //$table->foreign('user_id')->references('users')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('premiacoes');
    }
}
