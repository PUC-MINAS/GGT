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

    public function create()
    {
        return view('premiacao.criar');
    }

   
    public function store(Request $request)
    {
        $premiacao = new \App\Premio();

        $premiacao->titulo = $request->input('titulo');
    	$premiacao->descricao = $request->input('descricao');
        $premiacao->valor = $request->input('valor');
        $premiacao->limite_vagas = $request->input('qtdVagas');
        $premiacao->data_limite = DateTime::createFromFormat('Y-m-d H:i:s', $request->input('data_expirar') . ' 23:59:59');
    	
    	
        $insert = $premiacao->save();
       
         if($insert){
             return redirect('/premio');
         }
         else{
            return 'Não foi possivel inserir';
         }
    }

   

   
    public function show() 
    {
        $premios = \App\Premio::all();
        return view('premiacao.vizualisar')->with('premios',$premios);
    }
    
    public function update(Request $request, $id)
    {
        $premio = \App\Premio::find($id);
        $premio->titulo = $request->get('titulo');
    	$premio->descricao = $request->get('descricao');
        $premio->valor = $request->get('valor');
        $premio->limite_vagas = $request->get('qtdVagas');
        $premio->data_limite = DateTime::createFromFormat('Y-m-d H:i:s', $request->get('data_expirar') . ' 23:59:59');
        
        $insert = $premio->save();
       
        if($insert){
           $premios = \App\Premio::all();
            return view('premiacao.vizualisar')->with('premios',$premios);
        }
        else{
            return 'Não foi possivel atualizar';
        }
    }

    public function delete($id){
        $premio = \App\Premio::find($id);
        $premio->delete();
        $premios = \App\Premio::all();
        return view('premiacao.vizualisar')->with('premios',$premios);
    }
    
    public function destroy(premiacao $premiacao)
    {
        return 'ok';
    }
}
