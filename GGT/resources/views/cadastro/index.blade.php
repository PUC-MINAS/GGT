@extends('layout.principal')
@section('title', 'Usuários')

@section('conteudo')


	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
	    <li class="breadcrumb-item active" aria-current="page">Usuários</li>
	  </ol>
	</nav>

    @if(Auth::user()->tipoUsuario()->titulo == "Diretor Executivo")
        <a href="{{url('cadastro/create')}}"  class="btn btn-primary btn-fill">Cadastrar Usuário</a>
    @endif

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
                    <td>{{ $usuario->tipoUsuario()->titulo}}</td>
                    <td>{{ $usuario->setor['titulo']}}</td>

                    @if ((Auth::user()->tipoUsuario()->titulo == "Diretor Executivo"
                       || Auth::user()->id == $usuario->id)
                       && $usuario->tipoUsuario()->titulo != "Diretor Executivo")
                        <td>
                            <a class="btn btn-info" href="{{ route('cadastro.edit',$usuario->id) }}">Editar</a>
                        </td>
                    @endif

                    @if (Auth::user()->tipoUsuario()->titulo == "Diretor Executivo"
                      && $usuario->tipoUsuario()->titulo != "Diretor Executivo")
                        <td>
                            <form action="{{ route('cadastro.destroy', $usuario->id) }}" method="POST">
                                @method('DELETE')
                                @csrf
                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash-o" aria-hidden="true"></i></button>
                            </form>
                        </td>
                    @endif
                </tr>
            @empty
            @endforelse
        </table>
    </div>

@endsection
