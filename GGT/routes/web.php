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

use App\Mail\Email;

/* Rotas Home */
Route::get('/index', 'HomeController@index')->middleware('auth');
Route::get('/', 'HomeController@index')->middleware('auth');
Route::get('/home', 'HomeController@index')->middleware('auth');

/* Rotas Tarefas*/
Route::get('/tarefas', 'TarefasController@index');
Route::get('/tarefas/criar', 'TarefasController@create');
Route::get('/tarefas/alterar/{id}', "TarefasController@alterar");
Route::get('/tarefas/detalhes/{id}', "TarefasController@detalhes");
Route::get('/tarefas/avaliacao/{id}', "TarefasController@avaliacao");
Route::post('/tarefas/deletar', "TarefasController@deletar");
Route::post('/tarefas/desativar', 'TarefasController@desativar');
Route::post('/tarefas/store', 'TarefasController@store');
Route::post('/tarefas/update', 'TarefasController@update');
Route::post('/tarefas/avaliar', "TarefasController@avaliar");
Route::post('/tarefas/solicitarCorrecao', "TarefasController@solicitarCorrecao");

/* Rotas Cadastro */
Route::resource('cadastro', 'UsuariosController');

/* Rotas Premiacao */
Route::get('/premio/diretor', 'PremiacaoController@create');
Route::get('/premio/trainee', 'PremiacaoController@create');
Route::get('/premio', 'PremiacaoController@index');
Route::post('premio/criar', 'PremiacaoController@store');
Route::get('/premio/delete/{id}', 'PremiacaoController@delete');
Route::post('/premio/atualizar', 'PremiacaoController@update');
Route::post('/premio/update', 'PremiacaoController@update');
Route::get('/premio/regatar', 'PremiacaoController@regatar');

Auth::routes();


Route::get('/mail', function () {

    Mail::to('saquib.rizwan@xyz.com')->send(new Email); 

    return view('emails.email');

});