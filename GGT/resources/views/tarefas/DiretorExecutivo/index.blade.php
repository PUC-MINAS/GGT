@extends('layout.principal')
@section('title', 'Tarefas')

@section('conteudo')

	<style>
        form.formInline{
            display: inline;
        }
    </style>

	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Tarefas</li>

	  </ol>
	</nav>

	<div style="background-color:whitesmoke" class="container">
		<div class="row">
			<div class="col">
			<a href="{{url('tarefas/criar')}}" class="btn btn-primary btn-fill">Nova tarefa</a>
			</div>
		</div>

		<div class="row">
			<div style="background-color:whitesmoke" class="col">
			<div style="background-color:whitesmoke" class="card">
			<div style="background-color:whitesmoke" class="card-body">


				<div style="background-color:whitesmoke" class="table-responsive table-full-width">
					<table class="table table-hover">
						<thead>
							<tr>

								<th scope="col">Título</th>
								<th scope="col">Descrição</th>
								<th scope="col">Data para entrega</th>
								<th scope="col">FUJcoins</th>
								<th scope="col">Criador</th>
								<th scope="col">Responsável</th>
								<!--<th></th>-->

							</tr>
						</thead>
						<tbody>
							@foreach($tarefas as $t)

								<tr>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->titulo}}</a></td>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->descricao}}</a></td>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->data_limite}}</a></td>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->recompensa}}</a></td>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->criador()->nome}}</a></td>
									<td><a style="color:black;" href="{{url('/tarefas/detalhes/'.$t->id)}}">{{$t->responsavel()->nome}}</a></td>
									<!--<td>
										<a href="{{url('/tarefas/detalhes/'.$t->id)}}" class="btn btn-primary btn-fill btn-xs">
											<i class="nc-icon nc-tag-content" title="Detalhes"></i>
										</a>
										<a href="{{url('/tarefas/alterar/'.$t->id)}}" class="btn btn-warning btn-fill btn-xs">
											<i class="nc-icon nc-settings-tool-66" title="Editar"></i>
										</a>

										<form action="{{url('/tarefas/deletar')}}" method="POST" class="formInline">
											<input type="hidden" name="id" value="{{$t->id}}">
											<button class="btn btn-danger btn-fill btn-xs">
												<i class="fa fa-trash-o" title="Deletar"></i>
											</button>
										</form>
									</td>-->
								</tr>

							@endforeach
						</tbody>
					</table>
				</div>
			</div>
			</div>
			</div>
		</div>
	</div>






@endsection
