<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tarefa;
use App\Usuario;

class LeaderboardController extends Controller
{
  public function index()
  {
    $tarefas = Tarefa::all();
    $users = Usuario::all();

    $subordinados = $users->reject(function ($user) {
      return $user->tipos_usuarios_id == '1';
    });

    $tarefasRealizadas = array();

    foreach ($subordinados as  $subordinado) {
        $numTarefas = 0;
        foreach ($tarefas as $tarefa) {
            if($tarefa->status_tarefas_id == 3 && $tarefa->users_id_responsavel == $subordinado->id){
              $numTarefas++;
            }
        }
        $tarefasRealizadas[$subordinado->id] = $numTarefas;
    }

    $tarefasPendentes = array();

    foreach ($subordinados as  $subordinado) {
        $numTarefas = 0;
        foreach ($tarefas as $tarefa) {
            if($tarefa->status_tarefas_id == 1 && $tarefa->users_id_responsavel == $subordinado->id){
              $numTarefas++;
            }
        }
        $tarefasPendentes[$subordinado->id] = $numTarefas;
    }

    return view('leaderboard.DiretorExecutivo.index')->with('subordinados', $subordinados)
                                                     ->with('tarefasRealizadas', $tarefasRealizadas)
                                                     ->with('tarefasPendentes', $tarefasPendentes);
  }
}
