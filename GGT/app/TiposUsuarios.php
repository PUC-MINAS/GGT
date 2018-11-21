<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TiposUsuarios extends Model
{
    protected $table = 'tipos_usuarios';
    public $timestamps = false;

    public function Usuario(){
        return $this->hasMany('App\Usuario');
    }
}
