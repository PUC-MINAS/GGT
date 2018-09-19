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
    	
        //dd($request->input('data_limite'));
    	$tarefa = new Tarefa();
    	$tarefa->titulo = $request->input('titulo');
    	$tarefa->descricao = $request->input('descricao');
    	$tarefa->recompensa = $request->input('recompensa');
    	$tarefa->data_limite = DateTime::createFromFormat('Y-m-d H:i:s', $request->input('data_limite') . ' 23:59:59');
    	//dd($tarefa); debug

    	$tarefa->save();

    	return view('tarefas.index');
    }
}
