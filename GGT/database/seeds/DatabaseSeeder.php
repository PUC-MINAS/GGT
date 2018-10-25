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
           ['titulo' => 'Diretoria de Projetos']
         ]);
     }
}
