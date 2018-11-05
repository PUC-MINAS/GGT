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

        if( $user->tipoUsuario() == 1 ) return view('home.DiretorExecutivo.index')->with('user', $user);
        else if($user->tipoUsuario() == 2) return view('home.Diretor.index')->with('user', $user);
        else if($user->tipoUsuario() == 3) return view('home.Trainee.index')->with('user', $user);
    }
}
