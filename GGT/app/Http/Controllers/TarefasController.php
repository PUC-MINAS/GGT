<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use App\Tarefa;
use App\StatusTarefa;
use App\Setores;
use App\Usuario;
use Date;
use Auth;

class TarefasController extends Controller
{
    //

    public function index()
    {
		$tarefas = Tarefa::all();
		//dd($tarefas);
    	return view('tarefas.DiretorExecutivo.index')->with('tarefas', $tarefas);
    }

    public function create(){

		$user = Auth::user();

		if($user->tipo_usuario()->titulo == "Diretor Executivo")
			return view('tarefas.DiretorExecutivo.create')->with('user', $user);
		else if($user->tipo_usuario()->titulo == "Diretor")
			return view('tarefas.DiretorExecutivo.create')->with('user', $user);
	}

	public function alterar($id){
		$tarefa = Tarefa::find($id);
		$tarefa->criador = Usuario::find($tarefa->users_id_criador);
		$tarefa->responsavel = Usuario::find($tarefa->users_id_responsavel);
		$tarefa->status = StatusTarefa::find($tarefa->status_tarefas_id);

		$subordinados = Usuario::all();

		return view('tarefas.DiretorExecutivo.alterar')->with('tarefa', $tarefa)->with('subordinados', $subordinados);
	}

	public function detalhes($id){
		$tarefa = Tarefa::find($id);

		//dd($tarefa->atrasada());

		//dd($tarefa->statusTarefa());

		if (Auth::user()->tipoUsuario() == 1)
			return view('tarefas.DiretorExecutivo.detalhes')->with('tarefa', $tarefa);
		else if (Auth::user()->tipoUsuario() == 2)
			return view('tarefas.Diretor.detalhes')->with('tarefa', $tarefa);
		else if (Auth::user()->tipoUsuario() == 3)
			return view('tarefas.Trainee.detalhes')->with('tarefa', $tarefa);
	}

    public function store(Request $request){

    	$tarefa = new Tarefa();
    	$tarefa->titulo = $request->input('titulo');
    	$tarefa->descricao = $request->input('descricao');
    	$tarefa->recompensa = $request->input('recompensa');
		$tarefa->data_limite = date($request->input('data_limite'));
		$status = StatusTarefa::find(1);
		$criador = Auth::user();
		$idresponsavel = $request->input('responsavel');
		$tarefa->users_id_criador = $criador->id;
		$tarefa->users_id_responsavel = $idresponsavel;
		$tarefa->status_tarefas_id = $status->id;

    	$tarefa->save();

		return redirect('/tarefas');
	}

	public function avaliar(Request $request) {

		$tarefa = Tarefa::find($request->input('id'));
		$tarefa->status_tarefas_id = StatusTarefa::find(3)->id;

		$usuario = $tarefa->responsavel();
		$usuario->pontos = $usuario->pontos + $request->input('pontos');

		$tarefa->save();
		$usuario->save();

		return redirect('/');
	}

  public function solicitarCorrecao(Request $request) {

		$tarefa = Tarefa::find($request->input('id'));
		$tarefa->status_tarefas_id = StatusTarefa::find(1)->id;

		$tarefa->save();

		return redirect('/');
	}

	public function update(Request $request) {

		$tarefa = Tarefa::find($request->input('id'));
		$tarefa->titulo = $request->input('titulo');
		$tarefa->descricao = $request->input('descricao');
		$tarefa->recompensa = $request->input('recompensa');
		$tarefa->data_limite = date($request->input('data_limite'));

		//dd($tarefa);

		$tarefa->save();

		return redirect('/tarefas');
	}

	public function deletar(Request $request){
		$tarefa = Tarefa::findOrFail($request->input('id'));
		//dd($tarefa);
		$tarefa->delete();
		return redirect('/tarefas');
	}

	public function desativar(Request $request){
		$tarefa = Tarefa::findOrFail($request->input('id'));
		$tarefa->desativar();
		$tarefa->save();
		return redirect('/tarefas');
	}
}
