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
        return view('premiacao.DiretorExecutivo.index');
    }

   
    public function store(Request $request)
    {
        return 'ok';
    }

   

   
    public function show() 
    {
        return 'ok';
    }
    
    public function update(Request $request, $id)
    {
        return 'ok';
    }

    public function delete($id){
        return 'ok';
    }
    
    public function destroy(premiacao $premiacao)
    {
        return 'ok';
    }
}
