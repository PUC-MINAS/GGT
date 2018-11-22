@extends('layout.principal')
@section('title', '')

@section('conteudo')


    <div class="card">
		<div class="card-header">
			<h4 class="card-title">Tabela de Produtividade</h4>
		</div>
		<div class="card-body">

      <table class="table">
          <thead>
            <tr>
              <!-- <th scope="col">Posição</th> -->
              <th scope="col">Nome</th>
              <th scope="col">Tarefas Realizadas</th>
            </tr>
          </thead>
          <tbody>

            @foreach($subordinados as $subordinado)
                  <tr>
                    <td>{{$subordinado->nome}}</td>
                    <td>{{$tarefasRealizadas["$subordinado->id"]}}</td>
                  </tr>
            @endforeach

          </tbody>
        </table>

	</div>

@endsection
