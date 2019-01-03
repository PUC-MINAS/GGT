<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatePremiacoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('premiacoes', function (Blueprint $table) {
            $table->foreign('premio_id')->references('id')->on('premios');
            $table->foreign('user_id')->references('id')->on('users');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('premiacoes', function (Blueprint $table) {
            
            $table->dropForeign('premiacoes_premio_id_foreign');
            $table->dropForeign('premiacoes_user_id_foreign');
        });
    }
}
