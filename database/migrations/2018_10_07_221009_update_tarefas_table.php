<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateTarefasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            
            
            $table->foreign('users_id_criador')
                    ->references('id')
                    ->on('users');
            $table->foreign('users_id_responsavel')
                    ->references('id')
                    ->on('users');
            $table->foreign('status_tarefas_id')
                    ->references('id')
                    ->on('status_tarefas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tarefas', function (Blueprint $table) {
            
            $table->dropForeign('tarefas_users_id_criador_foreign');
            $table->dropForeign('tarefas_users_id_responsavel_foreign');
            $table->dropForeign('tarefas_status_tarefas_id_foreign');
        });
    }
}
