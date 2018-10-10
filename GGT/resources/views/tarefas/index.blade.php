@extends('layout.principal')
@section('title', 'Tarefas')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Tarefas</li>
	    
	  </ol>
	</nav>

	<a href="{{url('tarefas/criar')}}" class="btn btn-primary btn-fill">Nova tarefa</a>

	<div class="container">
		<div class="table-responsive table-full-width">
			<table class="table table-hover">
				<thead>
					<tr>
						       
						<th scope="col">Título</th>
						<th scope="col">Descrição</th>
						<th scope="col">Data para entrega</th>
						<th scope="col">Recompensa</th>
						<th></th>
						
					</tr>
				</thead>
				<tbody>
					@foreach($tarefas as $t)
						<tr>
							<td>{{$t->titulo}}</td>
							<td>{{$t->descricao}}</td>
							<td>{{$t->data_limite}}</td>
							<td>{{$t->recompensa}}</td>
							<td>
								<button class="btn btn-primary btn-fill btn-xs">
									<i class="nc-icon nc-tag-content" title="Detalhes"></i>
								</button>
								<button  class="btn btn-warning btn-fill btn-xs" onclick="alert('teste')">
									<i class="nc-icon nc-settings-tool-66" title="Editar"></i>
								</button>
								<button class="btn btn-danger btn-fill btn-xs">
									<i class="nc-icon nc-simple-remove" title="Deletar"></i>
								</button>
							</td>
						</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		
	</div>

@endsection