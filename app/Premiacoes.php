<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Premiacoes extends Model
{
    protected $table = 'premiacoes';
    public $timestamps = false;

    public function premio(){
        return $this->belongsTo('App\Premio', 'premio_id')->first();
    }
    
    public function deletar(){
        return \App\Premiacoes::where('premio_id', $this->premio_id)->where('user_id', $this->user_id)->delete();
    }

}
