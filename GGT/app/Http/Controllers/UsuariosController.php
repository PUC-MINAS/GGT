<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Usuario;
use DateTime;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::get();
        return view('cadastro.index', compact('usuarios'));
    }

    public function create()
    {
        return view ('cadastro.registro');
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
        return view('cadastro.editar',compact('usuario'));
    }

    public function update(Request $request, $id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

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
