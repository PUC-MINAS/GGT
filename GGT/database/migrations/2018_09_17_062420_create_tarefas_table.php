<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarefas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('titulo');
            $table->mediumText('descricao');
            $table->date('data_limite');
            $table->date('data_entrega')->nullable();            
            $table->integer('recompensa');
            $table->integer('users_id_criador');
            $table->integer('users_id_responsavel');
            $table->integer('status_tarefas_id');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarefas');
    }
}
