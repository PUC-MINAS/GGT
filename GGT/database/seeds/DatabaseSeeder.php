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

         DB::table('users')->insert([
           ['nome' => 'Diretor Executivo','email' => 'diretorExecutivo@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '1', 'setore_id' => '4'],
           ['nome' => 'Diretor','email' => 'diretor@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '2', 'setore_id' => '1'],
           ['nome' => 'Trainee','email' => 'trainee@gmail.com', 'senha' => '123456', 'tipos_usuarios_id' => '3', 'setore_id' => '1']
         ]);
     }
}
