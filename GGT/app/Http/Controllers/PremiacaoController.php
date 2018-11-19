<?php

namespace App\Http\Controllers;

use App\Premios;
use Illuminate\Http\Request;
use DateTime;
use App\Usuario;
use Auth;
class PremiacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {

        $user = Auth::user();
        
        $premios = \App\Premio::all();

        $premiacao = \App\Premiacoes::all();

        if($user->tipoUsuario()->id == 1){
            
           return view('premiacao.DiretorExecutivo.index',compact('premios','premiacao'));
            
        }
        return view('premiacao.index', compact('premios','premiacao','user'));
        
    }

    public function meusPremios()
    {

        $user = Auth::user();

        $premios = \App\Premio::all();
      
        $premiacao = \App\Premiacoes::all();
        
        if($user->tipoUsuario()->id == 1){
            
           return view('premiacao.meusPremios',compact('premios','premiacao'));
            
        }
        return view('premiacao.meusPremios', compact('premios','premiacao','user'));
        
    }

    public function regatar($id){

        $premio = \App\Premio::find($id);

        $user = Auth::user();

        if($user->pontos >= $premio->valor){
            if($premio->limite_vagas>0){

                $user->pontos -= $premio->valor;

                $premio->limite_vagas-=1;

                $premio->save();
                $user->save(); //correção - pontos decrementados não estavam sendo persistidos

                date_default_timezone_set('America/Sao_Paulo');
                $data = date('Y-m-d');
                
                $premiacoes = new \App\Premiacoes;
                $premiacoes->user_id= $user->id;
                $premiacoes->premio_id= $id;
                $premiacoes->valor_pago= $premio->valor;              
                $premiacoes->data_resgate= $data;

                $insert = $premiacoes->save();
               
                if($insert){
                    return redirect('/premio');
                }
                else{
                   return 'Não foi possivel inserir';
                }
            }
        }else{
            //add alerta

            return "Ops está faltando alguns pontos!!!";
        }
        
    }
   
    public function store(Request $request)
    {
        $premio = new \App\Premio();
     
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

    public function cancelar($id){
        
        $user = Auth::user();        
        $premiacao = $user->premiacoes()->where('premio_id', $id)->first();
        $premio = $premiacao->premio();

        $user->pontos += $premio->valor;
        $user->save();

        $vagas = $premio->limite_vagas;
        $premio->limite_vagas = $vagas+1;
        $premio->save();

        $premiacao->deletar();

        return redirect('/premio');
    }

    public function delete($id){
        $premio = \App\Premio::find($id);
        
        $premiacao = \App\Premiacoes::where('premio_id', $id)->first();

        dd($premiacao);

        

        foreach($premiacao as $p){
            if($p->premio_id == $premio->id){

                $user = \App\Usuario::find($p->user_id);
                $user->pontos += $premio->valor;
                
                $p->user_id=null;
            }
        }
        $premio->delete();
        return redirect('/premio');
    }
    
}
