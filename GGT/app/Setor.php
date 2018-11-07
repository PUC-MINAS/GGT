<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    protected $table = 'setores';

    public $timestamps = false;

    public function usuarios(){
        return $this->hasMany('App\Usuario');
    }
}
