<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    protected $table = 'users';
    public $timestamps = false;
    protected $fillable = ['nome', 'email', 'tipos_usuarios_id', 'setores_id'];

    public function setor (){
        return $this->belongsTo('App\Setores', 'setores_id');
    }

    public function tipo_usuario (){
        return $this->belongsTo('App\TiposUsuarios', 'tipos_usuarios_id');
    }

}
