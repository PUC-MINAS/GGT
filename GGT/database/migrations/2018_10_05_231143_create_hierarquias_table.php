<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHierarquiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hierarquias', function (Blueprint $table) {
            $table->integer('users_id_superior');
            $table->integer('users_id_subordinado');
            $table->foreign("users_id_superior")
                    ->references('id')
                    ->on('users');
            $table->foreign("users_id_subordinado")
                    ->references('id')
                    ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hierarquias');
    }
}
