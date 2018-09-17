<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Tarefa;
use DateTime;

class TarefasController extends Controller
{
    //

    public function index()
    {
    	return view('tarefas.index');
    }

    public function create(){
    	return view('tarefas.create');
    }

    public function store(Request $request){
    	
    	$tarefa = new Tarefa();
    	$tarefa->titulo = $request->input('titulo');
    	$tarefa->descricao = $request->input('descricao');
    	$tarefa->recompensa = $request->input('recompensa');
    	$tarefa->data_entrega = DateTime::createFromFormat('Y-m-d H:i:s', '2018-09-24 00:00:00');//$request->input('data_entrega');
    	//dd($tarefa);

    	$tarefa->save();

    	return view('tarefas.index');
    }
}
