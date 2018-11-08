@extends('layout.principal')
@section('title', 'Tarefa')

@section('conteudo')

<div class="container-fluid">
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{url('tarefas')}}">Tarefas</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Criar</li>
	  </ol>
	</nav>

	<div class="card">
		<div class="card-header">
			<h4 class="card-title">Criar Nova Tarefa</h4>
		</div>
		<div class="card-body">
	
			<form method="POST" action="{{url('tarefas/store')}}">
				<div class="form-group">
					<label for="nome">Título</label>
					<input type="text" name="titulo" class="form-control" id="titulo">
				</div>
				<div class="form-group">
					<label for="descricao">Descrição</label>
					<textarea class="form-control" rows="6" name="descricao" id="descricao"></textarea>
				</div>
				<div class="form-group">
					<label for="recompensa">Recompensa em FUJcoins</label>
					<input type="number" name="recompensa" id="recompensa" class="form-control">
				</div>

				<div class="form-group">
					<label>Data para entrega</label>
					<input type="date" name="data_limite" id="data_limite" class="form-control">
				</div>

				<div class="form-group">
					<label>Responsável pela tarefa</label>
					<select class="form-control" name="responsavel" id="responsavel">
						<option></option>
						@foreach($user->subordinados() as $s)
							<option value="{{$s->id}}">{{$s->nome}}</option>
						@endforeach
						
					</select>
				</div>
				
				<button type="submit" class="btn btn-success btn-fill">Criar</button>
				<a href="{{url('tarefas')}}" class="btn btn-danger btn-fill">Cancelar</a>
			</form>

		</div>
	</div>	
	

	

</div>

@endsection

@section('scripts')
<script type="text/javascript">



	// $("#checkTodos").click(function	() {
	// 	console.log('clicado');
	// 	if ($("#checkTodos").prop('checked') == true) $("#responsavel").attr("disabled", "disabled");
	// 	else $("#responsavel").removeAttr("disabled");
	// });
</script>
@endsection