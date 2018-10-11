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
Route::get('/tarefas/alterar/{id}', "TarefasController@alterar");

Route::post('/tarefas/store', 'TarefasController@store');
Route::post('/tarefas/update', 'TarefasController@update');

Route::get('/cadastro', 'CadastroController@index');

Route::get('/cadastro', 'CadastroController@index');

Route::resource('cadastro', 'UsuariosController');

Route::post('/cadastro/registro-membro', 'CadastroController@gravaRegistro');

Route::get('/premio/diretor', 'PremiacaoController@create');

Route::get('/premio/trainee', 'PremiacaoController@create');

Route::get('/premio', 'PremiacaoController@index');

Route::post('premio/criar', 'PremiacaoController@store');

Route::get('/premio/delete/{id}', 'PremiacaoController@delete');

Route::post('/premio/update/{id}', 'PremiacaoController@update');

Auth::routes();
