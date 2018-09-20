<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});


Route::get('/tarefas', 'TarefasController@index');

Route::get('/tarefas/criar', 'TarefasController@create');

Route::post('/tarefas/store', 'TarefasController@store');

Route::get('/premiacao', 'PremiacaoController@index');

Route::get('/premiacao/criar', 'PremiacaoController@create');

Route::post('/premiacao/store', 'PremiacaoController@store');

Route::get('/cadastro', 'CadastroController@index');
Route::post('/cadastro/registro-membro', 'CadastroController@gravaRegistro');

Auth::routes();
