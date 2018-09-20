<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DateTime;

class CadastroController extends Controller {

    public function index (){
        return view('cadastro.index');
    }

    public function gravaRegistro (Request $request){
        //
	$user = new Usuario();
	$user->nome = $request->input('nome-completo');
	$user->email = $request->input('email');
	$user->senha = $request->input('senha');
	$user->cargo = $request->input('cargo');
	$user->setor = $request->input('diretoria');
	$user->save();
	return view('index');
    }
}
