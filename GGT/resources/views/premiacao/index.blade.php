@extends('layout.principal')
@section('title', 'Premiação')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
       		<li class="breadcrumb-item active" aria-current="page">Premiações</li>
	  </ol>
	</nav>
	<a href="{{url('premiacao/show')}}" class="btn btn-primary btn-fill">Vizualizar Premiação</a>

	
	
@endsection
