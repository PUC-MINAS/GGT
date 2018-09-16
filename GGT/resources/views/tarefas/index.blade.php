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

@endsection