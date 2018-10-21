<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateHierarquiaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('hierarquias', function(Blueprint $table) {
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
        Schema::table('hierarquias', function (Blueprint $table) {
            
            $table->dropForeign('hierarquias_users_id_subordinado_foreign');
            $table->dropForeign('hierarquias_users_id_superior_foreign');
        });
    }
}
