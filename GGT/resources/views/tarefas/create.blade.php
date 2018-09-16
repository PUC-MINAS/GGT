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

	<form>
		<div class="form-group">
			<label for="nome">Nome da tarefa</label>
			<input type="text" name="nome" class="form-control" id="nome">
		</div>
		<div class="form-group">
			<label for="descricao">Descrição</label>
			<textarea class="form-control" rows="6" name="descricao" id="descricao"></textarea>
		</div>
		<div class="form-group">
			<label for="pontuacao">Pontuação</label>
			<input type="number" name="pontuacao" id="pontuacao" class="form-control">
		</div>
		<div class="form-group">
			<label>Responsável pela tarefa</label>
			<select class="form-control" name="responsavel" id="responsavel">
				<option value="1">Subordinado1</option>
				<option value="2">Subordinado1</option>
				<option value="3">Subordinado1</option>
				<option value="4">Subordinado1</option>
				<option value="5">Subordinado1</option>
			</select>
		</div>
		<button type="submit" class="btn btn-success btn-fill">Criar</button>
		<a href="{{url('tarefas')}}" class="btn btn-warning btn-fill">Cancelar</a>
	</form>
@endsection