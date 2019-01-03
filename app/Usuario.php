<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Usuario extends Authenticatable
{

    use Notifiable;

    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['nome', 'email', 'tipos_usuarios_id', 'setores_id'];

    public function setor (){
        return $this->belongsTo('App\Setores', 'setores_id');
    }

    public function tipoUsuario(){
        //return $this->belongsTo('App\TiposUsuarios', 'tipos_usuarios_id');
        return TiposUsuarios::find($this->tipos_usuarios_id);
    }

    public function tarefasAFazer(){
        //return Tarefa::where('users_id_responsavel', $this->id)->get();
        return $this->hasMany('App\Tarefa', 'users_id_responsavel')
                    ->where('status_tarefas_id',1)
                    ->get();
    }

    public function tarefasParaAvaliar(){
        return $this->hasMany('App\Tarefa', 'users_id_criador')
                    ->where('status_tarefas_id',2)
                    ->get();
    }

    

    public function subordinados(){
        return $this->belongsToMany('App\Usuario', 'hierarquias', 'users_id_superior', 'users_id_subordinado')->get();
    }

    public function superiores(){
        return $this->belongsToMany('App\Usuario', 'hierarquias', 'users_id_subordinado', 'users_id_superior')->get();
    }

    public function premiacoes(){
        return $this->hasMany('App\Premiacoes','user_id')->get();
    }

}
