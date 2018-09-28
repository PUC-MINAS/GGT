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
    <a href="{{url('cadastro/show')}}" class="btn btn-primary btn-fill">Visualizar Usuário</a>

    <div class="table-responsive table-full-width">
        <table class="table table-hover">
        <br><tr>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Cargo</th>
                <th>Diretoria</th>
            </tr>
            @forelse ( $usuarios as $usuario )
                <tr>
                    <td>{{ $usuario->nome }}</td>
                    <td>{{ $usuario->email}}</td>
                    <td>{{ $usuario->cargo}}</td>
                    <td>{{ $usuario->setor}}</td>
                </tr>
            @empty
                <p>Nenhum usuário cadastrado!</p>
            @endforelse
        </table>
    </div>

@endsection
