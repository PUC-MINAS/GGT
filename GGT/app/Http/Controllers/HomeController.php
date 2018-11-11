<?php

namespace App\Http\Controllers;

use Auth;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //

    public function index(){
        $user = Auth::user();
        $tarefas = $user->tarefasAFazer();

        //dd($tarefas);

        if( $user->tipoUsuario()->titulo == "Diretor Executivo" ) return view('home.DiretorExecutivo.index')->with('user', $user);
        else if($user->tipoUsuario()->titulo == "Diretor") return view('home.Diretor.index')->with('user', $user);
        else if($user->tipoUsuario()->titulo == "Trainee") return view('home.Trainee.index')->with('user', $user);
    }
}
