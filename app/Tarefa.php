<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $table = 'tarefas';

    public $timestamps = false;

    public function criador(){
        //return $this->hasOne( new Usuario, 'users_id_criador', 'id');
        return Usuario::find($this->users_id_criador);
    }

    public function responsavel(){
        return Usuario::find($this->users_id_responsavel);
    }

    public function entregar(){
       $status = StatusTarefa::where('titulo', 'Entregue')->first();
       $this->status_tarefas_id = $status->id;
    }

    public function statusTarefa(){
        return StatusTarefa::find($this->status_tarefas_id);
    }

    public function desativar(){
        $status = StatusTarefa::where('titulo', 'DESATIVADA')->first();
        $this->status_tarefas_id = $status->id;
    }

    public function ativa() {
        return $this->status_tarefas_id == 1;
    }

    public function atrasada(){
        return strtotime($this->data_limite) < strtotime('now') ;
    }
}
