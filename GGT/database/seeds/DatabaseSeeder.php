<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
     public function run()
     {
         // $this->call(UsersTableSeeder::class);

         //popula tabelas
         DB::table('tipos_usuarios')->insert([
           ['titulo' => 'Diretor Executivo'],
           ['titulo' => 'Diretor'],
           ['titulo' => 'Trainee']
         ]);

         DB::table('setores')->insert([
           ['titulo' => 'Diretoria Financeira'],
           ['titulo' => 'Diretoria de Marketing'],
           ['titulo' => 'Diretoria de Projetos'],
           ['titulo' => 'Diretoria Executiva']
         ]);

         DB::table('status_tarefas')->insert([
           ['titulo' => 'Ativa'],
           ['titulo' => 'Entregue'],
           ['titulo' => 'Finalizada'],
           ['titulo' => 'Desativada']
         ]);

         DB::table('users')->insert([
           ['nome' => 'Diretor Executivo','email' => 'diretorExecutivo@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '1', 'setores_id' => '4'],
           ['nome' => 'Diretor','email' => 'diretor@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '2', 'setores_id' => '1'],
           ['nome' => 'Trainee','email' => 'trainee@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '3', 'setores_id' => '1']
         ]);

         DB::table('hierarquias')->insert([
           ['users_id_superior' => 1, 'users_id_subordinado' => 2],
           ['users_id_superior' => 2, 'users_id_subordinado' => 3]
         ]);
     }
}
