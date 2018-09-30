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

Route::get('/cadastro', 'CadastroController@index');

Route::get('/cadastro', 'CadastroController@index');


Route::get('/premiacao', 'PremiacaoController@show');

Route::get('/premiacao/criar', 'PremiacaoController@create');

Route::post('/premiacao/store', 'PremiacaoController@store');

Route::resource('cadastro', 'UsuariosController');

Route::get('/premiacao/delete/{id}', 'PremiacaoController@delete');

Route::post('/premiacao/update/{id}', 'PremiacaoController@update');

Route::post('/cadastro/registro-membro', 'CadastroController@gravaRegistro');

Auth::routes();
