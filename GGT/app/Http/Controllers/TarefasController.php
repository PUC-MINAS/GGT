<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Tarefa;
use App\StatusTarefa;
use App\Usuario;
use Date;

class TarefasController extends Controller
{
    //

    public function index()
    {
		$tarefas = Tarefa::all();
		//dd($tarefas);
    	return view('tarefas.index')->with('tarefas', $tarefas);
    }

    public function create(){
    	return view('tarefas.create');
	}
	
	public function alterar($id){
		$tarefa = Tarefa::find($id);
		$tarefa->criador = Usuario::find($tarefa->users_id_criador);
		$tarefa->responsavel = Usuario::find($tarefa->users_id_responsavel);
		$tarefa->status = StatusTarefa::find($tarefa->status_tarefas_id);
		
		return view('tarefas.alterar')->with('tarefa', $tarefa);
	}

    public function store(Request $request){
    	
    	$tarefa = new Tarefa();
    	$tarefa->titulo = $request->input('titulo');
    	$tarefa->descricao = $request->input('descricao');
    	$tarefa->recompensa = $request->input('recompensa');
		//$tarefa->data_limite = DateTime::createFromFormat('Y-m-d H:i:s', $request->input('data_limite') . ' 23:59:59');
		$tarefa->data_limite = date($request->input('data_limite'));
		$status = StatusTarefa::find(1);
		$criador = Usuario::find(1);
		$responsavel = Usuario::find(2);
		$tarefa->users_id_criador = $criador->id;
		$tarefa->users_id_responsavel = $responsavel->id;
		$tarefa->status_tarefas_id = $status->id;
		//dd($tarefa);

    	$tarefa->save();

		//return view('tarefas.index');
		//return Redirect::to('tarefas');
		return redirect('/tarefas');
    }
}
