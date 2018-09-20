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
        return view('premiacao.index');
    }

    public function create()
    {
        return view('premiacao.criar');
    }

   
    public function store(Request $request)
    {
        $premiacao = new Premios();

        $premiacao->titulo = $request->input('titulo');
    	$premiacao->descricao = $request->input('descricao');
        $premiacao->valor = $request->input('valor');
        $premiacao->vagas = $request->input('qtdVagas');
        $premiacao->data_expirar = DateTime::createFromFormat('Y-m-d H:i:s', $request->input('data_expirar') . ' 23:59:59');
    	
    	
        $insert = $premiacao->save();
       
         if($insert)
             return view('premiacao.index');
         else
             return 'Não foi possivel inserir';
    }

   

   
    public function show(premiacao $premiacao)
    {
       
    }

    
    public function edit(premiacao $premiacao)
    {
        //TO DO
    }

    
    public function update(Request $request, premiacao $premiacao)
    {
        //TO DO	
    }

    
    public function destroy(premiacao $premiacao)
    {
        //TO DO
    }
}
