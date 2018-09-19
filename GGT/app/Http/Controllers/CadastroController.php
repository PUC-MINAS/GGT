<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cadastro;
use DateTime;

class CadastroController extends Controller {

    public function index (){
        return view('cadastro.index');
    }

    public function gravaRegistro (Request $request){
        //
    }
}
