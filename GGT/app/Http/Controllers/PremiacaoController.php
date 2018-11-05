<?php

namespace App\Http\Controllers;

use App\Premios;
use Illuminate\Http\Request;
use DB;
use DateTime;
class PremiacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $premios = \App\Premio::all();
        return view('premiacao.DiretorExecutivo.index')->with('premios',$premios);
    }

    public function regatar($id){
        
        $premio = \App\Premio::find($id);

        $premio->limite_vagas =  $premio->limite_vagas-1;

    }
   
    public function store(Request $request)
    {
        $premiacao = new \App\Premio();
     
        $premiacao->titulo = $request->input('titulo');
    	$premiacao->descricao = $request->input('descricao');
        $premiacao->valor = $request->input('valor');
        $premiacao->limite_vagas = $request->input('qtdVagas');

        $premiacao->data_limite = date($request->input('data_expirar'));
        $insert = $premiacao->save();

         if($insert){
             return redirect('/premio');
         }
         else{
            return 'Não foi possivel inserir';
         }
        return $data;
    }

    public function show() 
    {
        return 'ok';
    }
    
    public function update(Request $request)
    {
        $premio = \App\Premio::find($request->input('id'));

        $premio->titulo = $request->input('titulo');
    	$premio->descricao = $request->input('descricao');
        $premio->valor = $request->input('valor');
        $premio->limite_vagas = $request->input('qtdVagas');

        $premio->data_limite = date($request->input('data_expirar'));
        $insert = $premio->save();

         if($insert){
             return redirect('/premio');
         }
         else{
            return 'Não foi possivel inserir';
         }
        return $data;
        
    }

    public function delete($id){
        $premio = \App\Premio::find($id);
        $premio->delete();
        return redirect('/premio');
    }
    
}
