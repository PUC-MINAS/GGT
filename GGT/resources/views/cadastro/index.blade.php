@extends('layout.principal')
@section('title', 'Usuários')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Usuários</li>

	  </ol>
	</nav>

    <a href="{{url('cadastro/create')}}" class="btn btn-primary btn-fill">Cadastrar Usuário</a>
    <a href="{{url('cadastro/show')}}" class="btn btn-primary btn-fill">Visualizar Usuários</a>

    <div>
        <h1>Listagem de Usuários:</h1>

        @forelse ( $usuarios as $usuario )
            <p>Nome: {{ $usuario->nome }}</p>
        @empty
            <p>Nenhum usuário cadastrado!</p>
        @endforelse
    </div>

@endsection
