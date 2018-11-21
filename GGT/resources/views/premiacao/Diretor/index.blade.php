@extends('index')
@section('title', 'Premiação')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
       	<li class="breadcrumb-item active" aria-current="page">Prêmios</li>
	  </ol>
	</nav>

    @if($premios != null)
        <div class="table-responsive table-full-width">
            <table class="table table-hover">
                <thead>
                <br><tr>
                        <th></th>
                        <th scope="col">Vagas</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor</th>
                        <th scope="col">Prazo de inscrição</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($premios as $p)
                        <thead>
                            <tr>
                                <th scope="row"><td >{{$p->limite_vagas}}</td> </th>
                                <td >{{$p->titulo}}</td>
                                <td >{{$p->descricao}}</td>
                                <td >{{$p->valor}}</td>
                                <td >{{$p->data_limite}}</td>
                                <td> <td><a href="/premio/trocar/{{$p->id}}" class="btn btn-info">Trocar</a></td></td>
                            </tr>
                        </thead>
                    @endforeach
                </tbody>
            </table>
        </div>
		@else
		<p>Não existe premios disponiveis</p>
	@endif


@endsection
