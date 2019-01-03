

@extends('layout.principal')
@section('title', 'Premiação')

@section('conteudo')
	<nav aria-label="breadcrumb">
	  <ol class="breadcrumb">
	    <li class="breadcrumb-item"><a href="{{url('index')}}">Home</a></li>
       	<li class="breadcrumb-item active" aria-current="page">Prêmios</li>
	  </ol>
	</nav>

                @if($premiacao != null)
                <div class="table-responsive table-full-width">
                <table class="table table-hover">
                    <thead>
                    <br><tr>
                            <th></th>
                            <th scope="col">Titulo</th>
                            <th scope="col">Descrição</th>
                            <th scope="col">Valor</th>
                            <th scope="col">Prazo de inscrição</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($premiacao as $prem)
                        @if($prem->user_id == $user->id)
                            @foreach($premios as $p)
                                @if($p->id == $prem->premio_id)
                                    <thead>
                                        <tr>
                                            <th scope="row"><td >{{$p->titulo}}</td></th>
                                            <td >{{$p->descricao}}</td>
                                            <td >{{$p->valor}}</td>
                                            <td >{{$p->data_limite}}</td>
                                            <td><a href="/premio/cancelarInscricao/{{$p->id}}" class="btn btn-danger">Cancelar inscrição</a></td>
                                        </tr>
                                    </thead>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                    </tbody>
                </table>
            </div>
            @else
                <!--alerta-->
                <p>Não existe premios disponiveis</p>
            @endif


@endsection
