<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DateTime;
use Auth;

class UsuariosController extends Controller
{
    public function index()
    {
        
        if (Auth::user()->tipo_usuario['titulo'] == "Diretor Executivo")
            $usuarios = Usuario::get();
        else if (Auth::user()->tipo_usuario['titulo'] == "Diretor")
            $usuarios = Usuario::where('setores_id', Auth::user()->setores_id)->get();
        else
            $usuarios = Usuario::where('id', Auth::user()->id)->get();

        return view('cadastro.index', compact('usuarios'));
    }

    public function create()
    {
        return view ('cadastro.DiretorExecutivo.registro');
    }

    public function store(Request $request)
    {
        $user = new Usuario();
	    $user->nome = $request->input('nome-completo');
	    $user->email = $request->input('email');
	    $user->senha = $request->input('senha');
	    $user->tipos_usuarios_id = $request->input('cargo');
        $user->setores_id = $request->input('diretoria');
	    $user->save();
	    return redirect()->route('cadastro.index')
                        ->with('success','Usuario cadastrado');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $usuario = Usuario::findOrFail($id);
        if (Auth::user()->tipo_usuario['titulo'] == "Diretor Executivo")
            return view('cadastro.DiretorExecutivo.alterar',compact('usuario'));
        else
            return view ('cadastro.alterar', compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
		$usuario->nome = $request->input('nome-completo');
        $usuario->email = $request->input('email');

        if (Auth::user()->tipo_usuario['titulo'] == "Diretor Executivo"){
            $usuario->tipos_usuarios_id = $request->input('cargo');
            $usuario->setores_id = $request->input('diretoria');
        }
        else{
            $usuario->senha = $request->input('senha');
        }
        $usuario->save();

        return redirect()->route('cadastro.index')
                        ->with('success','Usuario alterado com sucesso!');
    }

    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('cadastro.index')->with('alert-success','Product hasbeen deleted!');
    }
}
