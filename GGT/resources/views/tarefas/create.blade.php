@extends('layout.principal')
@section('title', 'Criar Tarefa')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item"><a href="{{url('tarefas')}}">Tarefas</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Criar</li>
	  </ol>
	</nav>

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
			<label>Setor</label>
			<select class="form-control" name="setor" id="setor">[
				<option></option>
				<option value="1">Setor1</option>
				<option value="2">Setor2</option>
				<option value="3">Setor3</option>
				<option value="4">Setor4</option>
				<option value="5">Setor5</option>
			</select>
		</div>
		<div class="form-group">
			<label>Responsável pela tarefa</label>
			<select class="form-control" name="responsavel" id="responsavel">
				<option></option>
				<option value="1">Subordinado1</option>
				<option value="2">Subordinado2</option>
				<option value="3">Subordinado3</option>
				<option value="4">Subordinado4</option>
				<option value="5">Subordinado5</option>
			</select>
		</div>
		<div class="form-check">
			<label class="form-check-label">
				<input type="checkbox" class="form-check-input" name="todos" id="checkTodos">
				<span class="form-check-sign"></span>
				Selecionar todos
			</label>
		</div>
		<button type="submit" class="btn btn-success btn-fill">Criar</button>
		<a href="{{url('tarefas')}}" class="btn btn-danger btn-fill">Cancelar</a>
	</form>


@endsection

@section('scripts')
<script type="text/javascript">
	$("#checkTodos").click(function	() {
		console.log('clicado');
		if ($("#checkTodos").prop('checked') == true) $("#responsavel").attr("disabled", "disabled");
		else $("#responsavel").removeAttr("disabled");
	});
</script>
@endsection